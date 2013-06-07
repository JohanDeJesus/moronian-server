<?php
// Adds the score and the player's name to a database.
// Author: Johan De Jesus.

error_reporting(0);
$name = $_GET['firstname'];
$lastname = $_GET['lastname'];
$val = $_GET['score'];
$result = array();



//DB info.
$username = "hackatonDB";
$password = "hackatonDB";
$host = "localhost:3306";
$dbname = "hackathon";

if (isset($name) == true && isset($lastname) == true && isset($val) == true) { 

	$dbConnection = mysqli_connect($host,$username,$password,$dbname);
	if(mysqli_connect_errno($dbConnection) == false) {
		// add to DB.
		addHighScore($dbConnection,$name,$lastname,$val);
		$result["Result"] = "Success";
	}
	else {
		// Cannot connect to database. 
		$result["Result"] = "ErrorDB";		
	}

 }
else 
{ 
		// Not enough parameters
		$result["Result"] = "Error";
}
echo json_encode($result);

function addHighScore($dbCon,$nombre,$apellido,$valor) {
	$sqlString = "INSERT INTO SCORE VALUES(NULL, CURDATE(), '".$nombre ."','".$apellido."',".$valor.")";
	mysqli_query($dbCon,$sqlString);
}



?>