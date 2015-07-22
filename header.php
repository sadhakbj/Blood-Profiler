<?php
require_once("connect.php");
?>

<!doctype html >
<html lang="en" ng-app="myApp">

<head>
	<meta charset="UTF-8">
<title>   Blood Profiler -- </title>
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		
</head>
<body>

  
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
 
	   <a href="#" class="navbar-brand"> Blood Profiler </a>
	   	   </div>
		   <div class="navbar-collapse collapse">
		       <ul class="nav navbar-nav">
			     <li> <a href="#" style="margin-left: 260px"> &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp
   				 </a> </li>
				 
				 
				 <li> <a href="#"> Home </a> </li>
				  <?php 
				 if($_SESSION) {
				 echo "<li> <a href='profile.php?u=$user_logged_in'>";
				 echo $user_logged_in;	
				 echo "</a>";
				 
				 }
				 else {
					
					echo "<li><a href='signup.php' title='Log In and Sign Up Here'> Sign up </a> </li>";
				 }
				 
				 ?>
				 
				 
				
		
		  </a> </li>

		  <?php 

		  //check for message
		  $getMsg = mysql_query("select * from messages WHERE receiver ='$user_logged_in'") or die("mysql_error()");
		  $count = mysql_num_rows($getMsg);

		  ?>

				 <li> <a href="list_article.php"> Articles </a> </li>
				 <li> <a href="list_events.php"> Events </a> </li>
				 <li>  <a href="view_messages.php"> Msg (<?php  echo $count ?>) 

				  </a>  </li>
				 			     <li class="dropdown"> 
				 <a href="#" class="dropdown-toggle" data-toggle="dropdown" > Settings  <b class="caret"> </b> </a>  
				     <ul class="dropdown-menu">
					   <li> <a href="account_settings.php"> Account Settings</a>  </li>
					   <li> <a href="log_out.php"> Log Out</a>  </li>
					   <li> <a href="#"> Privacy</a>  </li>
					   					   
					 </ul>
				 </li>
				 	<li>
				 	<form action="search.php" method="GET" id="search">
				 	<input type="search" Placeholder="Search ........... For People and Places" id='input-box' name="q" style="width: 100px; margin-top: 15px; height: 25px;  line-height: 20px;border: 1px solid #CCC;border-right: none; border-radius: 3px 0 0 3px; " onFocus="enlarge()" onBlur="restore()" />
				 	<button name="src" class="btn btn-primary" id='input-search' style="width: 25px; height:25px; border: 1px solid #CCC;border-left: none; border-radius: 0 3px 3px 0;height: 25px; line-height: 24px; 	background: no-repeat url(yt-img.png)  -20px -1451px; background-color: #ccc;"  onFocus="enlarge()" onBlur="restore()" />  </button>
				
				</form>
				 </li>     
			     		   
			   </ul>
		   
		</div>
		</div>
		</div>
		
		<div class="container"> 
		
		<!this is the javascript code for search bar expanding >
		
<script type="text/javascript">
	var maxWidth = 120;
	var inpBox = document.getElementById('input-box');
	var originalWidth = parseInt(inpBox.style.width);
	var expandBy = 0;
	
	window.setInterval(
			function(){
				newWidth = parseInt(inpBox.style.width) + expandBy;
				
				if(newWidth >= maxWidth)
					newWidth = maxWidth;
				else if(newWidth <= originalWidth)
					newWidth = originalWidth;
					
				inpBox.style.width = newWidth + "px";
				
			}
		, 20);
	
	function enlarge(){
		expandBy = 20;
	}
	
	function restore(){
		expandBy = -20;
	}
</script>


<script src ="js/jquery.js"> </script>
<script src ="js/bootstrap.js"> </script>
 <script src="js/angular.js"></script>
 <script src="js/jquery.js"></script>
<script src="js/jquery_new.js"> </script>
<script src="js/jquery.form.js"> </script>
<script src="js/script.js"></script>

</body>

</title>



