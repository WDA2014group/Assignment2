<?php
include('header.php');
include('dbcon.php');
session_start();
$c=0;
if (isset($_SESSION['userType'])) {
							if($_SESSION['userType']=="U"){
							$query=mysql_query("select * from filetable where permission='U'")or die(mysql_error());}
							else if($_SESSION['userType']=="S"){
							$query=mysql_query("select * from filetable where permission='U' or permission='S'")or die(mysql_error());}
							else
                            $query=mysql_query("select * from filetable ")or die(mysql_error());
							}
while($row=mysql_fetch_array($query))

{
if ($c>1){?>
    <a href="filefolder/<?php echo $row['filename']; ?>" > <?php echo $row['filename'];?> <br />
	<?php }
$c++;
}


?>