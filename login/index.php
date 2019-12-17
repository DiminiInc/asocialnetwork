<?php
require_once '../connection.php';

$link = mysqli_connect($host, $user, $pass, $database) 
    or die("Error " . mysqli_error($link));
$link->set_charset("utf8");
$nickname=$_POST['nickname'];
$password=$_POST['password'];
$result=mysqli_query($link,"SELECT * FROM users where nickname='$nickname'");
 $myrow= mysqli_fetch_array($result);
 $password_hash = $myrow['password'];
if(password_verify($_POST['password'] , $password_hash))
{
     echo'<span style="color: red; font-weight: bold;">nice</span>'; 
}
else
{
     echo'<span style="color: red; font-weight: bold;">fail</span>'; 
}
 mysqli_close($link);
 ?>