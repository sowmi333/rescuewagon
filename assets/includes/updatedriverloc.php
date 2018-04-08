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
  $lat = $_POST['lat'];
  $lon = $_POST['lon'];

	//Calls the function ValidateUser() with the arguments $email,$password,$stmt,$connection and holds the return value of that function
	updateLocation($vehicleId, $lat, $lon, $stmt, $connection);

	//Function that validates the user
	function updateLocation($vehicleId, $lat, $lon, $stmt, $connection){

    $time = date( "Y-m-d H:i:s", time());

    //Following code selects the st_id and status from database for the credentials
		$query = "SELECT vehicle_id from vehicle_locations where vehicle_id = (?)";

		//Data is passed to the database using prepared statements to avoid SQL Injection attacks
		mysqli_stmt_prepare($stmt,$query);
		mysqli_stmt_bind_param($stmt,"s",$vehicleId);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$vehicleId);
		mysqli_stmt_store_result($stmt);

    if(mysqli_stmt_num_rows($stmt) == 1) {

      $query = "UPDATE vehicle_locations SET lat = (?), lon=(?), timestamp = (?) where vehicle_id = (?)";

      //Data is passed to the database using prepared statements to avoid SQL Injection attacks
      mysqli_stmt_prepare($stmt,$query);
      mysqli_stmt_bind_param($stmt,"ssss",$lat, $lon,$time, $vehicleId);
      mysqli_stmt_execute($stmt);
     }
     else {
       $query = "INSERT INTO vehicle_locations (vehicle_id, lat, lon) VALUES (?,?,?)";

       //Data is passed to the database using prepared statements to avoid SQL Injection attacks
       mysqli_stmt_prepare($stmt,$query);
       mysqli_stmt_bind_param($stmt,"sss",$vehicleId, $lat, $lon);
       mysqli_stmt_execute($stmt);
     }
    mysqli_close($connection);
	}

	?>
