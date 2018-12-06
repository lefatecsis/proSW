	

<?php

// PARAMETROS PARA FAZER A CONEXÃO COM O bd

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

?>
