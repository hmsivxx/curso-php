<?php
session_start();
header("Content-type: image/jpeg");

$captcha = $_SESSION['captcha'];
$test = "420";

$image = imagecreatetruecolor(100, 50);
imagecolorallocate($image, 200, 200, 200);        //image + RGB code
$fontColor = imagecolorallocate($image, 20, 20, 20);
imagettftext($image, 40, 0, 20, 30, $fontColor, 'Ginga.otf', $test);  //image + size + ? + x position + y position + color + font name + $text
imagepng($image);     //image + ?? + quality (%)
?>
