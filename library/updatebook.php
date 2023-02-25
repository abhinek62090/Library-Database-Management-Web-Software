<?php
	include 'connect.php';
class book extends connect
{
    public $r1,$r2,$r3,$r4,$r5,$r6,$r7,$r8,$r9;
    public function __construct()
    {
        parent::__construct();
    }
    public function allsearch()
   {		
	if($this->db_handle)
	{
		$result=mysqli_query($this->db_handle, "select * from book");
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
	  }
     }
	
      public function psearch()
      {		
		if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle, "select * from book where book_id='$_POST[t1]' ");
			while($db_field=mysqli_fetch_assoc($result))
			{
				$this->r1=$db_field['book_id'];
				$this->r2=$db_field['btitle'];
				$this->r3=$db_field['bedition'];
				$this->r4=$db_field['bauthor'];
				$this->r5=$db_field['bpublisher'];
				$this->r6=$db_field['bcopies'];
				$this->r7=$db_field['bsource'];
				$this->r8=$db_field['bcost'];
				$this->r9=$db_field['bremarks'];
			}
	    	 }
	}

    public function update()
    {
        if($this->db_handle)
        {
            $sql="update book set btitle='$_POST[t2]' ,bedition='$_POST[t3]' ,bauthor='$_POST[t4]' ,bpublisher='$_POST[t5]' ,bcopies='$_POST[t6]' ,bsource='$_POST[t7]' ,bcost='$_POST[t8]',bremarks='$_POST[t9]' where book_id='$_POST[t1]' ";
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
	
	echo "<link rel='stylesheet' href='book.css'>";
	echo "<center> <form name=f method=post action=updatebook.php>";
	echo "<table style='align-items: center;
    justify-content: center;
    margin-top: 15%;'>
	      <tr><th class=label>BOOK ID</th><th><input type=text name=t1 value=$obj->r1></th></tr>";
	echo "<tr><th class=label>BOOK TITLE</th><th><input type=text name=t2 value=$obj->r2></th></tr>";
	echo "<tr><th class=label>BOOK EDITION</th><th><input type=text name=t3 value=$obj->r3></th></tr>";
	echo "<tr><th class=label>BOOK AUTHOR</th><th><input type=text name=t4 value=$obj->r4></th></tr>";
	echo "<tr><th class=label>BOOK PUBLISHER</th><th><input type=text name=t5 value=$obj->r5></th></tr>";
	echo "<tr><th class=label>BOOK COPIES</th><th><input type=text name=t6 value=$obj->r6></th></tr>";
	echo "<tr><th class=label>BOOK SOURCE</th><th><input type=text name=t7 value=$obj->r7></th></tr>";
	echo "<tr><th class=label>BOOK COST</th><th><input type=text name=t8 value=$obj->r8></th></tr>";
	echo "<tr><th class=label>BOOK REMARKS</th><th><input type=text name=t9 value=$obj->r9></th></tr>";
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
			f.t9.value=''
		}
		</script>";
?>