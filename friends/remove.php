<?php 
					require_once '../connection.php';
					$link = mysqli_connect($host, $user, $pass, $database) 
					    or die("Error " . mysqli_error($link));
					$link->set_charset("utf8");
					$nickname=$_COOKIE["username"];
					$password=$_COOKIE["password"];
					if (!isset($_SESSION[$nickname]))
					{
						// $nickname=$_GET['nickname'];
						// echo $_GET['nickname'];
						$result=mysqli_query($link,"SELECT * FROM person where nickname='$nickname'");
					 	$myrow= mysqli_fetch_array($result);
					 	$password_hash = $myrow['password'];
					 	if(isset($_GET['friend_nickname'])) { $friend_nickname=$_GET['friend_nickname']; } 
						if(password_verify($password , $password_hash))
						{
							$result=mysqli_query($link,"DELETE FROM relationship where (((person_1 in (select id from person where nickname='$friend_nickname')) and (person_2 in (select id from person where nickname='$nickname'))) or ((person_2 in (select id from person where nickname='$friend_nickname')) and (person_1 in (select id from person where nickname='$nickname'))))");         
 	if ($result=='true') { echo'<span style="color: red; font-weight: bold;">OK</span>'; 
     $url = '../profile/index.php?nickname='.$friend_nickname;
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();} 
		else { echo'<span style="color: red; font-weight: bold;">Something went wrong</span>'.$nickname.$friend_nickname; } 
						}
						else
						{
						     echo'<span style="color: red; font-weight: bold;">Please authorize</span>'; 
						}
					}
					 mysqli_close($link);

				?>