<?php
require_once("connect.php");

if($_SESSION){

require_once("header.php");
header("location: index.php");

}
else {

require_once("header1.php");

}

?>



<?php
			if(isset($_POST['login'])) {
			
			//select from database 
			$user = $_POST['un'];
			$passw = $_POST['pas'];
			
			$repass = md5($passw);
			
			
			if($user && $passw) {
			
			$get1 = mysql_query("select * from users where uname='$user' && password = '$repass' LIMIT 1 ");
			$coun = mysql_num_rows($get1);
			
			if($coun !=0) {
			
			$_SESSION['uname']  = $user;
			header("location: index.php");
			echo "You are logged in ";
			} 
			else {
			echo "Cannot Login Please check it again";
			
			}
			
			
			}
			
			
			}
			
			
			?>


<?php
//this is for registration
@$reg = $_POST['btn_reg'];

if(isset($reg)) 
{
	//now we convert everything to variable:


	$un = $_POST['uname'];
	$pass = $_POST['password'];
	$fn = $_POST['fname'];
	$ln = $_POST['lname'];
	$em = $_POST['email'];
	$add  = $_POST['address'];
	$bld  = $_POST['bld_grp'];

	


	//now check if the username already exists , we shall use jquery later on

	$check_un = mysql_query("select uname from blood_profile.users WHERE uname = '$un'");
	$count = mysql_num_rows($check_un);
	if($count == 0){

		//check duplication of email id

		$check_em = mysql_query("select email from blood_profile.users WHERE email = '$em'");
		$countem = mysql_num_rows($check_em);
				if($countem == 0 ){

					 // lets move on towards registering the user
					//first lets protect the password

					$mdpass = md5($pass);

					$save_value = mysql_query("INSERT into 	users values ('','$un','$mdpass' , '$fn' ,'$ln' ,'$em' ,'$add' ,'$bld','')") or die(mysql_error());
					
					
					echo "<h1> Congratulations !! Your Account Is created </h1>";


				}
				else {


						echo "There's already another account associated with this email.";
				}





	}
	else {

			echo "Username already selected please select another";

	}

}


?>
<link href="css/signin.css" rel="stylesheet">


<script src="js/bootstrap.js"> </script>
<script src="js/jquery.js"> </script>
<script src="js/modal.js"> </script>
  <body>

<div class="well">

<center>
<a href="#login" class="btn btn-lg btn-primary btn-info"  style="width: 300px;" data-toggle="modal"> Login here </a>

</div>
</center>
</form>
   <div class="modal fade" id="login" aria-hidden="true">
				<div class="modal-dialog"> 
				<div class="modal-content"> 
				<div class="modal-header"> 
				<h3> Please Enter Your Email and Password </h3>
				</div>
				
				
		   <div class="modal-body">
		   <form action="#" method="post" id="modal-form" accept-charset="UTF-8">
		     <input type="text" name="un" class="form-control" placeholder="Username" > <br> 
		     <input type="password" name="pas" class="form-control"  placeholder="Your password"> <br> 
		     <input type="submit" class="btn btn-warning" value="Login" name="login">
			 <input type="reset" class="btn btn-primary" value="Clear">
			
			</form>
			<br> 
			
            
		   </div>
		   
		   <div class="modal-footer">
		     <button class="btn" data-dismiss="modal" aria-hidden="true">  Close </button>
		   
		   </div> </div> </div> </div>
		    
     



		   	<h2> <center> OR </h2> </center>





  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
         <center> <div class="btn btn-lg btn-danger btn-sucess" > Sign Up !!! </div> </center>
         </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
       

      <form class="form-signin" name="frm" action="#" method="POST">
      <div class="well">  <h2 class="form-signin-heading"> <center> Please sign up below:</h2> </center>  </div>
		
		<! username>
		<input 
		name= "uname" 
		type="username" 
		class= "form-control" 
		placeholder="Choose Username" 
		required 
        ng-model="user.username"
        ng-minlength = "5"
        ng-maxlength = "15"
		/>
        
         <span ng-show="frm.uname.$dirty && frm.uname.$error.required" > Provide Username Here !!!</span>
		 <span ng-show="frm.uname.$dirty && frm.uname.$error.minlength" > Too Short</span>
		 <span ng-show=" frm.uname.$dirty && frm.uname.$error.maxlength" > Too Long</span>
		 
		 <! end of username>

		<! For password><br>
        <input 
        name= "password"
         type="password"
         class="form-control" 
         placeholder="Password"
         ng-model="user.password"
         ng-minlength = "5"
         ng-maxlength = "15"
         required
           /> <br> 
         <span ng-show="frm.password.$dirty && frm.password.$error.required" > Provide Password Here</span>
		 <span ng-show="frm.password.$dirty && frm.password.$error.minlength" > Too Short</span>
		 <span ng-show=" frm.password.$dirty && frm.password.$error.maxlength" > Too Long</span>
		 
		 
		          <! end of password>
		 
		 <! first name>         

         <input
          name= "fname" 
          type="username" 
          class="form-control"
           placeholder="First Name"
            ng-model="user.fname"
        	ng-minlength = "5"
         	ng-maxlength = "15"
         	required
           />

          <span ng-show="frm.fname.$dirty && frm.fname.$error.required" > Provide First Name Here !!!</span>
		 <span ng-show="frm.fname.$dirty && frm.fname.$error.minlength" > Too Short</span>
		 <span ng-show=" frm.fname.$dirty && frm.fname.$error.maxlength" > Too Long</span>

		 <! End of first name>


         <br>

         <! last name>

         <input name= "lname" 
         type="text" class="form-control" 
         placeholder="Last Name"
          required maxlength="10"
          ng-model="user.lname"
        	ng-minlength = "5"
         	ng-maxlength = "15"
         	required

          />

          <span ng-show="frm.lname.$dirty && frm.lname.$error.required" > Provide Last Name Here !!!</span>
		 <span ng-show="frm.lname.$dirty && frm.lname.$error.minlength" > Too Short</span>
		 <span ng-show=" frm.lname.$dirty && frm.lname.$error.maxlength" > Too Long</span>

          <! Last Name Ends here>


         <br>
        <! email> 
		<input name="email" 
		type="email"
		 class="form-control" 
		 placeholder="Email address"
		 ng-model="user.email" 
		 required> 
		<br>
		<span ng-show="frm.email.$dirty && frm.email.$error.required" >  Please provide Email Here </span>
		<span ng-show="frm.email.$dirty && frm.email.$error.email">  Not Valid Email </span>   
        <! / email ends here>

        <!address>
        <input 
        name= "address" 
        type="textarea" 
        class="form-control" 
        placeholder="Your Address" 
        required
        ng-model = "user.name"
        ng-minlength = "5"
        ng-maxlength ="20"
        >
        
        <span ng-show="frm.address.$dirty && frm.address.$error.required" > Provide Address Here !!!</span>
		 <span ng-show="frm.address.$dirty && frm.address.$error.minlength" > Too Short</span>
		 <span ng-show=" frm.address.$dirty && frm.address.$error.maxlength" > Too Long</span>

        <!/address>	

        <br>
        <b > Blood Group: </b>

 <select name="bld_grp" style="height: 40px; width: 280px; margin-left: 30px; border-radius: 3px;" placeholder="SELECT GROUP">
                                <option value="A">A</option>
                                <option value="A+">A Positive</option>
                                <option value="AB">AB</option>
                                <option value="O">O Positive</option>
	
</select>



<br>  <br>


        <button
	          name="btn_reg"
	          class="btn btn-lg btn-primary btn-block"
	           type="submit"
	           ng-disabled="frm.$invalid"

	           
          / > 
          <i class="icon-user icon-white">  </i>
          Sign Up
       </button>
		      </form> 
			  




      </div>
    </div>
  </div>
</div>









  
			


	<!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
