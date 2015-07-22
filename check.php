<form action="#" method="POST">
<input type="text" name="change">

<input type="submit" name="submit" value="change">

</form>


<?php

if(isset($_POST['submit'])) {

	$val = $_POST['change'];
	$md5val = md5($val);
	echo $md5val;
	echo "<br>";
	
	$ag = md5($md5val);
	echo $ag;
	
}


?>