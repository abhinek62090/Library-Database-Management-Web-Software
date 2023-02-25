<?php
include 'connect.php';
class student extends connect
{
    
    public function __construct()
    {
        parent::__construct();
    }
    public function allsearch()
        {		
                 if($this->db_handle)
                 {
                     $result=mysqli_query($this->db_handle, "select * from student");
                     print "<table border=1>
                      <tr>
                         <th>Student ID</th>
                         <th>Student First Name</th>
                         <th>Student Last Name</th>
                         <th>Student Course</th>
                         <th>Year</th>
                         <th>Student Contact</th>
                         <th>Student Age</th>
                         <th>Student Birthday</th>
                         <th>Student Gender</th>
                     </tr>";
                     while($db_field=mysqli_fetch_assoc($result))
                     {
                         print "<tr>";
                         print "<td>".$db_field['stud_id']."</td>";
                         print "<td>".$db_field['sfnm']."</td>";
                         print "<td>".$db_field['slnm']."</td>";
                         print "<td>".$db_field['scourse']."</td>";
                         print "<td>".$db_field['syear']."</td>";
                         print "<td>".$db_field['scontact']."</td>";
                         print "<td>".$db_field['sage']."</td>";
                         print "<td>".$db_field['sbirthdt']."</td>";
                         print "<td>".$db_field['sgender']."</td>";
                         print "</tr>";
                    }
                      }
         }
         
          public function psearch()
               {		
                 if($this->db_handle)
                 {
                     $result=mysqli_query($this->db_handle, "select * from student where stud_id='$_POST[t1]' ");
                     print "<table border=1>
                     <tr>
                         <th>Student ID</th>
                         <th>Student First Name</th>
                         <th>Student Last Name</th>
                         <th>Student Course</th>
                         <th>Year</th>
                         <th>Student Contact</th>
                         <th>Student Age</th>
                         <th>Student Birthday</th>
                         <th>Student Gender</th>
                     </tr>";
                     while($db_field=mysqli_fetch_assoc($result))
                     {
                        print "<td>".$db_field['stud_id']."</td>";
                         print "<td>".$db_field['sfnm']."</td>";
                         print "<td>".$db_field['slnm']."</td>";
                         print "<td>".$db_field['scourse']."</td>";
                         print "<td>".$db_field['syear']."</td>";
                         print "<td>".$db_field['scontact']."</td>";
                         print "<td>".$db_field['sage']."</td>";
                         print "<td>".$db_field['sbirthdt']."</td>";
                         print "<td>".$db_field['sgender']."</td>";
                         print "</tr>";
                     }
                      }
         }
         public function input()
    {
        if($this->db_handle)
        {
			$result=mysqli_query($this->db_handle, "select stud_id from student where stud_id='$_POST[t1]' ");
				while($db_field=mysqli_fetch_assoc($result))
				{
						if($db_field['stud_id']==$_POST["t1"])
						{
							$bid=1;
							break;
						}
				}
						if($bid==1)
						{
							echo "<script>alert('Data already exists')</script>";
						}
						else
						{
							$sql="insert into users values('$_POST[t1]' , '$_POST[t2]' , '$_POST[t3]' , '$_POST[t4]' , '$_POST[t5]' , '$_POST[t6]' , '$_POST[t7]', '$_POST[t8]', '$_POST[t9]')";
							mysqli_query($this->db_handle,$sql);
							echo"<script language=javascript> alert('Record Save')</script>";
						}
        			}
    			}
}
$obj=new student();
if(isset($_REQUEST["b1"]))
    $obj->input();
if(isset($_REQUEST["b2"]))
    $obj->allsearch();
if(isset($_REQUEST["b3"]))
    $obj->psearch();

    echo "<link rel='stylesheet' href='student.css'>";
    echo "<center>";
    echo "<form name=f method=post action=student.php>";
    echo "<table style='align-items: center;
    justify-content: center;
    margin-top: 15%;'>";
    echo "<tr><th class=label>Student ID</th><th><input type=text name=t1></th></tr>";
    echo "<tr><th class=label>First Name</th><th><input type=text name=t2 onkeypress='return allowOnlyChar(event,this);'></th></tr>";
    echo "<tr><th class=label>Last Name</th><th><input type=text name=t3 onkeypress='return allowOnlyChar(event,this);'></th></tr>";
    echo "<tr><th class=label>Student Course</th><th><input type=text name=t4></th></tr>";
    echo "<tr><th class=label>Student Year</th><th><input type=text name=t5></th></tr>";
    echo "<tr><th class=label>Contact</th><th><input type=text name=t6 onkeypress='return allowOnlyNumbers(event,this);'></th></tr>";
    echo "<tr><th class=label>Age</th><th><input type=number name=t7 onkeypress='return allowOnlyNumbers(event,this);'></th></tr>";
    echo "<tr><th class=label>Birth Date</th><th><input type=text name=t8></th></tr>";
    echo "<tr><th class=label>Gender</th><th><input type=text name=t9></th></tr>";
    echo "<tr><th colspan=2><input type=button value=New><input type=submit value=Save name=b1>";
    echo "<input type=submit value=AllSearch name=b2><input type=submit value=PSearch name=b3><input type=button value=Home onclick='home()'></th></tr>";
    echo "</table>";
    echo "</form>";
    echo "</body>";
    echo "<script src='file.js'></script>";
?>