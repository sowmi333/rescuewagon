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

  $vehicleId = $_SESSION['vehicleId'];

	//Calls the function ValidateUser() with the arguments $email,$password,$stmt,$connection and holds the return value of that function
	notifyDriver($vehicleId, $stmt, $connection);

	//Function that validates the user
	function notifyDriver($vehicleId, $stmt, $connection){

    //Following code selects the st_id and status from database for the credentials
		$query = "SELECT location, vehicle_status, trip_id, trip_status from trips where vehicle_id = (?) and trip_status = 1";

		//Data is passed to the database using prepared statements to avoid SQL Injection attacks
		mysqli_stmt_prepare($stmt,$query);
		mysqli_stmt_bind_param($stmt,"s",$vehicleId);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$location, $vehicleStatus, $tripId, $tripStatus);
		mysqli_stmt_store_result($stmt);

    if(mysqli_stmt_num_rows($stmt) >= 1) {
        while (mysqli_stmt_fetch($stmt)) {
            if ($tripStatus == 1) {
              echo "yes";
            }
        }
		}
    mysqli_close($connection);
	}

	?>
