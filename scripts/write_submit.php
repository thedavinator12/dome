<?php

require "../functions/dbconnect.php";

$link = connect_to_database();

$title = strip_tags($_POST['title']);
$content = $_POST['content'];
$author  = $_COOKIE['user_name'];
$author_id = $_COOKIE['user_id'];
$bug       = $_POST['bug'];

if($bug==1){
	
}

$cleanTitle = mysql_real_escape_string($title);
$cleanContent = mysql_real_escape_string($content);
$time_posted = time();

$query = "INSERT into posts (author, author_id, title,content,time_posted) values ('$author','$author_id','$cleanTitle',
'$cleanContent','$time_posted')";

mysql_query($query) or die("error" . mysql_error());

//update user karma
$q = "UPDATE users SET karma = karma+1 WHERE user_id = $author_id";
mysql_query($q);


header("Location:../index.php");
?>