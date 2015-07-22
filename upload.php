<?php 
require_once("connect.php");
?>
<?php



if(isset($_POST['submit'])) {
    $errors =array();
    $allowed_ext = array('jpg','jpeg','png','gif','JPG','JPEG');
    

        $file_name = $_FILES['myfile']['name'];
        
        $extension=explode('.',$file_name);
        $file_ext=strtolower(end($extension));
        
        $file_size = $_FILES['myfile']['size'];
        $file_tmp = $_FILES['myfile']['tmp_name'];
        
        if(in_array($file_ext, $allowed_ext) ===false) {
        
        $errors[]='Extension not allowed. Plz Select Proper Image';
        
        
        }
        if ($file_size > 20009712)
          {
        $errors[] = 'File size is too big ';
        
          } 
          
          
          $namecheck =mysql_query("SELECT img from blood_profile.users where img='profilepic/$user_logged_in/$file_name'");
            $count = mysql_num_rows($namecheck);
        
        if($count!=0)
        
            {
            
            $query1= mysql_query("UPDATE users SET img='profilepic/$user_logged_in/$file_name' WHERE uname='$user_logged_in'");
            header("location: profile.php?u=$user_logged_in");
            }
            else {
          
        if (empty($errors)) {
        
          $loc = mkdir("profilepic/$user_logged_in/");        
          $location = "profilepic/$user_logged_in/$file_name";
          if(move_uploaded_file($file_tmp ,$location))
      
        {
        
        header("location: profile.php?u=$user_logged_in");
        
        
        } 
              $query= mysql_query("UPDATE users SET img='$location' WHERE uname='$user_logged_in'");
            echo "file uploaded";
            header("location: profile.php?u=$user_logged_in");
            exit();
          }
          else
          {
          foreach ($errors as $error)
           
            echo  $error , '<br/>';
          
          }
          
        
        
}
  }
?>
