<?php
include('dbcon.php');
$username=$_POST['username'];
$usertype=$_POST['usertype'];

$N = count($username);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("UPDATE usertable SET usertype='$usertype[$i]' where username='$username[$i]'")or die(mysql_error());
}
 header("location: editaccount.php");

?>