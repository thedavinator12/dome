<div id = "signInBox">
	<?php
	
	$name = $_COOKIE['user_name'];
	
	$user_query = "SELECT * FROM users where name = '$name'";
	$user_result = mysql_query($user_query);
	$user_row = mysql_fetch_array($user_result);
	$karma = $user_row['karma'];
	$id    = $user_row['user_id'];
	
	echo "<a class='userName' href='profile.php?user_id=$id'>$name</a>";
	echo "<h2>rep - $karma</h2>";
	
	echo "<a href='scripts/logout.php'>logout</a>";
	
	?>
</div>
