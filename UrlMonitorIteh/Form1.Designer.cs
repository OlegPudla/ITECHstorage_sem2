namespace URLmonitor
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.GoogleListBox = new System.Windows.Forms.ListBox();
            this.EdgeListBox = new System.Windows.Forms.ListBox();
            this.MozillaListBox = new System.Windows.Forms.ListBox();
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // GoogleListBox
            // 
            this.GoogleListBox.FormattingEnabled = true;
            this.GoogleListBox.Location = new System.Drawing.Point(24, 26);
            this.GoogleListBox.Name = "GoogleListBox";
            this.GoogleListBox.ScrollAlwaysVisible = true;
            this.GoogleListBox.Size = new System.Drawing.Size(235, 186);
            this.GoogleListBox.TabIndex = 0;
            // 
            // EdgeListBox
            // 
            this.EdgeListBox.FormattingEnabled = true;
            this.EdgeListBox.Location = new System.Drawing.Point(286, 26);
            this.EdgeListBox.Name = "EdgeListBox";
            this.EdgeListBox.ScrollAlwaysVisible = true;
            this.EdgeListBox.Size = new System.Drawing.Size(235, 186);
            this.EdgeListBox.TabIndex = 2;
            // 
            // MozillaListBox
            // 
            this.MozillaListBox.FormattingEnabled = true;
            this.MozillaListBox.Location = new System.Drawing.Point(542, 26);
            this.MozillaListBox.Name = "MozillaListBox";
            this.MozillaListBox.ScrollAlwaysVisible = true;
            this.MozillaListBox.Size = new System.Drawing.Size(235, 186);
            this.MozillaListBox.TabIndex = 3;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(102, 9);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(66, 13);
            this.label1.TabIndex = 4;
            this.label1.Text = "Google URL";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(368, 10);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(57, 13);
            this.label2.TabIndex = 6;
            this.label2.Text = "Edge URL";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(621, 9);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(64, 13);
            this.label3.TabIndex = 7;
            this.label3.Text = "Mozilla URL";
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(789, 232);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.MozillaListBox);
            this.Controls.Add(this.EdgeListBox);
            this.Controls.Add(this.GoogleListBox);
            this.Name = "Form1";
            this.Text = "Form1";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.ListBox GoogleListBox;
        private System.Windows.Forms.ListBox EdgeListBox;
        private System.Windows.Forms.ListBox MozillaListBox;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label3;
    }
}

