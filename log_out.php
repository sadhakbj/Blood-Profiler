<?php
session_start();
require_once("connect.php");
if(! $_SESSION) {
header("location: index.php");
}
else {

session_destroy();
header("location: index.php");
exit();

	}



?>