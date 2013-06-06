<?php
// Adds the score and the player's name to a database.
// Author: Johan De Jesus.

error_reporting(0);
$name = $_GET['firstname'];
$lastname = $_GET['lastname'];
$val = $_GET['score'];




// conectarse a DB
$username = "hackatonDB";
$password = "hackatonDB";
$host = "localhost:3306";
$dbname = "hackathon";

$dbConnection = mysqli_connect($host,$username,$password,$dbname);

if(mysqli_connect_errno($dbConnection) == false)
{
	if (isset($name) == true && isset($lastname) == true && isset($val) == true) { 
	
	// add to DB successfully. 
	addHighScore($dbConnection,$name,$lastname,$val);
	echo 1;
	}
	else {
	// not enough parameters
	echo 2;
	}

 }
else 
{ 
// Cannot connect to database. 
	echo 3;
}


//if(mysqli_connect_errno($dbConnection) == false && isset($name) == true && isset($lastname) == true && isset($val) == true) {
//addHighScore($name,$lastname,$val);
//echo "1";


//else {
//echo mysqli_connect_error();
//echo 2;
//}
function addHighScore($dbCon,$nombre,$apellido,$valor) {
	$sqlString = "INSERT INTO SCORE VALUES(NULL, CURDATE(), '".$nombre ."','".$apellido."',".$valor.")";
	mysqli_query($dbCon,$sqlString);
}



?>