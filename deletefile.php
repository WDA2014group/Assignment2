<?php
include('dbcon.php');

if (isset($_POST['delete'])){
$id=$_POST['selector'];
$T = count($id);
for($l=0; $l< $T; $l++)
{   
	$result1 = mysql_query("SELECT filepath FROM filetable where filename='$id[$l]'");
    $row2=mysql_fetch_assoc($result1);
    $array[$j]=$row2;

						   foreach($array[$j] as $a)
                          {							  
						   $file="$a$id[$l]";
                            unlink($file);
						  }
}
$id=$_POST['selector'];

$N = count($id);
for($i=0; $i < $N; $i++)
{


$result = mysql_query("DELETE from filetable where filename='$id[$i]'");
}
header("location: deletedocument.php");

}
?>