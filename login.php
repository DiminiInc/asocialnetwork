<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $pass, $database) 
or die("Error " . mysqli_error($link));
$link->set_charset("utf8");
$nickname=$_POST['nickname'];
$password=$_POST['password'];
if(isset($_POST['nickname']) && isset($_POST['password']) && $nickname!='' && $password!=''){
    $result=mysqli_query($link,"SELECT * FROM person where nickname='$nickname'");
    $myrow= mysqli_fetch_array($result);
    $password_hash = $myrow['password'];
    if(password_verify($_POST['password'] , $password_hash))
    {
       session_start();
       $_SESSION[$nickname] = $nickname;
       setcookie("username", $nickname);
       setcookie("password", $password);
       echo'<span style="color: red; font-weight: bold;">OK</span>'; 
       $url = './profile/index.php';
       ob_start();
       header('Location: '.$url);
       ob_end_flush();
       die();
   }
   else
   {
       echo'<span style="color: red; font-weight: bold;">Wrong credentials</span><br><a href="./">Go back</a>'; 
   }
} else {
   echo'<span style="color: red; font-weight: bold;">Please fill all required fields</span><br><a href="./">Go back</a>'; 
}

mysqli_close($link);
?>