<?php

$path = "uploads/profile_pics/default.png";
list($width,$height) = getimagesize($path);

echo "width: $width\n";
echo "height: $height\n";

$path = "images/waterCat.jpg";
list($width,$height) = getimagesize($path);

echo "width: $width\n";
echo "height: $height\n";

?>