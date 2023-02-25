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
		$result=mysqli_query($this->db_handle, "select * from student");
		print "<table border=1>
	 	<tr>
		<th>Student ID</th>
		<th>Student First Name</th>
		<th>Student Last Name</th>
		<th>Student Course</th>
		<th>Student Year</th>
		<th>Student Contact</th>	
		<th>Student Age</th>
		<th>Student Birthday</th>
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
				$this->r1=$db_field['stud_id'];
				$this->r2=$db_field['sfnm'];
				$this->r3=$db_field['slnm'];
				$this->r4=$db_field['scourse'];
				$this->r5=$db_field['syear'];
				$this->r6=$db_field['scontact'];
				$this->r7=$db_field['sage'];
				$this->r8=$db_field['sbirthdt'];
                $this->r9=$db_field['sgender'];
				}
	    	 }
	}

    public function update()
    {
        if($this->db_handle)
        {
            $sql="update student set sfnm='$_POST[t2]' ,slnm='$_POST[t3]' ,scourse='$_POST[t4]' ,syear='$_POST[t5]' ,scontact='$_POST[t6]' ,sage='$_POST[t7]' ,sbirthdt='$_POST[t8]',sgender='$_POST[t9]' where stud_id='$_POST[t1]' ";
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
	
	echo "<link rel='stylesheet' href='student.css'>";
	echo "<center> <form name=f method=post action=updatestudent.php>";
	echo "<table style='align-items: center;
    justify-content: center;
    margin-top: 15%;'>
	      <tr><th>STUDENT ID</th><th><input type=text name=t1 value=$obj->r1></th></tr>";
	echo "<tr><th>STUDENT FIRST NAME</th><th><input type=text name=t2 value=$obj->r2></th></tr>";
	echo "<tr><th>STUDENT LAST NAME</th><th><input type=text name=t3 value=$obj->r3></th></tr>";
	echo "<tr><th>STUDENT COURSE</th><th><input type=text name=t4 value=$obj->r4></th></tr>";
	echo "<tr><th>STUDENT YEAR</th><th><input type=text name=t5 value=$obj->r5></th></tr>";
	echo "<tr><th>STUDENT CONTACT</th><th><input type=text name=t6 value=$obj->r6></th></tr>";
	echo "<tr><th>STUDENT AGE</th><th><input type=text name=t7 value=$obj->r7></th></tr>";
	echo "<tr><th>STUDENT BIRTH DATE</th><th><input type=text name=t8 value=$obj->r8></th></tr>";
	echo "<tr><th>STUDENT GENDER</th><th><input type=text name=t9 value=$obj->r9></th></tr>";
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