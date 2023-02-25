<?php
include 'connect.php';
class users extends connect
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
         public function input()
    {
        if($this->db_handle)
        {
			$result=mysqli_query($this->db_handle, "select staff_id from users where staff_id='$_POST[t1]' ");
				while($db_field=mysqli_fetch_assoc($result))
				{
						if($db_field['staff_id']==$_POST["t1"])
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
							$sql="insert into users values('$_POST[t1]' , '$_POST[t2]' , '$_POST[t3]' , '$_POST[t4]' , '$_POST[t5]' , '$_POST[t6]' , '$_POST[t7]')";
							mysqli_query($this->db_handle,$sql);
							echo"<script language=javascript> alert('Record Save')</script>";
						}
        			}
    			}
    }
$obj=new users();
if(isset($_REQUEST["b1"]))
    $obj->input();
if(isset($_REQUEST["b2"]))
    $obj->allsearch();
if(isset($_REQUEST["b3"]))
    $obj->psearch();

    echo "<link rel='stylesheet' href='users.css'>";
    echo "<center>";
    echo "<form name=f method=post action=users.php>";
    echo "<table>";
    echo "<tr><th class=label>Staff ID</th><th><input type=text name=t1></th></tr>";
    echo "<tr><th class=label>Name</th><th><input type=text name=t2 onkeypress='return allowOnlyChar(event,this);'></th></tr>";
    echo "<tr><th class=label>Contact</th><th><input type=text name=t3 onkeypress='return allowOnlyNumbers(event,this);'></th></tr>";
    echo "<tr><th class=label>Address</th><th><input type=text name=t4></th></tr>";
    echo "<tr><th class=label>Email</th><th><input type=text name=t5></th></tr>";
    echo "<tr><th class=label>Password</th><th><input type=text name=t6></th></tr>";
    echo "<tr><th class=label>Type</th><th><input type=number name=t7></th></tr>";
    echo "<tr><th colspan=2><input type=button value=New><input type=submit value=Save name=b1>";
    echo "<input type=submit value=AllSearch name=b2><input type=submit value=PSearch name=b3><input type=button value=Home onclick='home()'></th></tr>";
    echo "</table>";
    echo "</form>";
    echo "<script src='file.js'></script>";
?>