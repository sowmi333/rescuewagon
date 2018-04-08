<?php

	//Sets the base directory of the host
	if(!defined('BASE')){
        define('BASE', $_SERVER["DOCUMENT_ROOT"]);
    }

    //Initializes the database access details
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "rescuewagon";

    //Calls the function that creates the connection
	$connection = CreateConnection($host,$user,$password,$database);


	//Function that establishes the connection to the database
	function CreateConnection($host,$user,$password,$database){

		//Tries to connect to the database with the credentials
		$con = mysqli_connect($host,$user,$password);

		//If connection established to the database then selects the database
		$select_db = mysqli_select_db($con,$database);

		return $con;
	}

	?>
