<?php
	include 'connect.php';
class dropusers extends connect
{
    
    	public function __construct()
    	{
        	parent::__construct();
    	}
		public function search($s)
	{
		
		if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,$s);
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
				print "<td>".$db_field['stud_id']."</td>";
				print "<td>".$db_field['sfnm']."</td>";
				print "<td>".$db_field['slnm']."</td>";
				print "<td>".$db_field['scourse']."</td>";
				print "<td>".$db_field['syear']."</td>";
				print "<td>".$db_field['scontact']."</td>";
				print "<td>".$db_field['sage']."</td>";
				print "<td>".$db_field['sbirthdt']."</td>";
                print "<td>".$db_field['sgender']."</td>";
			}
			echo "<body><input type=button value=print onclick=window.print()></body>";
		}
	}
		public function searching()
		{
			$field="$_POST[s1]";
			if($field=="all")
				$str="select * from users";
			else
				$str="select * from users where $_POST[s1]='$_POST[t1]' ";
		   $this->search($str);
		}

	
}
$obj=new dropusers();
if(isset($_REQUEST["b1"]))
	$obj->searching();

	echo "<link rel='stylesheet' href='users.css'>";
	echo "<form name=f method=post action=dropusers.php>";
	echo "<table>";
	echo "<tr>
		<th>BOOK</th>
		<th class=label><select name=s1>
			<option>staff_id
			<option>sname
			<option>scontact
			<option>semail
			<option>saddress
			<option>spassword
			<option>stype
			</select>
		</th>
		<th><input type=text name=t1></th>
		<th><input type=submit value=Search name=b1></th>
	      </tr>";
	
?>