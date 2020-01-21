
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
						if(password_verify($password , $password_hash))
						{
							if(isset($_POST['first_name'])) { $first_name=$_POST['first_name']; }
							if(isset($_POST['last_name'])) { $last_name=$_POST['last_name']; }
							if(isset($_POST['middle_name'])) { $middle_name=$_POST['middle_name']; }
							if(isset($_POST['sex'])) { $sex=$_POST['sex']; }
							if(isset($_POST['birth_day'])) { $birth_day=$_POST['birth_day']; }
							if(isset($_POST['birth_month'])) { $birth_month=$_POST['birth_month']; }
							if(isset($_POST['birth_year'])) { $birth_year=$_POST['birth_year']; }
							if(isset($_POST['city'])) { $city=$_POST['city']; }
							if(isset($_POST['country'])) { $country=$_POST['country']; }
							if(isset($_POST['religion'])) { $religion=$_POST['religion']; }
							if(isset($_POST['political_views'])) { $political_views=$_POST['political_views']; }
							$result=mysqli_query($link,"UPDATE person set last_name='$last_name',first_name='$first_name',middle_name='$middle_name',sex='$sex',birth_day='$birth_day', birth_month='$birth_month', birth_year='$birth_year', city='$city', country='$country', religion='$religion', political_views='$political_views' where  nickname='$nickname'");         
 	if ($result=='true') { echo'<span style="color: red; font-weight: bold;">OK</span>'; 
     $url = '../profile/index.php';
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();} 
		else { echo'<span style="color: red; font-weight: bold;">Something went wrong</span>'; } 
						}
						else
						{
						     echo'<span style="color: red; font-weight: bold;">Please authorize</span>'; 
						}
					}
					 while($myrow=mysqli_fetch_array($result));
					 mysqli_close($link);

				?>