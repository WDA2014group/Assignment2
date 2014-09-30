<html>
<head>
<title>PVCC File Respository System</title>
<style type="text/css">
body {
	font-family:verdana,arial,sans-serif;
	font-size:10pt;
	margin:30px;
	background-color:white;
	}
</style>

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

		?>
		<div id="ShowDiv"></div> 
<script language="javascript"> 
Load("http://127.0.0.1/wda/A2/home.php","index"); 

</script> 
		<?php
	} else {
		echo $error;
	}
} ?>