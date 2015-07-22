<?php

require_once("connect.php");

if($_SESSION){

require_once("header.php");

}
else {

header("location: index.php");

}


?>
		<script src="tinymce/tinymce.min.js"></script>
		<script>
				tinymce.init({selector:'textarea'});
		</script>
	</head>
	
	<?php
	@$tit = $_POST['article_title'];
	@$bod = $_POST['article'];
	

	if(isset($_POST['submit'])) {

		if($tit && $bod) {
	

		$insert = mysql_query("insert into article values ('','$tit' ,'$bod' ,'$user_logged_in','')") or die(mysql_error());
		$DisplayMessage = true;
		$msg = "You Article has been posted";
	
	}
	else {

		$Error = true;
		$err_msg = "<b> Error !!! </b> You Need To Provide both Title and Body";


	}
	
	}
	
	//get and display it:
	
	
	

	
	
	?>
	
	
	<?php      
          if( isset($DisplayMessage) && $DisplayMessage ){
      ?>
  	
<script src="js/jquery.js"></script>

<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <?php  echo $msg; ?>
</div>


  



  <?php }  ?>


  <! this is for error occuring case >

  <?php      
          if( isset($Error) && $Error ){
      ?>
  	
<script src="js/jquery.js"></script>

<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only" title="close">Close</span></button>
  <?php  echo $err_msg; ?>
</div>


  



  <?php }  ?>


	
	
	
	
	<body>
	
								

		<form action="#" method="POST">

		<input type="text" name="article_title" 
		placeholder="Article Title"  
		class="form-control"/>

		<textarea rows="7" cols="30"
		name="article"
	 	class="form-control"
		 ></textarea>
		 <br>
		<input type="submit" name="submit" value="Post Your Article" class="btn btn-success" />

		</form>


<script type="text/javascript">
$(document).ready(function() {

$('input[type="submit"]').attr('disabled', true);
$('input[type="text"]').on('keyup',function() {
    if($(this).val() != '' && $(this).val().length >= 3 ) {
        $('input[type="submit"]').attr('disabled' , false);
    }else{
        $('input[type="submit"]').attr('disabled' , true);
    }
});

});
</script>
								
<script type="text/javascript">
	var text_area = document.getElementById()

</script>

	
								</body>