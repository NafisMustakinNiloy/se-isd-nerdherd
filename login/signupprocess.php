<?php 
	if(!isset($_SESSION)) 
    { 
        session_start();
        $_SESSION["gvar"]=""; 
    } 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "nerdherd";

	$sendername = ""; $senderemail="";$senderroll="";$senderpass="";$sendercpass="";
		$sendervarsity="";$senderdept=""; $senderbatch="";$sendersec="";	
		$boolisempty=false;

		if(isset($_REQUEST['user']) && $_REQUEST['user']!="" ){$sendername = $_REQUEST['user'];}else{$boolisempty=true; }
		if(isset($_REQUEST['email']) && $_REQUEST['email']!="" ){$senderemail = $_REQUEST['email'];}else{$boolisempty=true; }
		if(isset($_REQUEST['roll']) && $_REQUEST['roll']!="" ){$senderroll = $_REQUEST['roll'];}else{$boolisempty=true; }
		if(isset($_REQUEST['pass']) && $_REQUEST['pass']!="" ){$senderpass = $_REQUEST['pass'];}else{$boolisempty=true; }
		if(isset($_REQUEST['cpass']) && $_REQUEST['cpass']!="" ){$sendercpass = $_REQUEST['cpass'];}else{$boolisempty=true; }
		if(isset($_REQUEST['varsity']) && $_REQUEST['varsity']!="" ){$sendervarsity = $_REQUEST['varsity'];}else{$boolisempty=true; }
		if(isset($_REQUEST['dept']) && $_REQUEST['dept']!="" ){$senderdept = $_REQUEST['dept'];}else{$boolisempty=true; }
		if(isset($_REQUEST['batch'])&& $_REQUEST['batch']!="" ){$senderbatch = $_REQUEST['batch'];}else{$boolisempty=true; }
		if(isset($_REQUEST['sec']) && $_REQUEST['sec']!="" ){$sendersec = $_REQUEST['sec'];}else{$boolisempty=true; }

		if($boolisempty==true){
			$_SESSION["gvar"]="YOU MUST FILL IN THE FORM!";
			include 'register.php';//header("Location: register.php");
			//exit;
		}
//create connection!
	$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

	//check email 1st
			$sql1 = "SELECT * FROM usersdb where email ='".$senderemail."' ";
			$result1 = $conn->query($sql1); 
	if($result1->num_rows>0){
		$_SESSION["gvar"] = "Email already taken :( plz use other email!";
		$conn->close();
		//header("Location: register.php");
		include 'register.php';//exit;
	}
	else if($senderpass==$sendercpass){
			//echo $sendername ." ".$senderpass ." ".$senderemail ." ".$senderroll."<br>";
			//echo $sendervarsity ." ".$senderdept ." ".$senderbatch ." ".$sendersec ."br";
			##################################################
			#if anything goes wrong, it's here -_-
			// Create connection
			
			$sql = "INSERT INTO usersdb (email,name,roll,password,varsity,dept,batch,sec)
					VALUES ('".$senderemail."', '".$sendername."','".$senderroll."','".$senderpass."','".$sendervarsity."','".$senderdept."','".$senderbatch."','".$sendersec."')";
			if ($conn->query($sql) === TRUE) {
				 $_SESSION["gvar"]="New record created successfully";
			    //echo "New record created successfully";
			    include 'login.php';//header("Location: login.php");
    			//exit;

			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			    //echo "New record created successfully";
			    //header("Location: register.php");
			    //echo  "<p> alert("Hello! I am an alert box!!") </p>";
    			//exit;
			}

			$conn->close();
			################################################
	}else{
		$_SESSION["gvar"]="Passwords donot match. plz try again :'(";
		include 'register.php';
		//header("Location: register.php");
		//exit;
		/*
		$alert = "Passwords donot match. plz try again :'(";
		echo $alert;
		echo  "<p> alert('".$alert."') </p>";
		*/
		
    	
	}
?>