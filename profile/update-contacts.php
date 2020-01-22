
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
		if(isset($_POST['account'])) { $account=$_POST['account']; }
		if(isset($_POST['account_id'])) { $account_id=$_POST['account_id']; }
		$result=mysqli_query($link,"DELETE from contacts where owner in (SELECT id FROM person where nickname='$nickname')"); 
		for ($i = 0; $i < count($account); $i++) {
			$result = $result AND mysqli_query($link,"INSERT into contacts (owner, account,account_id) values ((SELECT id FROM person where nickname='$nickname'),'$account[$i]', '$account_id[$i]')");
			echo $account[$i]." ".$result;
		}
		if ($result=='true') { echo'<span style="color: red; font-weight: bold;">OK</span>'; 
		$url = '../profile/index.php';
		ob_start();
		header('Location: '.$url);
		ob_end_flush();
		die();
	} 
		else { echo'<span style="color: red; font-weight: bold;">Something went wrong</span>'; } 
	}
	else
	{
		echo'<span style="color: red; font-weight: bold;">Please authorize</span>'; 
	}
}
mysqli_close($link);

?>