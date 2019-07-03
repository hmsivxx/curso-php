<?php
session_start();

$random = rand(1000, 9999);

$_SESSION['captcha'] = $random;

?>

<img src="image.php" width="100" height="50" />
