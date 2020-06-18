using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Threading;
using System.Windows.Automation;
using System.Diagnostics;
using System.Windows.Forms;
namespace URLmonitor
{
    public class threadPoolClass
    {
        protected Action<string> GoogleAction;
        protected Action<string> EdgeAction;
        protected Action<string> MozillaAction;

        public threadPoolClass(Action<string> GoogleAction, Action<string> EdgeAction, Action<string> MozillaAction)
        {
            this.GoogleAction = GoogleAction;
            this.EdgeAction = EdgeAction;
            this.MozillaAction = MozillaAction;
            ThreadPool.QueueUserWorkItem(getIeUrlFunc, null);
            ThreadPool.QueueUserWorkItem(getGoogleUrlFunc, null);
            ThreadPool.QueueUserWorkItem(getFireFoxUrlFunc, null);

        }


        protected void getGoogleUrlFunc(object state)
        {
            AutomationElement root = null;
            Condition panelCondition = new PropertyCondition(AutomationElement.ControlTypeProperty, ControlType.Pane);
            Condition elmUrlBarCond = new PropertyCondition(AutomationElement.ControlTypeProperty, ControlType.Edit);
            while (true)
                {
                    Process[] procsChrome = Process.GetProcessesByName("chrome");
                int currentAmount = procsChrome.Length;
               
                if (currentAmount == 0)
                {
                  
                    Thread.Sleep(100);
                    continue;

                }
                else
                    {
                        foreach (Process proc in procsChrome)
                        {

                            if (proc.MainWindowHandle == IntPtr.Zero)
                            {
                                continue;
                            }
                        try
                        {
                            root = AutomationElement.FromHandle(proc.MainWindowHandle);
                        }
                        catch(Exception exc)
                        {
                            MessageBox.Show(exc.Message);
                        }
                            
                            if(root == null)
                            {
                              break;
                            }
                     
                            AutomationElementCollection panes = root.FindAll(TreeScope.Children, panelCondition);
                        if(panes.Count == 0)
                        {
                            break;                        
                        }
                        AutomationElement firstPane = panes[panes.Count - 1];
                        if(firstPane == null)
                        {
                            break;
                        }
                        
                            AutomationElement elmUrlBar = firstPane.FindFirst(TreeScope.Descendants, elmUrlBarCond);

                            if (elmUrlBar != null)
                            {
                            AutomationPattern pattern = elmUrlBar.GetSupportedPatterns().First(x => x.ProgrammaticName.Equals("ValuePatternIdentifiers.Pattern"));
                                if (pattern != null)
                                {
                                    ValuePattern val = (ValuePattern)elmUrlBar.GetCurrentPattern(pattern);

                                    GoogleAction.Invoke(val.Current.Value);

                                }
                            }

                        }

                    Thread.Sleep(100);
                }
               
                }
                 
        }

        protected void getFireFoxUrlFunc(object state)
        {
            string str = "Навигация";
            Condition navBarCond = new PropertyCondition(AutomationElement.NameProperty, str);
            Condition listCond = new PropertyCondition(AutomationElement.ControlTypeProperty, ControlType.ComboBox);
            Condition editCond = new PropertyCondition(AutomationElement.ControlTypeProperty, ControlType.Edit);
            while (true)
            {
                Process[] procsFireFox = Process.GetProcessesByName("firefox");
                int currentAmount = procsFireFox.Length;
                if ((currentAmount == 0))
                {

                    Thread.Sleep(100);
                    continue;

                }
                else
                {
                    foreach (Process proc in procsFireFox)
                    {

                        if (proc.MainWindowHandle == IntPtr.Zero)
                        {
                            continue;
                        }
                        

                        AutomationElement root = AutomationElement.FromHandle(proc.MainWindowHandle);
                        if(root == null)
                        {
                            break;
                        }
                        
                   
                        AutomationElement navBar = root.FindFirst(TreeScope.Children, navBarCond);
                        if(navBar == null)
                        {
                           break;
                        }
                        AutomationElement list = navBar.FindFirst(TreeScope.Children, listCond);
                        if(list == null)
                        {
                            break;
                        }
                        AutomationElement edit = list.FindFirst(TreeScope.Children, editCond);
                        if (edit!= null)
                        {
                            AutomationPattern pattern = edit.GetSupportedPatterns().First(x => x.ProgrammaticName.Equals("ValuePatternIdentifiers.Pattern"));
                            if (pattern != null)
                            {
                                ValuePattern val = (ValuePattern)edit.GetCurrentPattern(pattern);

                                MozillaAction.Invoke(val.Current.Value);

                            }
                        }

                    }
                   
                    Thread.Sleep(100);
                }
                
            }
            
        }
        protected void getIeUrlFunc(object state)
        {

            Condition urlTabCond = new PropertyCondition(AutomationElement.AutomationIdProperty, "addressEditBox");
            while (true)
                {
                    Process[] procsEdge = Process.GetProcessesByName("MicrosoftEdge");
                    if (procsEdge.Length <= 0)
                    {
                    Thread.Sleep(100);
                        Console.WriteLine("IE is not running");

                    }
                    else
                    {
                        foreach (Process proc in procsEdge)
                        {
                            
                            if (proc.MainWindowHandle == IntPtr.Zero)
                            {
                                continue;
                            }

                            AutomationElement root = AutomationElement.FromHandle(proc.MainWindowHandle);
                            if(root == null)
                             {
                                 break;
                             }
                       
                            AutomationElement elmUrlBar = root.FindFirst(TreeScope.Children, urlTabCond);
                            if (elmUrlBar != null)
                            {
                                AutomationPattern pattern = elmUrlBar.GetSupportedPatterns().First(x => x.ProgrammaticName.Equals("ValuePatternIdentifiers.Pattern"));
                                if (pattern != null)
                                {
                                    ValuePattern val = (ValuePattern)elmUrlBar.GetCurrentPattern(pattern);

                                    EdgeAction.Invoke(val.Current.Value);

                                }
                            }

                        }
                    Thread.Sleep(100);
                }
               
                }
            }
        }

   
}
