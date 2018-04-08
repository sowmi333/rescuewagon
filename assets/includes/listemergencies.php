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
	listEmergencies($stmt, $connection);

	//Function that validates the user
	function listEmergencies($stmt, $connection){

    //Following code selects the st_id and status from database for the credentials
		$query = "SELECT type_id, type_name, type_details from first_aid";

		//Data is passed to the database using prepared statements to avoid SQL Injection attacks
		mysqli_stmt_prepare($stmt,$query);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$typeId, $typeName, $typeDetails);
		mysqli_stmt_store_result($stmt);
    while (mysqli_stmt_fetch($stmt)) {
        echo '<div class="dropdown-menu">
          <a class="dropdown-item">'.$typeName.'</a>
        </div>';
    }
    mysqli_close($connection);
	}

	?>
