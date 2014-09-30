<?php


session_start();

function registerUser($name,$pw,$email,$type){
$errorText = '';
$taken='';
$reg="/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{6,12}$/";
$regname="/^[0-9a-zA-Z]{2,15}$/";
$regemail="/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/";
$type = "U";
$con = mysql_connect("localhost","root");
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
	
	$con = mysql_connect("localhost","root");
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

function loginAdmin($user,$pass){
	$errorname = '';
	$errorpass ='';
	$validAdmin = false;
	$exist='';
	$errorText='';
	
	$con = mysql_connect("localhost","root");
    mysql_select_db("redphant", $con);
    $query = "SELECT * FROM admin where name='$user'";
    $result = mysql_query($query, $con);
	// Check user existance	
	if (mysql_num_rows($result) != 0) 
	  {
	  $exist=true;
	  $row = mysql_fetch_row($result);
	  if ($row[1]==$pass)
      {
	  $_SESSION['AdminName'] = $user;
	 
	  $validAdmin= true;
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

    if ($validAdmin == true) $_SESSION['validAdmin'] = true;
	mysql_close($con);
	return $errorText;	
}

function logoutUser(){
	unset($_SESSION['validUser']);
	unset($_SESSION['userName']);
	unset($_SESSION['userType']);
}


function checkUser(){
	
if ((!isset($_SESSION['validUser'])) || ($_SESSION['validUser'] != true))
{
		
echo "hello strange";
}

if ((!isset($_SESSION['validUser'])) || ($_SESSION['validUser'] != true))
{
		
header('Location: login.php');
	
}
}

function checkout($address,$tel,$type,$cardNo,$expire,$name,$username){
$errorText = '';
$regtel="/^\d{8,14}$/";
    $con = mysql_connect("localhost","root");
    mysql_select_db("redphant", $con);
    $query = "UPDATE users SET address = '$address', tel = '$tel'
WHERE username = '$username'";
    $result = mysql_query($query, $con);
	
if ($address=="")
{
$errorText = "Must fill address";
} else
if (!preg_match($regtel,$tel))
{
$errorText = "Tel No. must be 8-14 digits,no hyphen or other token";
} else
if (!preg_match("/[VISA]|[MASTERCARD]/",$type))
{
$errorText = "Must fill VISA or MASTERCARD,ps.all should be uppercase";
} else
if ($cardNo==""){
$errorText = "Must fill Card No";
} else
if (!preg_match("/^(0[1-9]\/201[3-9])|(1[0-2]\/201[3-9])$/",$expire)){
$errorText = "Format should be mm/yyyy,year must be 2013-2019";
} else
if (!preg_match("/^[A-Z][a-zA-Z]+$/", $name) )
{
$errorText = "First letter must be uppercase and all be letters,no space";
}
return $errorText;
}
?>