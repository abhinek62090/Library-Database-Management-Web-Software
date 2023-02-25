<?php
	include 'connect.php';
class dropstudent extends connect
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
			<th>Student ID</th>
			<th>Student First Name</th>
			<th>Student Last Name</th>
			<th>Student Course</th>
			<th>Student Year</th>
			<th>Student Contact</th>
			<th>Student Age</th>
			<th>Student Birth Date</th>
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
			}
			echo "<body><input type=button value=print onclick=window.print()></body>";
		}
	}
		public function searching()
		{
			$field="$_POST[s1]";
			if($field=="all")
				$str="select * from student";
			else
				$str="select * from student where $_POST[s1]='$_POST[t1]' ";
		   $this->search($str);
		}

	
}
$obj=new dropstudent();
if(isset($_REQUEST["b1"]))
	$obj->searching();

	echo "<link rel='stylesheet' href='student.css'>";
	echo "<form name=f method=post action=dropstudent.php>";
	echo "<table>";
	echo "<tr>
		<th>BOOK</th>
		<th class=label><select name=s1>
			<option>stud_id
			<option>sfnm
			<option>slnm
			<option>scourse
			<option>syear
			<option>scontact
			<option>sage
			<option>sbirthdt
            <option>sgender
			<option>all
			</select>
		</th>
		<th><input type=text name=t1></th>
		<th><input type=submit value=Search name=b1></th>
	      </tr>";
	
?>