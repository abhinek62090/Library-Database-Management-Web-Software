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
                     $result=mysqli_query($this->db_handle, "select * from borrowers_records");
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
                     $result=mysqli_query($this->db_handle, "select * from borrowers_records where borrowers_id='$_POST[t1]' ");
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

    public function delete()
    {
        if($this->db_handle)
        {
            $sql= "delete from book where borrowers_id='$_POST[t1]'";
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


    echo "<link rel='stylesheet' href='borrowers_records.css'>";
    echo "<center>";
    echo "<form name=f method=post action=deletebook.php>";
    echo "<table style='align-items: center;
    justify-content: center;
    margin-top: 15%;'>";
    echo "<tr><th class=label>Borrowers ID</th><th><input type=text name=t1></th></tr>";
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