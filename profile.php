<?php

require_once("connect.php");

if($_SESSION){

require_once("header.php");

}
else {

require_once("header1.php");

}


?>
		<script src="js/modal.js"> </script>

<?php

	if(isset($_GET['u'])) {
		//value send by previous page
		$user_sent = $_GET['u'];

		

		//check if the username exists::

		$check_un = mysql_query("select uname from blood_profile.users WHERE uname = '$user_sent'" );
		$count = mysql_num_rows($check_un);

		if($count == 1 ) {

			//let them stay on this page
					}
		else {

			die("Sorry !! This page is not available");


		}



	}
	else {

		die("Not proper username provided");
	}


?>

<! adding to the circles , it will be similar to google plus here >

		<?php 

		if(isset($_POST['add'])) {

		//	$user_sent is the current profile's person , $user_logged_in is the logged in user

		$add_circ = mysql_query("insert into circles values ('','$user_logged_in','$user_sent')") or die(mysql_error());
		
		

			

		}



				?>


				<! End of adding circles >
		




						<?php 

						//this is used to

						if(isset($_POST['send_msg'])) {

							//check if the value is given
							$message = $_POST['msg_value'];

							if($message) {

								//we will save this in database okay sarkar::
								$send = mysql_query("insert into messages values('','$message','$user_logged_in','$user_sent')") or die(mysql_error());
								$sent = true;
								$msg ="Your Message has been sent";

								
													}
													else {

														$error = true;
														$msg = "Cannot Send Message !! Please try again";

													}


						}


						?>




				  <?php      
					     if(isset($sent) && $sent ){
					      ?>
					  	
					<script src="js/jquery.js"></script>

					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only" title="close">Close</span></button>
					  <?php  echo $msg; ?>
					</div>
  					<?php }  ?>


				
					  <?php      
					     if(isset($error) && $error ){
					      ?>
					  	
					<script src="js/jquery.js"></script>

					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only" title="close">Close</span></button>
					  <?php  echo $msg; ?>
					</div>
  					<?php }  ?>
		  					



		<div class="well" style="min-height: 200px;">
		<div class="left"> 

			<! in this left part we will now show user's name and some of the informations >
			<?php
			//get information from the database::


			
			$get_info = mysql_query("select * from blood_profile.users WHERE uname = '$user_sent'" );
			//save it in array
			$row = mysql_fetch_assoc($get_info);

			
			$firstn = $row['fname'];
			$lastn = $row['lname'];
			$un = $row['uname'];
			$email = $row['email'];
			$add = $row['address'];
			$bld = $row['group'];
			$profilepic = $row['img'];
			echo "<h4>";
			echo $firstn;
			echo "   ";
			echo $lastn;
			echo " (".$un." )";



			if($_SESSION){

				if($user_logged_in != $user_sent)


				{

					//check if this person is already in your list
						$checkIfalready = mysql_query("select * from circles where user1 ='$user_logged_in' and user2 ='$user_sent'");
						if(mysql_fetch_assoc($checkIfalready)) {

							?>

							<button class='btn btn-primary' name='rem_circles' style='margin-left: 20px;' title="<?php  echo $user_sent ?> is in Your Circles"> In Your Circles </button>
							<a href="#msg" class="btn btn-primary btn-info"  style="width: 300px;" data-toggle="modal"> Send Message </a>




   <div class="modal fade" id="msg" aria-hidden="true">
				<div class="modal-dialog"> 
				<div class="modal-content"> 
				<div class="modal-header"> 
				<h3> Send Message to <?php  echo $user_sent;  ?> </h3>
				</div>
				
			



		
	</head>
	<script src="tinymce/tinymce.min.js"></script>
		<script>
				tinymce.init({selector:'textarea'});
		</script>
		   <div class="modal-body">
		   <form action="#" method="post" id="modal-form" accept-charset="UTF-8">
		    <textarea
		    rows="7"
		    cols="10"
		    name="msg_value"
		    ></textarea>   <br>
		    <button name="send_msg" class="btn  btn-lg btn-success"> Send Message </button>
		     
			
			</form>
			<br> 
			
            
		   </div>
		   
		   <div class="modal-footer">
		     <button class="btn" data-dismiss="modal" aria-hidden="true">  Close </button>
		   
		   </div> </div> </div> </div>
		

			<?php

									}

									else {

					?>
			<form action='#' method='POST'> <button class='btn btn-danger' name='add' style='margin-left: 400px;'> Add to Circles </button>
			Please add to send message
</form>	

				<?php
			
			}
		}
			else {

			echo "<button class='btn btn-primary' style='margin-left: 20px;'> Manage  your page </a>";
		}
		}

			else {

				echo "<a href='singup.php' class='btn btn-danger' style='margin-left: 200px;'> Log In to Add / Send Message </a>";



			}
			echo "<br></h4>";


				?>



				<?php


			echo "<b>Lives In : </b>";
			echo $add."<br>";

			echo "<b> email: </b>";
			echo $email."<br>";

			echo "<b>Blood group::   \t</b>";
			echo $bld;

			



			?>



 </div>
		
			<img class="right" src="<?php echo $profilepic;  ?>" height="10">

			<?php   

			if(@$user_sent == @$user_logged_in)
			{
				?>

			<div class="change"><a href="http://localhost/blood.com/account_settings.php#collapseThree" style="color: #f5f5f5;"> &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp Change Image </a> </div>
			
			 	<?php
			}


			 ?>

</div>

		



   <div class="well" style="min-height: 400px;">

   				<h1> Your Current Location is shown below: </h1>
<section id="wrapper">
Click the allow button to let the browser find your location.

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <article>

    </article>
<script>
function success(position) {
  var mapcanvas = document.createElement('div');
  mapcanvas.id = 'mapcontainer';
  mapcanvas.style.height = '400px';
  mapcanvas.style.width = '600px';

  document.querySelector('article').appendChild(mapcanvas);

  var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  
  var options = {
    zoom: 15,
    center: coords,
    mapTypeControl: false,
    navigationControlOptions: {
    	style: google.maps.NavigationControlStyle.SMALL
    },
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("mapcontainer"), options);

  var marker = new google.maps.Marker({
      position: coords,
      map: map,
      title:"You are here!"
  });
}

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success);
} else {
  error('Geo Location is not supported');
}

</script>
</section>

   </div>


