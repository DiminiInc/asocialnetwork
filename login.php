<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $pass, $database) 
    or die("Error " . mysqli_error($link));
$link->set_charset("utf8");
$nickname=$_POST['nickname'];
$password=$_POST['password'];
$result=mysqli_query($link,"SELECT * FROM person where nickname='$nickname'");
 $myrow= mysqli_fetch_array($result);
 $password_hash = $myrow['password'];
if(password_verify($_POST['password'] , $password_hash))
{
	session_start();
	$_SESSION[$nickname] = $nickname;
	setcookie("username", $nickname);
	setcookie("password", $password);
     echo'<span style="color: red; font-weight: bold;">nice</span>'; 
     $url = './profile/index.php';
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
else
{
     echo'<span style="color: red; font-weight: bold;">fail</span>'; 
}
 mysqli_close($link);
 ?>