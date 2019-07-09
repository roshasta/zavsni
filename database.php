<?php

	/*Korisnički podaci*/
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '123456gj';
	$db_name = 'markacija'; //naziv baze podataka u phpmyadminu

	/*Kreiranje mysqli objekta*/
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name,);

	/*Provjera konekcije*/
	if($mysqli === false){
	    die("ERROR: Could not connect. " . $mysqli->connect_error);
	}
?>
