	

/*<?php

// PARAMETROS PARA FAZER A CONEXÃO COM O banco

$hostname = 'prosw.mysql.database.azure.com';
$username = 'prosw@prosw';
$userpwd = 'Azure2018';
$databasename = 'prosw';

// FAZENDO CONEXÃO COM O BD

try
	{
	$dsn = 'mysql:host=localhost';
	$dbh = new PDO("mysql:host=localhost; dbname=" . $databasename . ";", "root", "");
	}

catch(PDOException $e)
	{
	echo 'ERROR: ' . $e->getMessage();
	}

?>*/

<?php
$host = 'prosw.mysql.database.azure.com';
$username = 'prosw@prosw';
$password = 'Azure2018';
$db_name = 'prosw';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}
