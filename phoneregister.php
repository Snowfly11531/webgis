<?php  
	$base_path = "./upload/"; //存放目录  
	if(!is_dir($base_path)){  
   		mkdir($base_path,0777,true);  
	} 
	$name=$_POST['name']; 
	$password=$_POST['password'];
	$mysqli=new mysqli("192.168.1.110","telelink","huangw.","mysql");
	$result=$mysqli->query("SELECT * FROM userinfo WHERE username='{$name}'");
	$row=mysqli_fetch_assoc($result);
	if($row!=null){
		echo "用户名已被占用";
	}else{
		$base_path=$base_path.$name.'/';
        if(!is_dir($base_path)){
        	mkdir($base_path,0777,true); 
        }
        $target_path = $base_path . basename ( $_FILES ['attach'] ['name'] );
        if (move_uploaded_file ( $_FILES ['attach'] ['tmp_name'], $target_path )) {    
     		$sql="INSERT INTO userinfo (username,password,picture) VALUES('{$name}','{$password}','{$target_path}')";
     		if(($mysqli->query($sql))==true){
     			echo "save successfully";
     		}else{
     			echo "database error";
     		}
		} else { 
    		echo "save fail";  
		} 
	}  
?>