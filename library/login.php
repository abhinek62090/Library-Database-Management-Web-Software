<?php
include 'connect.php';
class login extends connect
{
    
    public function __construct()
    {
        parent::__construct();
    }
    public function loginform()
    {
        
        $result=mysqli_query($this->db_handle, "select * from login where id='$_POST[t1]' and pwd='$_POST[t2]' ");
        while($db_field=mysqli_fetch_assoc($result))
        if($db_field)
		{
					echo "<script>";
                    echo "window.open('menu.html','_self')";
                    echo "</script>";
		}
    }	
}			
$obj=new login();
if(isset($_REQUEST["b1"]))
    $obj->loginform();

    echo "<link rel='stylesheet' href='login.css'>";
    echo "<center>";
    echo "<form name=f method=post action=login.php>";
    echo "<table>"; 
    echo "<tr><th class=label>ID</th><th><input type=text name=t1></th></tr>";
    echo "<tr><th class=label>Password</th><th><input type=password name=t2></th></tr>";
    echo "<tr><th colspan=2><input type=submit value='Login' name=b1 onclick='login()'>";
    echo "</table>";
    echo "</form>";
?>