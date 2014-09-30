<?php


session_start();

function registerUser($name,$pw,$email,$type){
$errorText = '';
$taken='';
$reg="/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{6,12}$/";
$regname="/^[0-9a-zA-Z]{2,15}$/";
$regemail="/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/";
$type = "U";
$con = mysql_connect("localhost","webadmin","123");
mysql_select_db("filerepository", $con);
$query = "SELECT * FROM usertable where username='$name'";
    $result = mysql_query($query, $con);
	
if (mysql_num_rows($result) != 0) 
	$taken=true;
if (!preg_match($regname,$name))
{
$errorText = "Name could be combination of any letters or numbers,2-15 digits.";
} else 
if ($taken==true)
{
$errorText="This name has been taken";
} else 
if ($pw=='')
{
$errorText = "Password must be filled!";
} else
if (!preg_match($reg,$pw)) {
$errorText = "Password at least one number and one letter and 6-12 digits long";
} 
else
if (!preg_match($regemail,$email))
{
$errorText = "Email address is invalid";
}
if ($errorText == '')
{
$query = "insert into usertable values('$name','$pw','$email','$type')";
    $result = mysql_query($query, $con);
}
mysql_close($con);
return $errorText;
}
	



	


function loginUser($user,$pass){
	$errorname = '';
	$errorpass ='';
	$validUser = false;
	$exist='';
	$errorText='';
	
	$con = mysql_connect("localhost","webadmin","123");
    mysql_select_db("filerepository", $con);
    $query = "SELECT * FROM usertable where username='$user'";
    $result = mysql_query($query, $con);
	// Check user existance	
	if (mysql_num_rows($result) != 0) 
	  {
	  $exist=true;
	  $row = mysql_fetch_row($result);
	  if ($row[1]==$pass)
      {
	  $_SESSION['userName'] = $user;
	  $_SESSION['userType'] = $row[3];
	  $validUser= true;
	  }
	  else
	  {
	  $errorpass=true;
	  }
	  }
	  else {
	  $exist=false;
	  $errorname=true;
	}
	if ($errorname==true) $errorText = "Username does not exist";
	else if ($errorpass==true) $errorText = "Wrong password";

    if ($validUser == true) $_SESSION['validUser'] = true;
	mysql_close($con);
	return $errorText;	
}


function logoutUser(){
	unset($_SESSION['validUser']);
	unset($_SESSION['userName']);
	unset($_SESSION['userType']);
}



?>
