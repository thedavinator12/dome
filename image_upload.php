<?php
require "functions/dbconnect.php";
$link = connection_to_database();

echo "<form action='scripts/upload_image.php' method='post'
enctype='multipart/form-data'>
   <input type='hidden' name='MAX_FILE_SIZE' value='500000' />
	<input type='hidden' name='user_id' value='$user_id' />
	<input type='file' name='pic' id='pic' />
	<br />
	<input type='submit' name='submit' value='Upload' />
	</form>";


?>