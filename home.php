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

		
	
	$get = mysql_query("select * from article  ORDER BY article_id DESC LIMIT 1");
	while($row = mysql_fetch_assoc($get)) {
		
		$art = $row['body'];
		$title = $row['title'];
		$posted_by = $row['postedby'];


echo " <div class='row'>
            <div class='col-lg-8'>" ;

            echo " <h1><a href='#'> $title 
                </h1>";
                
?>              
                <p class="lead">by <a href="index.php"> <?php  echo $posted_by; ?></a>
                </p>
                

                <hr>
                <p>
                    <span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                <hr>
               
                <hr>
               <?php   echo $art; ?>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


<?php


	}
		


?>

 

</div>

 <div class="col-lg-4">
                <div class="well">
                    
                    <div class="input-group">                       
                        
                        
                    </div>


<center><h4>
Recent Articles:
</center>
	<?php
	
	
	$get = mysql_query("select * from article  ORDER BY article_id LIMIT 2");
	while($row = mysql_fetch_assoc($get)) {
		
		//art means the message
		$art_id = $row['article_id'];
		$art = $row['body'];
		$tite = $row['title'];
		$posted_by = $row['postedby'];
		//given value ko suru ko 50 ota matrai string lincha
		
		$art_short = substr($art, 0 , 50);

		?>

		<?php
		
echo "
	<a style='text-decoration: none; color: #888;' href='article.php?article=$art_id'><b> <em>$tite</b> </em> </a>  by  <em> $posted_by </em> ";
	echo '<p>';
	echo $art_short ."....";
	echo '</p>';

	echo "<a href='#'> Read More .. Comment .. Like </a>";
	echo"<hr>";


				
	}

	echo "<center> <a href='articles.php'>See more arciles </center> </a>";
	
	?>
			
</div>

<div class="well">
<center><h4>
Upcomming Programs:
</center>
 <br>

 Blood Donation Program @ KU...
</div>


</div>



<!this ends the main container>
</div>


<div class="well" style="width: 100%; margin-top: 30px;">
Footer
	</div>