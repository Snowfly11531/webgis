<?php
	$name=$_POST['name'];
	$mysqli=new mysqli("192.168.1.110","telelink","huangw.","mysql");
	$result=$mysqli->query("SELECT username,picture FROM userinfo WHERE username LIKE '%{$name}%'");
	$namearray=array();
	$urlarray=array();
	$i=0;
	while ($row=mysqli_fetch_array($result)) {
		$namearray[$i]=$row['username'];
		$urlarray[$i]=$row['picture'];
		$i++;
	}
    echo json_encode([$namearray,$urlarray]);
?>