<?php 
session_start();
?>
<html>
<head>
<title>WDA group 1 Filerepository</title>
<style type="text/css">
body {
	font-family:verdana,arial,sans-serif;
	font-size:10pt;color:white
	margin:10px;
	background-color:#CCCCCC;
	}
</style>
</head>
<body>
<p><a href="home.php" target="_top">Home</a><p>
<?php 

if ((!isset($_SESSION['validUser']))||($_SESSION['validUser'] != true)){?><p><a href="register.php" target="content">Register</a></p>
<p><a href="login.php" target="content">Login</a></p>
<?php }  else {?>
<p><a href="logout.php" target="_top">Logout</a><p>
<?php }?>

 <?php if (isset($_SESSION['userType'])) {
 if($_SESSION['userType']=="U" ) {?>
<p><a href="filetest.php" target="content">Document</a></p> <?php } 
else if ($_SESSION['userType']=="S" ) {?>
<p><a href="filetest.php" target="content">Document</a></p>
<p><a href="editdocument.php" target="content">EditDocument</a></p>
<p><a href="deletedocument.php" target="content">DeleteDocument</a></p>
<?php }
else if ($_SESSION['userType']=="A") {?>
<p><a href="filetest.php" target="content">Document</a></p>
<p><a href="editdocument.php" target="content">EditDocument</a></p>
<p><a href="deletedocument.php" target="content">DeleteDocument</a></p>
<p><a href="editaccount.php" target="content">Editccount</a></p>
<p><a href="deleteaccount.php" target="content">DeleteAccount</a></p>

<?php }
echo $_SESSION['userName'];
}?>



</body>
</html>

