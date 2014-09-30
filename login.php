<?php

	require_once('common.php');

	if (isset($_POST['loginsub'])){
		// Get user input
		$user=$_POST['username'];
        $pass =$_POST['pass'];
		$error=loginUser($user,$pass);
	}	
?>	
<script src="js/drop.js"></script> 
<script src="js/timeout.js"></script> 
<?php if (((!isset($_POST['loginsub'])) || ($error != '')) && (!isset($_SESSION['userName']))) {?>
<form   method="post" action='login.php'>
    <table>
        <tr>
            <td><label for="txtname">username:</label></td>
            <td><input type="text" id="username" name="username" /></td>
        </tr>
        <tr>
            <td><label for="txtpswd">password:</label></td>
            <td><input type="password" id="pass" name="pass" /></td>
        </tr>
        <tr>
            <td colspan=2>
                <input type="reset" value="Reset">
                <input id="sub" type="submit"  name="loginsub" value="Submit"/>
        </tr>
    </table>
</form> <?php } 
		  if (isset($_SESSION['userName']) &&(!isset($_POST['loginsub'])))
		  echo "You have login,please logout first.";
		  ?>
        </div>
		<p><br/></p>
		<?php echo "<br/>" ; if (isset($_POST['loginsub'])){ 
		if ($error == '') {
		echo " User:  $user logged in successfully!<p><br /></p>";
        echo ' <a href="home.php"target="_top">Click here to home page</a><p><br /></p>';
		?>


</script> 
		<?php
	} else {
		echo $error;
	}
} ?>