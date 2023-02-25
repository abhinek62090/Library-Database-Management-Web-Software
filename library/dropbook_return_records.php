<?php
	include 'connect.php';
class dropbook_return_records extends connect
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
			<th>Borrowers ID</th>
			<th>Book ID</th>
			<th>Book Title</th>
			<th>Student ID</th>
			<th>Staff ID</th>
			<th>Student No copies</th>
			<th>Release Date</th>
			<th>Due Date</th>
			</tr>";
			while($db_field=mysqli_fetch_assoc($result))
			{
				print "<tr>";
				print "<td>".$db_field['borrowers_id']."</td>";
				print "<td>".$db_field['book_id']."</td>";
				print "<td>".$db_field['btitle']."</td>";
				print "<td>".$db_field['stud_id']."</td>";
				print "<td>".$db_field['staff_id']."</td>";
				print "<td>".$db_field['stud_no_copies']."</td>";
				print "<td>".$db_field['releasedt']."</td>";
				print "<td>".$db_field['duedt']."</td>";
			}
			echo "<body><input type=button value=print onclick=window.print()></body>";
		}
	}
		public function searching()
		{
			$field="$_POST[s1]";
			if($field=="all")
				$str="select * from book_return_records";
			else
				$str="select * from book_return_records where $_POST[s1]='$_POST[t1]' ";
		   $this->search($str);
		}

	
}
$obj=new dropbook_return_records();
if(isset($_REQUEST["b1"]))
	$obj->searching();
	echo "<link rel='stylesheet' href='book_return_records.css'>";
	echo "<form name=f method=post action=dropbook_return_records.php>";
	echo "<table border=1>";
	echo "<tr>
		<th class=label>BOOK</th>
		<th><select name=s1>
			<option>borrowers_id
			<option>book_id
			<option>btitle
			<option>stud_id
			<option>staff_id
			<option>stud_no_copies
			<option>releasedt
			<option>duedt
			<option>all
			</select>
		</th>
		<th><input type=text name=t1></th>
		<th><input type=submit value=Search name=b1></th>
	      </tr>";
	
?>