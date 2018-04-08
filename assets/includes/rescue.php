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

  $lat = $_POST['lat'];
  $lon = $_POST['lon'];
  $type = $_POST['type'];
  $patients = $_POST['patients'];
  $priority = $_POST['priority'];


	//Calls the function ValidateUser() with the arguments $email,$password,$stmt,$connection and holds the return value of that function
	rescue($type, $patients, $priority, $lat, $lon, $stmt, $connection);

	//Function that validates the user
	function rescue($type, $patients, $priority, $lat, $lon, $stmt, $connection){

    $tripStatus = 0;
    if ($priority == "High") {
      $priority = 1;
    }
    else {
      $priority = 0;
    }

    $vehicleId = "ECHN101";
    $vehicleStatus = 1;

    $query = "INSERT INTO trips (type, patients, lat, lon, priority, trip_status, vehicle_id, vehicle_status) VALUES (?,?,?,?,?,?,?,?)";

    //Data is passed to the database using prepared statements to avoid SQL Injection attacks
    mysqli_stmt_prepare($stmt,$query);
    mysqli_stmt_bind_param($stmt,"ssssssss",$type, $patients, $lat, $lon, $priority, $tripStatus, $vehicleId, $vehicleStatus);
    mysqli_stmt_execute($stmt);

    echo "success";

    mysqli_close($connection);
	}

	?>
