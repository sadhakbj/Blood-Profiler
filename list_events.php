<?php

require_once("connect.php");

if($_SESSION){

require_once("header.php");

}
else {

require_once("header1.php");

}

?>
	<?php
	if($_SESSION) {
		?>
		<center>
		<a href="create_event.php" class="btn btn-success"> Create a New Events </a> <br> <br>
	</center>
		<?php

	}

?>

<div class="well" style="background-color: #dadada;">

<h4>  Upcomming Events:  </h4>

	</div>


<! end of source code for using time >

	<div class ="well">

		<?php 

		$getE  = mysql_query("select * FROM events ORDER BY id DESC");

		while($getArt = mysql_fetch_assoc($getE)) {

			//event_id
			$id = $getArt['id'];

			$eventName = $getArt['event_name'];
			$eventDesc = $getArt['event_description'];
			$eventdate = $getArt['event_date'];
			$eventLoc  = $getArt['event_location'];
			$startTime = $getArt['start_time'];
			$endTime = $getArt['end_time'];

			$desc_short = substr($eventDesc, 0,120)

			?>
			<div class="well" style="background-color: white;">

			<b> <i><?php  echo $eventName;  ?>  </b>  </i> &nbsp  on &nbsp <?php echo $eventdate ?> <hr>
			
			<?php  echo $desc_short."....";  ?> <br> 
			<?php echo "<a href='events.php?id=$id'> <br></b> Details... </a>";   ?>
			 <hr>


		</div>
			<?php

		}

		?>


	</div>

	

