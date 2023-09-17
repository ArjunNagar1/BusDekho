<?php


if ($_POST['fksfjs']!="hjks8wsjw*%232f8$2%8sr9=ada23_7"){
    echo "Access denied";
    exit;
}
	
$dbHost     = 'localhost';
$dbUsername = 'u588516887_busdekho';
$dbPassword = 'F?y67[hL2';
$dbName     = 'u588516887_busdekho';
//Create connection and select DB


$mysqli =  new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($mysqli->connect_error){
die("Unable to connect database: " . $mysqli->connect_error);
}

date_default_timezone_set('Asia/Kolkata');

?>

