<?php

require_once("connect.php");

if($_SESSION){

require_once("header.php");

}
else {

header("location: index.php?ubkabjnotjlogin080ij9u");

}


?>
<div class="well">

<?php

echo "<h4> The Related Searches::</h4>";

$g = strip_tags($_GET['q']);
$get_data = mysql_query("select * from blood_profile.users  where  uname LIKE '%$g%'");
while($get = mysql_fetch_assoc($get_data)) {


		$peopl = $get['uname'];

		echo "<a href='profile.php?u=$peopl'> $peopl </a> <br>";

}



?>