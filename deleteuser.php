<?php
include('dbcon.php');

if (isset($_POST['delete'])){
$id=$_POST['selector'];
$T = count($id);
for($l=0; $l< $T; $l++)
{   
	$result1 = mysql_query("SELECT username FROM usertabel where username='$id[$l]'");
    $row2=mysql_fetch_assoc($result1);
    $array[$j]=$row2;

						   foreach($array[$j] as $a)
                          {							  
						   $file="$a$id[$l].pdf";
                            unlink($file);
						  }
}
$id=$_POST['selector'];

$N = count($id);
for($i=0; $i < $N; $i++)
{


$result = mysql_query("DELETE from usertable where username='$id[$i]'");
}
header("location: deleteaccount.php");

}
?>