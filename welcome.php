<?php


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
	<title>Welcome to domepage2.0</title>
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

<body style="background-color:black;">
	<h1 style="font-size:4.5em; color:white;">dm.pg_2</h1>
	<form action="scripts/validate_user.php" method="post" accept-charset="utf-8">
		<input type="text" onFocus="this.value=''" value="username" id="name" name="name">
		<input type="password" onFocus="this.value=''" value="password" id="password" name="password">
		<input class="submit" type="submit" value="login">
	</form>
	<a href="register.php" style="color:white;">not a member?</a>

	<?php require "include/footer.php" ?>

</body>
</html>
	