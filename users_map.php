<?php
require_once("connect.php");

if($_SESSION){

require_once("header.php");

}
else {

require_once("header1.php");

}

?>

<h1> This map shall be shown according to database value </h1>

<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3535.2050943234112!2d85.537403!3d27.618164!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1402299875804" width="600" height="450" frameborder="0" style="border:0"></iframe>