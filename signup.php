<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $pass, $database) 
    or die("Error " . mysqli_error($link));
$link->set_charset("utf8");
$nickname=$_POST['nickname'];
$password=$_POST['password'];
$last_name=$_POST['last_name'];
$first_name=$_POST['first_name'];
if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['nickname']) && isset($_POST['password']) && $nickname!='' && $password!='' && $first_name!='' && $last_name!=''){
$passcode =  password_hash($password, PASSWORD_DEFAULT);
    $result=mysqli_query($link,"INSERT INTO person (nickname,password,first_name,last_name)VALUES ('$nickname','$passcode','$first_name','$last_name')");         
 	if ($result=='true') { echo"OK"; 
 	session_start();
	$_SESSION[$nickname] = $nickname;
	setcookie("username", $nickname);
	setcookie("password", $password);
$url = './profile/index.php';
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
 } 
		else { echo'<span style="color: red; font-weight: bold;">Please choose another nickname</span><br><a href="./">Go back</a>'; } 
} else {
	echo'<span style="color: red; font-weight: bold;">Please fill all required fields</span><br><a href="./">Go back</a>'; 
}

 mysqli_close($link);
 ?>