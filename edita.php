<?php 
include('header.php');
?>
<body>
<br>

<div class="container">
<a href="editaccount.php" class="btn btn-inverse">return</a>
<form class="form-horizontal" action="edita_save.php" method="post">    
<?php
include('dbcon.php');



$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("SELECT * FROM usertable where username='$id[$i]'");
	while($row = mysql_fetch_array($result))
	  { ?>
	  <div class="thumbnail">
	<div class="control-group">
    <label class="control-label" for="inputEmail">UserName</label>
    <div class="controls">
 	<input name="username[]" type="hidden" value="<?php echo  $row['username'] ?>" />
		<input name="username[]" type="text" disabled value="<?php echo $row['username'] ?>" />
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="inputEmail">UserType</label>
    <div class="controls">
		<input name="usertype[]" type="text" value="<?php echo $row['usertype'] ?>" />
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