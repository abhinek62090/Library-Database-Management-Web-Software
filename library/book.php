<?php
include 'connect.php';
class book extends connect
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

    public function input()
    {
        if($this->db_handle)
        {
			$result=mysqli_query($this->db_handle, "select book_id from book where book_id='$_POST[t1]' ");
				while($db_field=mysqli_fetch_assoc($result))
				{
						if($db_field['book_id']==$_POST["t1"])
						{
							$bid=1;
							break;
						}
				}
				$bid=0;
				if($bid==1)
				{
					echo "<script>alert('Data already exists')</script>";
				}
				else
				{
					$sql="insert into book values('$_POST[t1]' , '$_POST[t2]' , '$_POST[t3]' , '$_POST[t4]' , '$_POST[t5]' , '$_POST[t6]' , '$_POST[t7]' ,  '$_POST[t8]' ,  '$_POST[t9]')";
					mysqli_query($this->db_handle,$sql);
					echo"<script language=javascript> alert('Record Save')</script>";
				}
        }
    }
}
$obj=new book();
if(isset($_REQUEST["b1"]))
    $obj->input();
if(isset($_REQUEST["b2"]))
    $obj->allsearch();
if(isset($_REQUEST["b3"]))
    $obj->psearch();

	echo "<link rel='stylesheet' href='book.css'>";
	echo "<form name=f method=post action=book.php>
	<input type=button value=Home name=home onclick=home()>
	</form>";
    echo "<center>";
    echo "<form name=f method=post action=book.php>";
    echo "<table style='align-items: center;
    justify-content: center;
    margin-top: 15%;'>";
    echo "<tr><th class=label>Book ID</th><th><input type=text name=t1></th></tr>";
    echo "<tr><th class=label>Book Title</th><th><input type=text name=t2 onkeypress='return allowOnlyChar(event,this);'></th></tr>";
    echo "<tr><th class=label>Book Edition</th><th><input type=text name=t3></th></tr>";
    echo "<tr><th class=label>Book Author</th><th><input type=text name=t4 onkeypress='return allowOnlyChar(event,this);'></th></tr>";
    echo "<tr><th class=label>Book Publisher</th><th><input type=text name=t5 onkeypress='return allowOnlyChar(event,this);'></th></tr>";
    echo "<tr><th class=label>Copies</th><th><input type=text name=t6></th></tr>";
    echo "<tr><th class=label>Source</th><th><input type=text name=t7></th></tr>";
    echo "<tr><th class=label>Cost</th><th><input type=text name=t8></th></tr>";
    echo "<tr><th class=label>Remarks</th><th><input type=text name=t9></th></tr>";
    echo "<tr><th colspan=2><input type=button value=New><input type=submit value=Save name=b1>";
    echo "<input type=submit value=AllSearch name=b2><input type=submit value=PSearch name=b3><input type=button value=Home onclick='home()'></th></tr>";
    echo "</table>";
    echo "</form>";
	echo "<script src='file.js'></script>";
?>