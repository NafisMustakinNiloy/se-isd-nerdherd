<?php
if(!isset($_SESSION)) 
    { 
        session_start();
        $_SESSION["gvar"]=""; 
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<div id="frm">
		<form action="process2.php" method="POST">
			<?php
				echo $_SESSION["gvar"];
				
				if($_SESSION["gvar"]!=""){alert($_SESSION["gvar"]);}
				function alert($msg) {
				    echo "<script type='text/javascript'>alert('$msg');</script>";
				}
			?>
			<p>
				<label>Email &nbsp &nbsp &nbsp:</label>
				<input type="text" id="user" name="user"/>
			</p>
			<p>
				<label>Password :</label>
				<input type="password" id="pass" name="pass"/>

			</p>	
			<p>
				<input type="submit" id="btn" value="Sign In"/>
			</p>
			<p>
				<a href="register.php">Don't have an account? Sign Up Here!</a>
			</p>
		</form>

	</div>

</body>
</html>