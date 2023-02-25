<?php
include 'connect.php';
class deletestudent extends connect
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
         public function delete()
         {
             if($this->db_handle)
             {
                 $sql= "delete from student where stud_id='$_POST[t1]'";
                 mysqli_query($this->db_handle,$sql);
                 echo"<script language=javascript> alert('Record Deleted')</script>";
             }
         }
}
$obj=new deletestudent();
if(isset($_REQUEST["b1"]))
    $obj->delete();
if(isset($_REQUEST["b2"]))
    $obj->allsearch();
if(isset($_REQUEST["b3"]))
    $obj->psearch();

    echo "<link rel='stylesheet' href='student.css'>";
    echo "<center>";
    echo "<form name=f method=post action=deletestudent.php>";
    echo "<table style='align-items: center;
    justify-content: center;
    margin-top: 15%;'>";
    echo "<tr><th class=label>Student ID</th><th><input type=text name=t1></th></tr>";
    echo "<tr><th colspan=2><input type=button value=New><input type=submit value=Delete name=b1>";
    echo "<input type=submit value=AllSearch name=b2><input type=submit value=PSearch name=b3></th></tr>";
    echo "</table>";
    echo "</form>";
?>