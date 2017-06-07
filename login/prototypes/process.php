<?php
    //get values from login.php
	$sendername = $_POST['user'];
	$senderpass = $_POST['pass'];

	echo $sendername." ".$senderpass."<br>";

	$host = "localhost";
	$user = "root";
	$passw = "";
	$db = "nerdherd";

	// connect with the server and select db
	$link = mysqli_connect($host, $user, $passw, $db);

	//to prevent mysql injections
	$username = stripcslashes($username);
	$password = stripcslashes($username);
	$username = mysqli_real_escape_string($link,$username);
	$password = mysqli_real_escape_string($link,$password);

	
	//mysql_connect("localhost","root","");
	//mysql_select_db("nerdherd");

	//query the db for user

	$sql = "SELECT * FROM users WHERE username ='".$username."' AND password = '".$password."' LIMIT 1";
	$result = mysqli_query($link,$sql);//"select * from users where username = '$username' and password = '$password'") 
	//or die("Failed to query DB ".mysql_error());

	$row = $result->fetch_array(MYSQLI_BOTH);
	
	echo $row['id']." " .$row['username']." ".$row['password'];
	echo $row["username"]." ".$row["password"];
	echo $row[0]." ".$row[1];

	if($row['username']==$username && $row[password]==$password)
	{
		echo "Welcome ".$row['username'];
	}else{
		echo "Login failed! >_< ".$row[0];
	}
?>