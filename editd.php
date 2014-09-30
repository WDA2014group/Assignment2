<?php 
include('header.php');
?>
<body>
<br>

<div class="container">
<a href="editdocument.php" class="btn btn-inverse">return</a>
<form class="form-horizontal" action="editd_save.php" method="post">    
<?php
include('dbcon.php');



$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("SELECT * FROM filetable where filename='$id[$i]'");
	while($row = mysql_fetch_array($result))
	  { ?>
	  <div class="thumbnail">
	<div class="control-group">
    <label class="control-label" for="inputEmail">FileName</label>
    <div class="controls">
 	<input name="filename[]" type="hidden" value="<?php echo  $row['filename'] ?>" />
		<input name="filename[]" type="text" disabled value="<?php echo $row['filename'] ?>" />
    </div>
    </div>

	<div class="control-group">
    <label class="control-label" for="inputEmail">FileFolder</label>
    <div class="controls">
 	<input name="filefolder[]" type="hidden" value="<?php echo  $row['filepath'] ?>" />
		<input name="filefolder[]" type="text" disabled value="<?php echo $row['filepath'] ?>" />
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="inputEmail">FileType</label>
    <div class="controls">
		<input name="filetype[]" type="text" value="<?php echo $row['permission'] ?>" />
    </div>
    </div>
	
	
	</div>

	<br>
	

	
	  
	  <?php 
	  }
}

?>
<input name="" class="btn btn-success" type="submit" value="Update">
</form>
</div>
</body>
</html>