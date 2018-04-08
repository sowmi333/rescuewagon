<?php

	//Sets the base directory of the host
    if(!defined('BASE')){
        define('BASE', $_SERVER["DOCUMENT_ROOT"]);
    }

    //Starts the session if it is not already started
  	if(!isset($_SESSION)){
  		session_start();
  	}

	//Includes the database file that establishes the connection to the database
    include_once BASE.'/assets/includes/db.php';

	//Initiates the prepared statement
	$stmt = mysqli_stmt_init($connection);

	//Calls the function ValidateUser() with the arguments $email,$password,$stmt,$connection and holds the return value of that function
	updateLocation($stmt, $connection);

	//Function that validates the user
	function updateLocation($stmt, $connection){

    $time = date( "Y-m-d H:i:s", time());
    $tripId = 1;
    //Following code selects the st_id and status from database for the credentials
		$query = "SELECT lat from trips where trip_id = (?)";

		//Data is passed to the database using prepared statements to avoid SQL Injection attacks
		mysqli_stmt_prepare($stmt,$query);
		mysqli_stmt_bind_param($stmt,"s",$tripId);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$lat);
		mysqli_stmt_store_result($stmt);

    if(mysqli_stmt_num_rows($stmt) == 1) {

      while(mysqli_stmt_fetch($stmt)) {
        echo $lat;
      }
     }
    mysqli_close($connection);
	}

	?>
