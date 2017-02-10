<?php
	// Сесія
	session_start();
	$rand = mt_rand(1000, 9999);
	$_SESSION["rand"] = $rand;
	$im = imageCreateTrueColor(150, 50);
	$c = imageColorAllocate($im, 255, 255, 205);
	imageTtfText($im, 25, -10, 30, 30, $c, "verdana.ttf", $rand);
	header("Content-type: image/png");
	imagePng($im);
	imageDestroy($im);
?>