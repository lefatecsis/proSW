	

<?php

// PARAMETROS PARA FAZER A CONEXÃO COM O banco

$hostname = 'prosw.mysql.database.azure.com';
$username = 'prosw@prosw';
$userpwd = 'Azure2018';
$databasename = 'prosw';

// FAZENDO CONEXÃO COM O BD

try
	{
	$dsn = 'mysql:host=prosw.mysql.database.azure.com';
	$dbh = new PDO("mysql:host=prosw.mysql.database.azure.com; dbname=" . $databasename . ";", "prosw@prosw", "Azure2018");
	}

catch(PDOException $e)
	{
	echo 'ERROR: ' . $e->getMessage();
	}

?>

