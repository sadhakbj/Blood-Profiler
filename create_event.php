<?php

require_once("connect.php");

if($_SESSION){

require_once("header.php");

}
else {

header("location: index.php");

}


?>
<?php 
	if(isset($_POST['event_create'])) {
		//changing input posted values to string

		$eventName = $_POST['EventName'];
		$eventDes = $_POST['eventdesc'];
		$start = $_POST['start_time'];
		$eventLoc = $_POST['loc'];
		$end = $_POST['end_time'];
		$Eventdate = $_POST['EventDate'];
		//time1 is the current time being displayed
		$day1 = time(); // or your date as well
		//time2 is the chosen date
     	$day2 = strtotime($Eventdate);
     	$datediff = $day2 - $day1;
     	$display_days = floor($datediff/(60*60*24) + 1);

     	echo $display_days."  days <br>";

     	if($eventName && $eventDes && $start && $eventLoc && $end && $Eventdate) {

     			if($display_days < 0 ){

     		echo "Date is invalid , please choose proper date";
     	}
     	else {

     		//we can insert not::
     		$saveEvent = mysql_query("insert into events VALUES('','$eventName','$eventDes','$Eventdate','$eventLoc','$start','$end')") or die(mysql_error());
     		echo "<h4> Sucessful !!!! </h4>";

     	}


     	}
     	else {

     		echo "Invalid !!! Please Provide All the data";
     	}

     	



		
	}

	?>

		<script src="tinymce/tinymce.min.js"></script>
		<script>
				tinymce.init({selector:'textarea'});
		</script>
	</head>

<div class="well">

<form action="#" method="POST">
	<p> Event Name </p>
	<input type="text" name="EventName" Placeholder="Give Event Name" class="form-control">
	<p> Event Description </p>
	<textarea
	rows="7"
	cols="7"
	name="eventdesc"
	placeholder="Give Details"
	> </textarea>
	<p>  Choose Date </p>
	<input type="date" name="EventDate" class="form-control"> <br> <br>
	<p> Event Place:  </p>

	<input type="address" class="form-control" name="loc" placeholder="Location of Program">
	<p> Starting Time </p>
	<input type="time" name="start_time" class="form-control"> <br> <br>
	<p> Ending Time </p>
	<input type="time" name="end_time" class="form-control"> <br> <br>

	<input type="submit" value="Create Event" name="event_create" class="btn btn-primary">