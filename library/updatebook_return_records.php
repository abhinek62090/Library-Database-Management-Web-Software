<?php
	include 'connect.php';
class book extends connect
{
    public $r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8;
    public function __construct()
    {
        parent::__construct();
    }
    public function allsearch()
   {		
	if($this->db_handle)
	{
		$result=mysqli_query($this->db_handle, "select * from book_return_records");
		print "<table border=1>
	 	<tr>
		<th>Borrowers ID</th>
		<th>Book ID</th>
		<th>Book Title</th>
		<th>Student ID</th>
		<th>Staff ID</th>
		<th>Number of copies</th>	
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
            print "</tr>";
		}
	  }
     }
	
      public function psearch()
      {		
		if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle, "select * from book_return_records where borrowers_id='$_POST[t1]' ");
			while($db_field=mysqli_fetch_assoc($result))
			{
				$this->r1=$db_field['borrowers_id'];
				$this->r2=$db_field['book_id'];
				$this->r3=$db_field['btitle'];
				$this->r4=$db_field['stud_id'];
				$this->r5=$db_field['staff_id'];
				$this->r6=$db_field['stud_no_copies'];
				$this->r7=$db_field['releasedt'];
				$this->r8=$db_field['duedt'];
				}
	    	 }
	}

    public function update()
    {
        if($this->db_handle)
        {
            $sql="update book_return_records set book_id='$_POST[t2]' ,btitle='$_POST[t3]' ,stud_id='$_POST[t4]' ,staff_id='$_POST[t5]' ,stud_no_copies='$_POST[t6]' ,releasedt='$_POST[t7]' ,duedt='$_POST[t8]' where borrowers_id='$_POST[t1]' ";
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
	
	echo "<link rel='stylesheet' href='book_return_records.css'>";
	echo "<center> <form name=f method=post action=updatebook_return_records.php>";
	echo "<table style='align-items: center;
    justify-content: center;
    margin-top: 15%;'>
	      <tr><th class=label>BORROWERS ID</th><th><input type=text name=t1 value=$obj->r1></th></tr>";
	echo "<tr><th class=label>BOOK ID</th><th><input type=text name=t2 value=$obj->r2></th></tr>";
	echo "<tr><th class=label>BOOK TITLE</th><th><input type=text name=t3 value=$obj->r3></th></tr>";
	echo "<tr><th class=label>STUDENT ID</th><th><input type=text name=t4 value=$obj->r4></th></tr>";
	echo "<tr><th class=label>STAFF ID</th><th><input type=text name=t5 value=$obj->r5></th></tr>";
	echo "<tr><th class=label>STUDENT NO COPIES</th><th><input type=text name=t6 value=$obj->r6></th></tr>";
	echo "<tr><th class=label>RELEASE DATE</th><th><input type=text name=t7 value=$obj->r7></th></tr>";
	echo "<tr><th class=label>DUE DATE</th><th><input type=text name=t8 value=$obj->r8></th></tr>";
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
			f.t8.value=''
		}
		</script>";
?>