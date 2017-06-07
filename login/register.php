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
	<title>Sign Up Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<div id="frm">

		<form action="signupprocess.php" method="POST">
			<?php
				$x = $_SESSION["gvar"];
				echo $x;
				if($_SESSION["gvar"]!=""){alert($_SESSION["gvar"]);}
				function alert($msg) {
				    echo "<script type='text/javascript'>alert('$msg');</script>";
				}
			?>
			<p>
				<label>Name &nbsp &nbsp &nbsp &nbsp &nbsp :</label>
				<input  type="text" id="user" name="user"/>
			</p>
			<p>
				<label>email &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp :</label>
				<input  type="text" id="email" name="email"/>
			</p>
			<p>
				<label>Roll &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:</label>
				<input  type="text" id="roll" name="roll"/>
			</p>
			<p>
				<label>Password &nbsp &nbsp&nbsp:</label>
				<input type="password" id="pass" name="pass"/>

			</p>
			<p>
				<label>ConfirmPass:</label>
				<input type="password" id="cpass" name="cpass"/>

			</p>

			<p>
				<label>University &nbsp &nbsp:</label>
				<input type="text" id="varsity" name="varsity"/>
			</p>

			<p>
				<label>Department &nbsp:</label>
				<input type="text" id="dept" name="dept"/>
			</p>
			<p>
				<label>Batch &nbsp &nbsp &nbsp &nbsp &nbsp :</label>
				<input type="text" id="batch" name="batch"/>
			</p>		
			<p>
				<label>Section &nbsp &nbsp &nbsp &nbsp:</label>
				<input type="text" id="sec" name="sec"/>
			</p>	
			<p>
				<input type="submit" id="btn" value="Sign Up"/>
				<input type="reset" id="btn" value= "Cancel "/>
			</p>
			<p>
				<a href="login.php">Already have an account? Sign In Here!</a>
			</p>
		</form>

	</div>
</body>
</html>