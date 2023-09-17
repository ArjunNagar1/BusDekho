<?php
// define('DB_SERVER','localhost');
// define('DB_USER','u588516887_busdekho');
// define('DB_PASS' ,'F?y67[hL2');
// define('DB_NAME','u588516887_busdekho');

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME','busdekho');


$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>