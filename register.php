<?php 
    $myname=!empty($_POST['name'])?$_POST['name']:0;
    $mypassword=!empty($_POST['password'])?$_POST['password']:0;
	$mynickname=!empty($_POST['nickname'])?$_POST['nickname']:0;
	if($myname=='0'||$mypassword=='0'||$mynickname=='0')echo 0;
	else{
		$mysqli=new mysqli("localhost","root","huangw.","my_data");
		$result=$mysqli->query("SELECT * FROM users_data WHERE name='{$myname}'");
		if(!$result){echo $result;}
		else{
			$date=date("Y-m-d");
			$sql="INSERT INTO users_data (name,password,date,nickname) VALUES ('{$myname}','{$mypassword}','{$date}','{$mynickname}')";
			if(($mysqli->query($sql))==TRUE){
				setCookie("username",$mynickname,time()+3600*24);
				echo 2;
			}else{
				echo $sql;
			}
		}
	}
	$mysqli->close();
?>