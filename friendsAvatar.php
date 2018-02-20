<?php
	header( "Content-type: image/jpeg");
	$url=$_POST['url'];
	$fsize=filesize($url);
	$picture=fread(fopen($url, 'r'), $fsize);
	echo $picture;
?>