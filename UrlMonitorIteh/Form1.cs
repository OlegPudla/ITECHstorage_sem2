using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Windows.Automation;
using System.Diagnostics;

namespace URLmonitor
{
    public partial class Form1 : Form
    {
        public Action<string> GoogleAction;
        public Action<string> EdgeAction;
        public Action<string> MozillaAction;
        public threadPoolClass poolClass;
        public Form1()
        {
            GoogleAction = showGoogleUrl;
            EdgeAction = showEdgeUrl;
            MozillaAction = showMozillaUrl;
            poolClass = new threadPoolClass(GoogleAction, EdgeAction, MozillaAction);
            InitializeComponent();
        }
        public void showEdgeUrl(string url)
        {
            if (InvokeRequired)
            {
                Invoke(EdgeAction, url);
                return;
            }

            if (!(EdgeListBox.Items.Cast<String>().ToList().Contains(url)) && !string.IsNullOrWhiteSpace(url))
            {
                EdgeListBox.Items.Add(url);
            }
        }

        public void showMozillaUrl(string url)
        {
            if (InvokeRequired)
            {
                Invoke(MozillaAction, url);
                return;
            }

            if (!(MozillaListBox.Items.Cast<String>().ToList().Contains(url)) && !string.IsNullOrWhiteSpace(url))
            {
                MozillaListBox.Items.Add(url);
            }


        }

        public void showGoogleUrl(string url)
        {
            if (InvokeRequired)
            {
                Invoke(GoogleAction, url);
                return;
            }
           
            if(!(GoogleListBox.Items.Cast<String>().ToList().Contains(url)) &&  !string.IsNullOrWhiteSpace(url))
            {
                GoogleListBox.Items.Add(url);
            }
          
            
        }

     
    }
}
