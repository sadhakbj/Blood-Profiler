<?php

require_once("connect.php");

if($_SESSION){

require_once("header.php");

}
else {

require_once("header1.php");

}
if(!$_SESSION){

    header("location: index.php");
    exit;

}



                $old_password = strip_tags(@$_POST['password']);
                $new_password = strip_tags(@$_POST['pw1']);
                $repeat_password = strip_tags(@$_POST['pw2']);
                $old_md = md5($old_password);

               

                $find = mysql_query("select * from users where uname='$user_logged_in' && password = '$old_md'");

                $count = mysql_num_rows($find);

                if($count == 1) {

                  $new_md = md5($new_password);
                  //update users:
                  $update = mysql_query("update users set password='$new_md' where uname ='$user_logged_in'") or die(mysql_error());
                  $updated = true;
                  $msg ="Your Password is Updated !!!";
                }


?>

 


            
<! ################################>

<?php      
          if( isset($updated) && $updated ){
      ?>
    <div class="well alert-success" style="width: 400px"id="pwd-success">
     <b> <?php  echo $msg;  ?></b><b>
        <a style="float: right; padding: 5px;  color: red; cursor: pointer;" onClick="document.getElementById('pwd-success').style.display='none'">x</a>
    </div>
  <?php }  ?>

<div class="well">



  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Change Profile Image::
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
          

        <form action='upload.php' method='POST' enctype='multipart/form-data'>
    <fieldset>
        <input type="file" name='myfile' />
    </fieldset>
    <fieldset> <br>
        <input type="submit"  name="submit" class="btn btn-warning"  value="Upload Image" title="Choose Image"/>
    </fieldset>
</form>


      </div>
    </div>
  </div>






  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Change Your Password
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
       <body ng-controller="stageController">
        <form name="myForm" action="#" method="POST">
            <label for="pw1">Change Your Password:</label> <br>
      
                    

            <input 
        name= "password"
         type="password"
         class="form-control" 
         style="width: 300px;"
         placeholder="Your Old Password"
         ng-model="user.password"
         ng-minlength = "5"
         ng-maxlength = "15"
         required
           /> <br>  <br>
         <span ng-show="myForm.password.$dirty && myForm.password.$error.required" > Provide Password Here</span>
         <span ng-show="myForm.password.$dirty && myForm.password.$error.minlength" > Too Short</span>
         <span ng-show=" myForm.password.$dirty && myForm.password.$error.maxlength" > Too Long</span>
         
         
                  <! end of password>




            <input 
            type="password"
            class="form-control" 
            style="width: 300px;" 
            id="pw1" 
            name="pw1" 
            ng-model="pw1" 
            required 
            placeholder="New Password"
            ng-minlength = "5"
            ng-maxlength = "15"
            value=""
            />


            
          <span ng-show="myForm.pw1.$dirty && myForm.pw1.$error.required" > Please Provide a new password !!!</span>    
        <span ng-show="myForm.pw1.$dirty && myForm.pw1.$error.minlength" > Too Short</span>
         <span ng-show=" myForm.pw1.$dirty && myForm.pw1.$error.maxlength" > Too Long</span>

            <br> <br>
            <input 
            type="password" 
            id="pw2" name="pw2" 
            ng-model="pw2" 
            class="form-control" 
            style="width: 300px;"
            placeholder = "Confirm Your Password"
            required
            pw-check="pw1"
            ng-minlength = "5"
            ng-maxlength = "15" /> <br>

        <span ng-show="myForm.pw2.$dirty && myForm.pw2.$error.required" > Please Provide a new password !!!</span>    
        <span ng-show="myForm.pw2.$dirty && myForm.pw2.$error.minlength" > Too Short</span>
         <span ng-show=" myForm.pw2.$dirty && myForm.pw2.$error.maxlength" > Too Long</span>

            <div class="msg-block" ng-show="myForm.$error"> <span class="msg-error" ng-show="myForm.pw2.$error.pwmatch">Passwords don't match.</span> 
            </div>

            <button
              name="btn_change"
              class="btn btn-lg btn-primary btn-block"
               type="submit"
               style="width: 300px;"
               ng-disabled="myForm.$invalid"
               
          / > 
          Change Password
       </button>

        </form>

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
          Collapsible Group Item #3
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>


<! this is end of the main div class="well">
</div>


<div class="well">

 Designed by Bijaya !!!

</div>





<! ##################################>             




<! ############################################# >
<!this is js to check if the passwords match>
<script type="text/javascript">
'use strict';
angular.module('myApp', ['myApp.directives']);
/* Controllers */
function stageController($scope) {
    $scope.pw1 = 'password';
}
/* Directives */
angular.module('myApp.directives', [])
    .directive('pwCheck', [function () {
    return {
        require: 'ngModel',
        link: function (scope, elem, attrs, ctrl) {
            var firstPassword = '#' + attrs.pwCheck;
            elem.add(firstPassword).on('keyup', function () {
                scope.$apply(function () {
                    // console.info(elem.val() === $(firstPassword).val());
                    ctrl.$setValidity('pwmatch', elem.val() === $(firstPassword).val());
                });
            });
        }
    }
}]);

</script>




<!this will disable the submit button if the file is not selectd >

<script type="text/javascript">

$(document).ready(
    function(){
        $('input:submit').attr('disabled',true);
        $('input:file').change(
            function(){
                if ($(this).val()){
                    $('input:submit').removeAttr('disabled'); 
                }
                else {
                    $('input:submit').attr('disabled',true);
                }
            });
    });

</script>

