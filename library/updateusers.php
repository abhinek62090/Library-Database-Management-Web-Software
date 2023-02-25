<?php
	include 'connect.php';
class book extends connect
{
    public $r1,$r2,$r3,$r4,$r5,$r6,$r7;
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
			print "<td>".$db_field['saddress']."</td>";
			print "<td>".$db_field['semail']."</td>";
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
			while($db_field=mysqli_fetch_assoc($result))
			{
				$this->r1=$db_field['staff_id'];
				$this->r2=$db_field['sname'];
				$this->r3=$db_field['scontact'];
				$this->r4=$db_field['semail'];
				$this->r5=$db_field['saddress'];
				$this->r6=$db_field['spassword'];
				$this->r7=$db_field['stype'];
				}
	    	 }
	}

    public function update()
    {
        if($this->db_handle)
        {
            $sql="update users set sname='$_POST[t2]' ,scontact='$_POST[t3]' ,semail='$_POST[t4]' ,saddress='$_POST[t5]' ,spassword='$_POST[t6]' ,stype='$_POST[t7]' where staff_id='$_POST[t1]' ";
            mysqli_query($this->db_handle,$sql);
            echo"<script language=javascript> alert('Record Update')</script>";
        }
    }
}
$obj=new book();
if(isset($_REQUEST["b1"]))
    $obj->update();
if(isset($_REQUEST["b2"]))
    $obj->allsearch();
if(isset($_REQUEST["b3"]))
    $obj->psearch();
	
	echo "<link rel='stylesheet' href='users.css'>";
	echo "<center> <form name=f method=post action=updateusers.php>";
	echo "<table style='align-items: center;
    justify-content: center;
    margin-top: 15%;'>
	      <tr><th>STAFF ID</th><th><input type=text name=t1 value=$obj->r1></th></tr>";
	echo "<tr><th>STAFF NAME</th><th><input type=text name=t2 value=$obj->r2></th></tr>";
	echo "<tr><th>STAFF CONTACT</th><th><input type=text name=t3 value=$obj->r3></th></tr>";
	echo "<tr><th>STAFF EMAIL</th><th><input type=text name=t4 value=$obj->r4></th></tr>";
	echo "<tr><th>STAFF ADDRESS</th><th><input type=text name=t5 value=$obj->r5></th></tr>";
	echo "<tr><th>STAFF PASSWORD</th><th><input type=text name=t6 value=$obj->r6></th></tr>";
	echo "<tr><th>STAFF TYPE</th><th><input type=text name=t7 value=$obj->r7></th></tr>";
	echo "<th colspan=2><input type=button value=NEW onclick=rs()>
	      <input type=submit value=UPDATE name=b1>
	      <input type=submit value=ALLSEARCH name=b2>
	      <input type=submit value=PSEARCH name=b3></th></tr></table></center>";
	
	echo "<script>function rs(){
			f.t1.value=''
			f.t2.value=''
			f.t3.value=''
			f.t4.value=''
			f.t5.value=''
			f.t6.value=''
			f.t7.value=''
		}
		</script>";
?>