<?php
// Returns the game's scores in JSON format.
// Author: Johan De Jesus


$username = "hackatonDB";
$password = "hackatonDB";
$host = "localhost:3306";
$dbname = "hackathon";



$info = array();
$dbConnection = mysqli_connect($host,$username,$password,$dbname);

if(mysqli_connect_errno($dbConnection) == false)
{
	$info["Result"] = "Success";
	$selectQuery = "SELECT * FROM SCORE";
	$result = mysqli_query($dbConnection,$selectQuery);
	if($result != null)
	{
	while($i = mysqli_fetch_assoc($result)) {
		$info[] = $i;
	}
	//
		
	
	}
}
else
{
	$info["Result"] = "ErrorDB";
}
print json_encode($info);

?>