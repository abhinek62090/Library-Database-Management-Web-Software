<?php
include 'connect.php';
class deleteusers extends connect
{
    
    public function __construct()
    {
        parent::__construct();
    }
    public function allsearch()
        {		
                 if($this->db_handle)
                 {
                     $result=mysqli_query($this->db_handle, "select * from users");
                     print "<table border=1>
                     <tr>
                     <th>Staff ID</th>
                     <th>Staff Name</th>
                     <th>Staff Contact</th>
                     <th>Staff Email</th>
                     <th>Staff Address</th>
                     <th>Staff Password</th>
                     <th>Staff Type</th>
                     </tr>";
                     while($db_field=mysqli_fetch_assoc($result))
                     {
                         print "<tr>";
                         print "<td>".$db_field['staff_id']."</td>";
                         print "<td>".$db_field['sname']."</td>";
                         print "<td>".$db_field['scontact']."</td>";
                         print "<td>".$db_field['semail']."</td>";
                         print "<td>".$db_field['saddress']."</td>";
                         print "<td>".$db_field['spassword']."</td>";
                         print "<td>".$db_field['stype']."</td>";
                         print "</tr>";
                    }
                      }
         }
         
          public function psearch()
               {		
                 if($this->db_handle)
                 {
                     $result=mysqli_query($this->db_handle, "select * from users where staff_id='$_POST[t1]' ");
                     print "<table border=1>
                     <tr>
                     <th>Staff ID</th>
                     <th>Staff Name</th>
                     <th>Staff Contact</th>
                     <th>Staff Email</th>
                     <th>Staff Address</th>
                     <th>Staff Password</th>
                     <th>Staff Type</th>
                 </tr>";
                     while($db_field=mysqli_fetch_assoc($result))
                     {
                        print "<tr>";
                         print "<td>".$db_field['staff_id']."</td>";
                         print "<td>".$db_field['sname']."</td>";
                         print "<td>".$db_field['scontact']."</td>";
                         print "<td>".$db_field['semail']."</td>";
                         print "<td>".$db_field['saddress']."</td>";
                         print "<td>".$db_field['spassword']."</td>";
                         print "<td>".$db_field['stype']."</td>";
                         print "</tr>";
                     }
                      }
         }
         public function delete()
         {
             if($this->db_handle)
             {
                 $sql= "delete from book where staff_id='$_POST[t1]'";
                 mysqli_query($this->db_handle,$sql);
                 echo"<script language=javascript> alert('Record Deleted')</script>";
             }
         }
}
$obj=new deleteusers();
if(isset($_REQUEST["b1"]))
    $obj->delete();
if(isset($_REQUEST["b2"]))
    $obj->allsearch();
if(isset($_REQUEST["b3"]))
    $obj->psearch();

    echo "<link rel='stylesheet' href='users.css'>";
    echo "<center>";
    echo "<form name=f method=post action=deleteusers.php>";
    echo "<table border=5>";
    echo "<tr><th class=label>Staff ID</th><th><input type=text name=t1></th></tr>";
    echo "<tr><th colspan=2><input type=button value=New><input type=submit value=Delete name=b1>";
    echo "<input type=submit value=AllSearch name=b2><input type=submit value=PSearch name=b3></th></tr>";
    echo "</table>";
    echo "</form>";
?>