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
		<a href="create_article.php" class="btn btn-primary"> Create a New Artice </a> <br> <br>
	</center>
		<?php

	}

?>
<div class="well" style="background-color: #dadada;">

<h4>  The Top Articles of This Site Are:  </h4>

	</div>

<! here begins code for time interval that can be used in coming days>
<?php
	//this is first example , i am using this //
	 /*
	 $now = time(); // or your date as well
     $your_date = strtotime("2014-07-01");
     $datediff = $now - $your_date;
     echo floor($datediff/(60*60*24))."days";

     */
     //end of first example

		// This is second example 
     	/*
		$date1 = "2007-03-24";
		$date2 = "2009-06-26";

		$diff = abs(strtotime($date2) - strtotime($date1));

		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		printf("%d years, %d months, %d days\n", $years, $months, $days);
		*/
		//end of second example , but i am not using it

?>
<! end of source code for using time >

	<div class ="well">

		<?php 

		$getA  = mysql_query("select * FROM article ORDER BY article_id DESC");

		while($getArt = mysql_fetch_assoc($getA)) {

			$id = $getArt['article_id'];
			$Title = $getArt['title'];
			$body = $getArt['body'];
			$poster = $getArt['postedby'];

			$body_short = substr($body, 0,120);

			?>
			<div class="well" style="background-color: white;">

			<b> <i><?php  echo $Title;  ?>  </b>  </i> &nbsp  by <?php echo $poster ?> <hr>
			
			<?php  echo $body_short;  ?> <br> 
			<?php echo "<a href='article.php?article=$id'> <br></b> Read... </a>";   ?>
			 <hr>


		</div>
			<?php

		}

		?>


	</div>

	

