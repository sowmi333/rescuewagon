<?php

	//Sets the base directory of the host
    if(!defined('BASE')){
        define('BASE', $_SERVER["DOCUMENT_ROOT"]);
    }

	//Includes the database file that establishes the connection to the database
    include_once BASE.'/assets/includes/db.php';

  //Starts the session if it is not already started
  if(!isset($_SESSION)){
    session_start();
  }


	//Initiates the prepared statement
	$stmt = mysqli_stmt_init($connection);

  $driverId = $_SESSION['driverId'];
  $phone = $_POST['driverPhone'];
  $name = $_POST['driverName'];
  $vehicleId = $_POST['vehicleId'];

	//Calls the function ValidateUser() with the arguments $email,$password,$stmt,$connection and holds the return value of that function
	updateDriver($driverId, $phone, $name, $vehicleId, $stmt, $connection);

	//Function that validates the user
	function updateDriver($driverId, $phone, $name, $vehicleId, $stmt, $connection){
    //Starts the session if it is not already started
  	if(!isset($_SESSION)){
  		session_start();
  	}

		//Following code selects the st_id and status from database for the credentials
		$query = "SELECT driver_id from drivers where driver_id = (?)";

		//Data is passed to the database using prepared statements to avoid SQL Injection attacks
		mysqli_stmt_prepare($stmt,$query);
		mysqli_stmt_bind_param($stmt,"s",$driverId);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$driverId);
		mysqli_stmt_store_result($stmt);

		if(mysqli_stmt_num_rows($stmt) == 1) {
      $query = "UPDATE drivers SET phone = (?), driver_name = (?), vehicle_id = (?) where driver_id = (?)";

  		//Data is passed to the database using prepared statements to avoid SQL Injection attacks
  		mysqli_stmt_prepare($stmt,$query);
  		mysqli_stmt_bind_param($stmt,"ssss",$phone, $name, $vehicleId, $driverId);
  		mysqli_stmt_execute($stmt);

      $_SESSION['phone'] = $phone;
      $_SESSION['driverName'] = $name;
      $_SESSION['vehicleId'] = $vehicleId;
      echo "success";
		}
		else {
      echo "error";
		}
    mysqli_close($connection);
	}

	?>
