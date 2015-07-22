<?php

require_once("connect.php");

if($_SESSION){

require_once("header.php");

}
else {

require_once("header1.php");

}

if(isset($_GET['id'])) {

	$article_id = $_GET['id'];

	

	//check again if the same person is poster 

	$check = mysql_query("select * from article where article_id ='$article_id' ") or die(mysql_error());
	$get = mysql_fetch_assoc($check);

	if($get) {

		$postedBy = $get['postedby'];

		if($postedBy == $user_logged_in)
		{

			$delete = mysql_query("delete from article where article_id = '$article_id'") or die(mysql_error());
			header("location: list_article.php?delete==sucess*7&&&^&^&^");
			exit();
		}
		else {

			header("location: article.php?article=$article_id");
			exit();
		}
	}  



	}



?>