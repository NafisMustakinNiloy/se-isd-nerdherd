<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "nerdherd";
	mysql_connect($host, $user, $pass);
	mysql_select_db($db);

	$sql = "SELECT * FROM users WHERE username ='".$user."' AND password = '".$pass."' LIMIT 1";

	$res = mysql_query($sql);
	if(mysql_num_rows($res)==1){
		echo "Success!";
	}else{
		echo "failed!";
	}
?>