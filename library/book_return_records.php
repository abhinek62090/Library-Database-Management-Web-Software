<?php
    include 'connect.php';
    class book_return_records extends connect
    {
        
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
                         <th>BORROWERS ID</th>
                         <th>Book ID</th>
                         <th>Book Title</th>
                         <th>Student ID</th>
                         <th>Staff ID</th>
                         <th>Student No Copies</th>
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
                     print "<table border=1>
                     <tr>
                     <th>BORROWERS ID</th>
                     <th>Book ID</th>
                     <th>Book Title</th>
                     <th>Student ID</th>
                     <th>Staff ID</th>
                     <th>Student No Copies</th>
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
     
     
         public function input()
		{
			if($this->db_handle)
			{
				$re=mysqli_query($this->db_handle, "select * from borrowers_records where borrowers_id='$_POST[t1]' ");
				$b=1;
				while($db_field=mysqli_fetch_assoc($re))
				{
					if($db_field['borrowers_id']==$_POST["t1"])
					{
						$b=0;
						break;
					}
				}
				$rr=mysqli_query($this->db_handle,"select * from book where book_id='$_POST[t2]'");
				$c=1;
				while($db_field=mysqli_fetch_assoc($rr))
				{
					if($db_field['book_id']==$_POST["t2"])
					{
						$c=0;   //book id found
						break;
					}
				}
				$br=mysqli_query($this->db_handle,"select * from student where stud_id='$_POST[t4]' ");
				$d=1;
				while($db_field=mysqli_fetch_assoc($br))
				{
					if($db_field['stud_id']==$_POST["t4"])
					{
						$d=0;
						break;
					}
				}
				$cr=mysqli_query($this->db_handle,"select * from users where staff_id='$_POST[t5]' ");
				$e=1;
				while($db_field=mysqli_fetch_assoc($cr))
				{
					if($db_field['staff_id']==$_POST["t5"])
					{
						$e=0;
						break;
					}
				}
				if($b==0)
				{
					if($c==0)
					{
						if($d==0)
						{
							if($e==0)
							{
								$sql="insert into book_return_records values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]','$_POST[t6]','$_POST[t7]','$_POST[t8]')";
								mysqli_query($this->db_handle,$sql);
								echo "<script>alert('RECORD SAVE')</script>";
							}
							else
								echo "<script>alert('Staff Id does not match')</script>";
						}
						else
							echo "<script>alert('Student Id does not match')</script>";
					}
					else
						echo "<script>alert('Book id does not match')</script>";
				}
				else
					echo "<script>alert('Borrower Id already exsits')</script>";
			
				
			}
		}
    }
    $obj=new book_return_records();
if(isset($_REQUEST["b1"]))
    $obj->input();
if(isset($_REQUEST["b2"]))
    $obj->allsearch();
if(isset($_REQUEST["b3"]))
    $obj->psearch();

    echo "<link rel='stylesheet' href='book_return_records.css'>";
    echo "<center>";
    echo "<form name=f method=post action=book_return_records.php>";
    echo "<table style='align-items: center;
    justify-content: center;
    margin-top: 15%;'>";
    echo "<tr><th class=label>Borrowers ID</th><th><input type=text name=t1></th></tr>";
    echo "<tr><th class=label>Book ID</th><th><input type=text name=t2></th></tr>";
    echo "<tr><th class=label>Book Title</th><th><input type=text name=t3 onkeypress='return allowOnlyChar(event,this);'></th></tr>";
    echo "<tr><th class=label>Student ID</th><th><input type=text name=t4></th></tr>";
    echo "<tr><th class=label>Staff ID</th><th><input type=text name=t5></th></tr>";
    echo "<tr><th class=label>Student No Copies</th><th><input type=text name=t6></th></tr>";
    echo "<tr><th class=label>Release Date</th><th><input type=number name=t7></th></tr>";
    echo "<tr><th class=label>Due Date</th><th><input type=text name=t8></th></tr>";
    echo "<tr><th colspan=2><input type=button value=New><input type=submit value=Save name=b1>";
    echo "<input type=submit value=AllSearch name=b2><input type=submit value=PSearch name=b3><input type=button value=Home onclick='home()'></th></tr>";
    echo "</table>";
    echo "</form>";
    echo "</body>";
    echo "<script src='file.js'></script>";
?>