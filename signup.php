<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $pass, $database) 
    or die("Error " . mysqli_error($link));
$link->set_charset("utf8");
$nickname=$_POST['nickname'];
$password=$_POST['password'];
$passcode =  password_hash($password, PASSWORD_DEFAULT); // leave the salt as this function will automatically generate a secure one for you
    $result=mysqli_query($link,"INSERT INTO person (nickname,password)VALUES ('$nickname','$passcode')");         
 	if ($result=='true') { echo"Информация в базу успешно добавлена"; } 
		else { echo'<span style="color: red; font-weight: bold;">Информация в базу не добавлена</span>'; } 
	$result=mysqli_query($link,"INSERT INTO person (first_name,last_name)VALUES ('$nickname','$nickname')");         
 	if ($result=='true') { echo"Информация в базу успешно добавлена"; } 
		else { echo'<span style="color: red; font-weight: bold;">Информация в базу не добавлена</span>'; } 
 mysqli_close($link);
 ?>