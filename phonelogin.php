<?php
	$name=$_POST['name'];
	$password=$_POST['password'];
	$mysqli=new mysqli("192.168.1.110","telelink","huangw.","mysql");
	$result=$mysqli->query("SELECT * FROM userinfo WHERE username='{$name}' AND password='{$password}'");
	$row=mysqli_fetch_assoc($result);
	if($row!=null){
		echo "success";
	}else{
		echo "密码或用户名错误";
	}
?>