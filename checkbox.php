<?php include 'header.php'; ?>

  
   If CheckBox1.Checked = False And CheckBox2.Checked = False And CheckBox3.Checked = False And CheckBox4.Checked = False And CheckBox5.Checked = False And CheckBox6.Checked = False Then
            MsgBox("Please select atleast one activity")

        Else
            If CheckBox1.Checked Then
                CheckBox1.Text = CheckBox1.Text

            Else : CheckBox1.Text = ""
            End If

            If CheckBox2.Checked = True Then
                CheckBox2.Text = CheckBox2.Text

            Else : CheckBox2.Text = ""
            End If

            If CheckBox3.Checked = True Then
                CheckBox3.Text = CheckBox3.Text

            Else : CheckBox3.Text = ""
            End If

            If CheckBox4.Checked = True Then
                CheckBox4.Text = CheckBox4.Text

            Else : CheckBox4.Text = ""
            End If

            If CheckBox5.Checked = True Then
                CheckBox5.Text = CheckBox5.Text

            Else : CheckBox5.Text = ""
            End If

            If CheckBox6.Checked = True Then
                CheckBox6.Text = CheckBox6.Text

            Else : CheckBox6.Text = ""
            End If
            txtactivity.Text = CheckBox1.Text + " " + CheckBox2.Text + " " + CheckBox3.Text + " " + CheckBox4.Text + " " + CheckBox5.Text + " " + CheckBox6.Text