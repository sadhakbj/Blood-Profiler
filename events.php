<?php

require_once("connect.php");

if($_SESSION){

require_once("header.php");

}
else {

require_once("header1.php");

}


?>
<! textarea ko lagi ho yo >
<script src="tinymce/tinymce.min.js"></script>
		<script>
				tinymce.init({selector:'textarea'});
		</script>
	</head>

<div class="well">
<?php
        
        //Get['article'} aghillo page bata pathako value

	if(isset($_GET['id'])) {
		//value send by previous page
		$event_id = $_GET['id'];

		//check if this article exists

		$checkId = mysql_query("SELECT * FROM events where id ='$event_id'") or die(mysql_error());
		$getArt = mysql_fetch_assoc($checkId);

		if($getArt) {


            $id = $getArt['id'];
            $eventName = $getArt['event_name'];
            $eventDesc = $getArt['event_description'];
            $eventdate = $getArt['event_date'];
            $eventLoc  = $getArt['event_location'];
            $startTime = $getArt['start_time'];
            $endTime = $getArt['end_time'];

            $desc_short = substr($eventDesc, 0,120);




echo " <div class='row'>
            <div class='col-lg-8'>" ;

            echo " <h1><a href='#'> $eventName
                </h1>";
                
?>              
                <p class="lead"> on <a href="index.php"> <?php  echo $eventdate; ?> at <?php  echo $eventLoc; ?></a>
                </p>
                <br>
                <b> Program Description: </b>
                
                <p>
                        
                    &nbsp &nbsp
                   
                     </p> 
                
                <div class="well" style="background-color: white">
               <?php   echo $eventDesc; ?>
                
                </div>
                <hr>

                 <div class="row" style="width: 90%;  margin-left: 30px; background-color: #dfdfdf; margin-top: 30px;">


                <?php 
                //only logged in user can comment
                if($_SESSION) {

                	                	                	

                	echo "<h4>";
                	echo "You can comment";
                	echo "</h4>";


                		//we will comment okay.....
                	if(isset($_POST['comment'])) {

                		@$commentValue = $_POST['commentBody'];

                		if($commentValue) {

                			//comment_id is auto increment , article_id , comment , user_logged_in

                			$saveComment = mysql_query("insert into event_comments values ('' ,'$event_id' , '$commentValue','$user_logged_in')") or die(mysql_error());
                			$completed = true;
                			$msg = "Your Comment is Posted !!!"

                				?> <br>
                			<script src="js/jquery.js"></script>
                			<center>
							<div class="alert alert-info alert-dismissible" role="alert" style="width: 60%; border: 1px solid red;">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <?php  echo $msg; ?>
							</div>
						</center>
                			
                			<?php
                			
                		}
                		else {

                			$msg = "Field Cannot Be Empty !!"
                			?>
                			<br>
				         <script src="js/jquery.js"></script>

				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				  <?php  echo $msg; ?>
				</div>

                			<?php
                			

                		}

                	}

                	?>
                	<form action="#" method="POST">
                	<textarea rows="3" cols="2" id="comment" name="commentBody">

                	</textarea> <br>

                	<button class="btn btn-info" id="btn_comment" name="comment"> Comment </button>

                </form>

 <?php



 				//lets display the top comments here ok 



                }

                
                else {

                	// if the user is not logged in .. no permission to do anything
                		echo "<h4>";
                		       	echo "Please log in to comment";
                	echo "</h4>";
                }



                ?>
                	
                </div>

                <! this is for displaying comments>

                <br> 
                <?php 

                $get_comments = mysql_query("select * from event_comments where event_id ='$event_id'") or die(mysql_error());
                $count = mysql_num_rows($get_comments);

                ?>

                <h4> Recent Comments (<?php echo $count;  ?> comments) </h4>
                <div class="well" style="background-color: white;"> 
                	<?php   
                	while($get = mysql_fetch_assoc($get_comments)) {

                		$comenter = $get['commented_by'];
                		$com = $get['comment'];

                		?>
                			

                		

                        <b> <?php echo $comenter; ?> </b> <span class="this" style="margin-left: 200px;">  9:41 PM on August 24, 2013  </span>  <br> <hr>
                            <?php   echo $com;   ?>  <hr> <hr>

                			<?php 





                	}

                	?>
               


            </div>


  


</div>

 <div class="col-lg-4">
                <div class="well" style="background-color: #dadada;">
                    
                    <div class="input-group">                       
                        
                        
                    </div>

                    <center><h4>
Other Events:
</center>

<?php
	
	
	$get = mysql_query("select * from events  ORDER BY id LIMIT 4");
	while($row = mysql_fetch_assoc($get)) {
		
		//art means the message
    		$id = $row['id'];
    		$eventN = $row['event_name'];
    		$eventDes = $row['event_description'];

            $eventdate = $row['event_date'];
            $eventLoc  = $row['event_location'];
            $startTime = $row['start_time'];
            $endTime = $row['end_time'];

            $desc_short = substr($eventDes, 0,60)
		
		
		

		?>

		<?php
		
echo "
	<a style='text-decoration: none; color: #888;' href='events.php?id=$id'><b> <em>$eventN</b> </em> </a>  on  <em> $eventdate </em> ";
	echo '<p>';
	echo $desc_short ."....";
	echo '</p>';

	echo "<a href='#'> Read More ...</a>";
	echo"<hr>";


				
	}

	echo "<center> <a href='list_events.php'>See all the Events </center> </a>";
	
	?>
			
</div>

<?php

	
		






			
		}
		else {

			die("this doesnot exists");

		}


	}

	else {

		die("This Page Is not Available");
		exit();
			}
?>

