<?php

require_once("connect.php");

if($_SESSION){

require_once("header.php");

}
else {

require_once("header1.php");

}


?>
<div class="well">
	<h1>  Welcome To Blood Profiler</h1>
	<h4> Blood Profiler aims to  sove your problems related to blood  </h4>

	<?php
	//if there is a session then we will display another menu
		if($_SESSION) {

			?>
			<center>
			<a href="list_article.php" class="btn btn-lg btn-primary"> View Articles </a> <br> <br>
			<a href="list_events.php" class="btn btn-lg btn-warning"> View Events </a> <br> <br>

			<a href="create_article.php" class="btn btn-lg btn-danger"> Create New Article </a> <br> <br>

			<a href="create_events.php" class="btn btn-lg btn-success"> Create a New Events </a> <br> <br>

		</center>

			<?php

		}

		else {


			?>
			<br>
			<center>
				<a href="signup.php" class="btn btn-lg btn-warning"> Create a new Account </a> <br> <br>
				
			<a href="list_article.php" class="btn btn-lg btn-primary"> View Articles </a>  <br> <br> 
			
			<a href="list_events.php" class="btn btn-lg btn-success"> View Evetns  </a>

		</center>

			<?php


}




	?>