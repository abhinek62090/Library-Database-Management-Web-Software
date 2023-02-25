<?php
	include 'connect.php';
class dropbook extends connect
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
			<th>BOOK ID</th>
			<th>Book Title</th>
			<th>Book Edition</th>
			<th>Book Author</th>
			<th>Publisher</th>
			<th>Number of copies</th>
			<th>Source</th>
			<th>Cost</th>
			<th>Remarks</th>
			</tr>";
			while($db_field=mysqli_fetch_assoc($result))
			{
				print "<tr>";
				print "<td>".$db_field['book_id']."</td>";
				print "<td>".$db_field['btitle']."</td>";
				print "<td>".$db_field['bedition']."</td>";
				print "<td>".$db_field['bauthor']."</td>";
				print "<td>".$db_field['bpublisher']."</td>";
				print "<td>".$db_field['bcopies']."</td>";
				print "<td>".$db_field['bsource']."</td>";
				print "<td>".$db_field['bcost']."</td>";
				print "<td>".$db_field['bremarks']."</td>";
			}
	    	 echo "<body><input type=button value=print onclick=window.print()></body>";
		}
	}
		public function searching()
		{
			$field="$_POST[s1]";
			if($field=="all")
				$str="select * from book";
			else
				$str="select * from book where $_POST[s1]='$_POST[t1]' ";
		   $this->search($str);
		}

	
}
$obj=new dropbook();
if(isset($_REQUEST["b1"]))
	$obj->searching();

	echo "<link rel='stylesheet' href='book.css'>";
	echo "<form name=f method=post action=dropbook.php>";
	echo "<table border=1>";
	echo "<tr>
		<th class=label>BOOK</th>
		<th><select name=s1>
			<option>book_id
			<option>btitle
			<option>bedition
			<option>bauthor
			<option>bpublisher
			<option>bcopies
			<option>bsourse
			<option>bcost
			<option>bremarks
			<option>all
			</select>
		</th>
		<th><input type=text name=t1></th>
		<th><input type=submit value=Search name=b1></th>
	      </tr>";
	
?>