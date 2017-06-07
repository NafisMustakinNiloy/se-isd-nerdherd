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

    $sendername = ""; $senderpass=""; $boolisempty=false;

    
	if(isset($_POST['user'])  && $_POST['user']!=""){$sendername = $_POST['user'];}else{$boolisempty=true; }
	if(isset($_POST['pass']) && $_POST['pass']!=""){$senderpass = $_POST['pass'];}else{$boolisempty=true; }

    if($boolisempty==true){
            $_SESSION["gvar"]="YOU MUST FILL IN THE FORM!";
            include 'login.php';//header("Location: register.php");
            //exit;
        }

	echo $sendername." ".$senderpass."<br>";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM usersdb WHERE email ='".$sendername."' AND password = '".$senderpass."' LIMIT 1";#"SELECT * FROM users Where ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
        if(($row["email"]==$sendername) && ($row["password"]==$senderpass) ){
        	echo "<br>"."Welcome ".$row["name"]. "<br>";
        }
    }
} else {
    echo "0 results";
    $_SESSION["gvar"]="Sry! Email/password didn't match! Try again!";
            include 'login.php';
}

$conn->close();

/*$servername = "localhost";
$username = "root";
$password = "";
//MySQLi object oriented style NOT procedural or PDO
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";



#--------------
$conn->close();*/
################
	//$mysqli = new mysqli("localhost", "root", "", "nerdherd");
    //$result = $mysqli->query("SELECT id FROM users");

?>
 


 
