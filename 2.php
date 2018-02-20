<?php
    $myname=!empty($_GET['name'])?$_GET['name']:0;
    //echo $myname.' ';
    $mypassword=isset($_GET['password'])?$_GET['password']:0; 
    //echo $mypassword;
    $mysqli=new mysqli("192.168.1.110","telelink","huangw.","mysql");
	$result=$mysqli->query("SELECT * FROM userinfo WHERE usernme='{$myname}' and password='{$mypassword}'");
	//if($result!=null)echo "有数据";
	$row=mysqli_fetch_assoc($result);
	if($row!=NULL){
		echo $row["usernme"];
	}else{
		echo "";
	}
?>