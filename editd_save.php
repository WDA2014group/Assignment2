<?php
include('dbcon.php');
$filename=$_POST['filename'];
$filetype=$_POST['filetype'];

$N = count($filename);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("UPDATE filetable SET permission='$filetype[$i]' where filename='$filename[$i]'")or die(mysql_error());
}
 header("location: editdocument.php");

?>