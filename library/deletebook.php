<?php
include 'connect.php';
class deletebook extends connect
{
    
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

    public function delete()
    {
        if($this->db_handle)
        {
            $sql= "delete from book where book_id='$_POST[t1]'";
            mysqli_query($this->db_handle,$sql);
            echo"<script language=javascript> alert('Record Deleted')</script>";
        }
    }
}
$obj=new deletebook();
if(isset($_REQUEST["b1"]))
    $obj->delete();
if(isset($_REQUEST["b2"]))
    $obj->allsearch();
if(isset($_REQUEST["b3"]))
    $obj->psearch(); 


	echo "<link rel='stylesheet' href='book.css'>";
    echo "<center>";
    echo "<form name=f method=post action=deletebook.php>";
    echo "<table style='align-items: center;
    justify-content: center;
    margin-top: 15%;'>";
    echo "<tr><th class=label>Book ID</th><th><input type=text name=t1></th></tr>";
    echo "<tr><th colspan=2><input type=button value=New onclick=rs()><input type=submit value=Delete name=b1><input type=submit value=AllSearch name=b2><input type=submit value=PSearch name=b3></th></tr>";
    echo "</table>";
    echo "</form>";
    echo "<script>
        function rs()
        {
            f.t1.value=''
        }
            </script>"
?>