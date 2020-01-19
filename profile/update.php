<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" integrity="sha384-zm3nV72ZseVXQf1A4MjCECEgArFvdcPEUUc9iF+UBbfALpO2sUdjKGQriXbM4z+R" crossorigin="anonymous">
		<link type="text/css" rel="stylesheet" href="../stylesheet.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous" defer></script>
		<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" integrity="sha384-NHtbx1Hf6ctHNdZmU28YfhGjB63gcU1YU64ttM+c0RxMKNBj67j+N/axpqTfdffo" crossorigin="anonymous" defer></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js" integrity="sha384-nuT0qw6vBhqN718uyKaI6w1EXH49c5XiMUqmHEEiJadrKmJtmQOVVsd8vTgBpr8h" crossorigin="anonymous" defer></script>
		<script type="text/javascript" src="/global/site-files/javascript.js" defer></script>
		<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#161616">
		<meta name="apple-mobile-web-app-title" content="Dimini Inc.">
		<meta name="application-name" content="Dimini Inc.">
		<meta name="msapplication-TileColor" content="#161616">
		<meta name="msapplication-TileImage" content="/mstile-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<meta name="viewport" content="initial-scale=1" id="viewport">
		<meta name="mailru-domain" content="8D5ZHxJsjMRCp9En" />
		<title>A Social Network - Dimini Inc.</title>
		<meta name="description" content="A social network - Dimini Inc."> 
		<link rel="canonical" href="https://asocialnetwork.dimini.tk"> 
		<link rel="alternate" hreflang="en" href="https://asocialnetwork.dimini.tk/en" /> 
		<link rel="alternate" hreflang="ru" href="https://asocialnetwork.dimini.tk/ru" /> 
		<meta property="og:title" content="a social network - Dimini Inc." /> 
		<meta property="og:type" content="website" /> 
		<meta property="og:url" content="https://asocialnetwork.dimini.tk" /> 
		<meta property="og:image" content="./asocialnetwork.png" /> 
		<meta property="og:description" content="A social network - Dimini Inc." />
	</head>
	<body>
        <?php include("../../../global/tagmanager.php"); ?>
		<div id="site" class="asocial-network">
			<?php include("../notification.php"); ?>
			<?php include("../header.php"); ?>
			<div id="asocialnetwork_content">

				<div id="head-section">
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
							if(isset($_POST['mother'])) { $mother=$_POST['mother']; }
							if(isset($_POST['father'])) { $father=$_POST['father']; }
							if(isset($_POST['religion'])) { $religion=$_POST['religion']; }
							if(isset($_POST['political_views'])) { $political_views=$_POST['political_views']; }
							$result=mysqli_query($link,"UPDATE person set last_name='$last_name',first_name='$first_name',middle_name='$middle_name',sex='$sex',birth_day='$birth_day', birth_month='$birth_month', birth_year='$birth_year', city='$city', country='$country', mother='$mother', father='$father', religion='$religion', political_views='$political_views' where id=(SELECT id FROM person where nickname='$nickname')");         
 	if ($result=='true') { echo"Информация в базу успешно добавлена"; } 
		else { echo'<span style="color: red; font-weight: bold;">Информация в базу не добавлена</span>'; } 
							$result=mysqli_query($link,"SELECT * FROM person");
					 		$myrow= mysqli_fetch_array($result);
					 		echo $myrow['first_name'].' '. $myrow['middle_name'].' '. $myrow['last_name']."<br>";
					 		echo $myrow['sex']."<br>";
					 		echo $myrow['birth_day'].'/'. $myrow['birth_month'].'/'. $myrow['birth_year']."<br>";
					 		echo $myrow['city'].', '. $myrow['country']."<br>";
					 		echo $myrow['mother']."<br>";
					 		echo $myrow['father']."<br>";
					 		echo $myrow['religion']."<br>";
					 		echo $myrow['political_views']."<br>";
						}
						else
						{
						     echo'<span style="color: red; font-weight: bold;">fail</span>'; 
						}
					}
					 while($myrow=mysqli_fetch_array($result));
					 mysqli_close($link);

				?>
					<a href="/test/practice-6/profile/edit.php">Edit</a>
				</div>
				<div class="data-section">
					Friends
					DB tables
				</div>
			</div>
			<?php include("../footer.php"); ?>
		</div>
	</body>
</html>