<?php
require_once('common.php');

	if (isset($_POST['registersub'])){
		// Get user input
		$name=$_POST['name'];
		$pw = $_POST['pw'];
        $email = $_POST['email'];
		$type = "U";
		$error=registerUser($name,$pw,$email,$type);
	}	


?>



<?php if ((!isset($_POST['registersub'])) || ($error != '') ) {?>
<form   method="post" action='register.php'>
    <table>
        <tr>
            <td><label for="txtname">username:</label></td>
            <td><input type="text" id="name" name="name" /></td>
        </tr>
        <tr>
            <td><label for="txtpswd">password:</label></td>
            <td><input type="password" id="pw" name="pw" /></td>
        </tr>
		<tr>
            <td><label for="txtpswd">email:</label></td>
            <td><input type="text" id="email" name="email" /></td>
        </tr>
        <tr>
            <td colspan=2>
                <input type="reset" value="Reset">
                <input id="sub" type="submit"  name="registersub" value="Submit"/>
        </tr>
    </table>
</form> <?php } ?>

<?php echo "<br/>" ; if (isset($_POST['registersub'])){ 
	if ($error == '') {
		echo " User: $name was registered successfully!<p><br /></p>";
		echo ' <a href="login.php">Click here to login</a><p><br /></p>';
		?>
		<?php
	} else {
		echo $error;
	}
} ?>
