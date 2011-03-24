<?php
$login = $_COOKIE['LOGON'];	
if(!$login)
{
	header("Location:welcome.php");
}
require "functions/dome.php";
require "functions/dbconnect.php";
$link = connect_to_database();


//for nav bar
$more = 0;
if($_GET['offset']){
	$offset = $_GET['offset'];
	$num =7;
}
else{
	$offset = 0;
	$num =7;
}

function display_writebox($login){
	if($login == 1){ 
		echo '<div id="writeBox">';
		echo	'<a href="write.php">write</a>';
		echo '</div>';
	}else{
		echo '<div id="writeBox">';
		echo 	'<a href="register.php">sign in to write</a>';
		echo '</div>';
	}
}

function get_posts($link,$offset,$num){
	$query = "select * from posts order by time_posted DESC limit $offset,$num";
	$result = mysql_query($query,$link);
	return $result;
}


?>

<html>
<head>
	<title>domepage</title>
	<link rel="stylesheet" href="css/master.css" type="text/css">
	<script src="js/jq.js"></script>
	<script>
	$(document).ready(function(){
		var offset = 0;
		var num    = 5;
		
		$("#userList_list").load('scripts/getUsers.php',{offset:offset, num:num});
		
		$("#requestBox").load('ajax/get_friend_requests.php');
				
		$("#forwardUsers").click(function(event){
			event.preventDefault();		
	$("#userList_list").load('scripts/getUsers.php',{offset:offset+5,num:num});
		offset += 5;
		});
		
		$("#backUsers").click(function(event){
			event.preventDefault();
			if(offset > 0){					$("#userList_list").load('scripts/getUsers.php',{offset:offset-5,num:num});
			offset -=5;
			}
			else
				alert("cant go back")
		});
		
	});
	</script>

	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-22173085-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>	
</head>

<body>
<div id = "all">

	<?php require "include/header.php"; ?>
	<?php require "include/navbar.php"; ?>

<div id = "leftBar">	
	<?php 
		if($login == 1)
			require "include/userBox.php";
		else
			require "include/signInBox.php"; 
	
		include "include/friend_request_box.php";
	
		include "include/rep_box.php";
	?>	
	
</div>


<div id = "content">
   <div class="specialPost">
		<h1>We're back...</h1>
		<p>Welcome to the new domepage. Your new domepage.</p>
		<p class='desc'>Since this is the alpha, there will be a lot of 
			broken things, and things that dont work properly...</p>
		<p class='desc'>If you come across any bugs or have any suggestions,
			just make a post with 'BUG' or 'SUGGESTION' in the title, and
			it will go on the bug sheet.</p>
		<p class='desc'>Also, check out your profile, upload a pic, and
			make some friends. The 'updates' button takes you to the list
			of latest status updates.</p>
		<p>Hope you like dome_2.0!</p>
		<p class='signature'>thanks -dave</p>
	</div>
	
	<?php
	display_writebox($login);
	?>
	
	<?php
	//get posts
	$posts_result = get_posts($link,$offset,$num);
	
	while($row = mysql_fetch_array($posts_result)){
	$id          = $row['post_id'];
	$title       = stripslashes($row['title']);
	$author      = $row['author'];
	$author_id   = $row['author_id'];
	$karma       = $row['karma'];
	$time_posted = $row['time_posted'];
	
	date_default_timezone_set('America/New_York');
	$dt = date("M d  h:i a",$time_posted);
	
	$more    = 1;

	echo '<div class="post">';
	echo"<a class='postTitle' href='post.php?post_id=$id'>$title</a>";
	
	if($author_id == $_COOKIE['user_id']){
	echo"<a href='scripts/remove_post.php?id=$id'><img class='removeButton' src='images/removeIcon.png' title='remove' /></a>";
	}
	
	echo"<br/>";
	echo"<a class='author' href='profile.php?user_id=$author_id'>by $author</a>";
	echo"<p class='timestamp'>$dt</p>";
	echo '</div>';}
	
	if($more == 0){
		echo "<h1>Nothing here bra...</h1>";
	}
	?>
	
	<div id="pageNav">
	<?php 
	if($offset-7 >= 0){ 
		//display back button
		$newOffset = $offset - 7;
		echo "<a href='index.php?offset=$newOffset&num=$num'><</a>";
	}
			
	if($more == 1){
		//display front button if there's a row...
		$newOffset = $offset + 7;
		echo "<a href='index.php?offset=$newOffset&num=$num'>></a>";
	}
	?>
	</div>
		
</div>
<?php require "include/footer.php" ?>

</div>
</body>
</html>
