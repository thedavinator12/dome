<?php

require "../functions/dbconnect.php";
$link = connect_to_database();

$pass = "chris";
$ePASS = md5($pass);

$q = "UPDATE users SET password='$ePASS' WHERE user_id=55";
mysql_query($q,$link);


?>