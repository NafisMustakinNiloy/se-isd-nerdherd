<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "nerdherd";

	$sendername = $_POST['user'];
	$senderpass = $_POST['pass'];

	echo $sendername." ".$senderpass."<br>";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
        if(($row["username"]==$sendername) && ($row["password"]==$senderpass) ){
        	echo "<br>"."Welcome ".$row["username"]. "<br>";
        }
    }
} else {
    echo "0 results";
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
 


 
