<?php
	require "../functions/dbconnect.php";
	$link = connect_to_database();
	
	$id = $_POST['id'];
	
	$q = "DELETE from wall WHERE id='$id'";

	mysql_query($q);

?>