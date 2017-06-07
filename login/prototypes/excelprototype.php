<?php

//connect to odbc ms excel

$connection = odbc_connect('nerdherdtest', '', '');
// query
$query = "SELECT * FROM [sheet1$]";
//execute
$rs = odbc_exec($connection, $query);

//iterate over records
while(odbc_fetch_row($rs))
{
	$FN = odbc_result($rs, "FirstName");
	$LN = odbc_result($rs, "LastName");
	$roll= odbc_result($rs, "Roll");
	$pass= odbc_result($rs, "password");

	echo "<b>$FN $LN</b> $roll, $password <br /><br />";


}

?>