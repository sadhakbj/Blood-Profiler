<?php

require_once("connect.php");

if($_SESSION){

require_once("header.php");

}
else {

header("location: index.php");

}


?>

<div class="well"> <h3>  Your Messages  </h3> </div>

<div class="well">
<?php 
	//get messsages::
			//check for message
		  $getMsg = mysql_query("select * from messages WHERE receiver ='$user_logged_in'") or die("mysql_error()");
			while($row = mysql_fetch_assoc($getMsg)) {

					$msg = $row['message'];
					$sender = $row['sender'];
					$rec = $row['receiver'];

					?>

					<hr>

					<div class="well" style="background-color: white">

					<em> <b> <?php echo $sender;  ?> <br>  </em> </b> 
					<?php echo $msg; ?>

					<hr>
				</div>
					<?php


			}


			


?>



</div>