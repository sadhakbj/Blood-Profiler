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

	if(isset($_GET['article'])) {
		//value send by previous page
		$article_id = $_GET['article'];

		//check if this article exists

		$checkArticle = mysql_query("SELECT * FROM article where article_id ='$article_id'") or die(mysql_error());
		$getData = mysql_fetch_assoc($checkArticle);

		if($getData) {


            //convert to string
			$articleTitle = $getData['title'];
			$articleBody = $getData['body'];
            $ar_id = $getData['article_id'];
			$posted_by = $getData['postedby'];





echo " <div class='row'>
            <div class='col-lg-8'>" ;

            echo " <h1><a href='#'> $articleTitle
                </h1>";
                
?>              
                <p class="lead">by <a href="index.php"> <?php  echo $posted_by; ?></a>
                </p>
                

                <hr>
                <p>
                    <span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM    
                    &nbsp &nbsp
                    <?php 

                    //if current logged in user is the poster then he can delete it::
                    if(@$user_logged_in == $posted_by) {

                        
                        echo "<span class='badge pull-right'><a  style='color: white;'' href='delete_article.php?id=$ar_id '>Delete</span>';
                           </a>";                        
                    }


                    ?>
                     </p> 
                
                <hr>
               
                <hr>
               <?php   echo $articleBody; ?>
                
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

                			$saveComment = mysql_query("insert into comments values ('' ,'$article_id' , '$commentValue','$user_logged_in')") or die(mysql_error());
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

                $get_comments = mysql_query("select * from comments where post_id ='$article_id'") or die(mysql_error());
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
Recent Articles:
</center>

<?php
	
	
	$get = mysql_query("select * from article  ORDER BY article_id LIMIT 4");
	while($row = mysql_fetch_assoc($get)) {
		
		//art means the message
		$art_id = $row['article_id'];
		$art = $row['body'];
		$tite = $row['title'];
		$posted_by = $row['postedby'];
		
		$art_short = substr($art, 0 , 50);

		?>

		<?php
		
echo "
	<a style='text-decoration: none; color: #888;' href='article.php?article=$art_id'><b> <em>$tite</b> </em> </a>  by  <em> $posted_by </em> ";
	echo '<p>';
	echo $art_short ."....";
	echo '</p>';

	echo "<a href='#'> Read More ...</a>";
	echo"<hr>";


				
	}

	echo "<center> <a href='articles.php'>See more arciles </center> </a>";
	
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

