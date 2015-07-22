
<br> <br>  <br> <?php

$connect = mysql_connect("localhost" ,"root" , "") or die("cannot connect");
$selectdb = mysql_select_db("blood_profile") or die(mysql_error());

session_start();

if($_SESSION) {
	//the logged user is
	$user_logged_in = $_SESSION['uname'];
	
		}
		else {

			


		}
		
		


?>

<br>
