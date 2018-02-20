<?php
	header( "Content-type: image/jpeg");
	$name=$_POST['name'];
	$mysqli=new mysqli("192.168.1.110","telelink","huangw.","mysql");
	$result=$mysqli->query("SELECT picture FROM userinfo WHERE username='{$name}'");
	$row=mysqli_fetch_assoc($result);
	$file;
	if($row==null){
		$fsize=filesize('./upload/66ccff.jpg');
        $file=fread(fopen('./upload/66ccff.jpg','r'),$fsize);
	}else{
        $path=$row['picture'];
 		$fsize=filesize($path);
        $file=fread(fopen($path,'r'),$fsize);      
	}
	echo $file;
?>