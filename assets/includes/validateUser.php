<?php

	//Sets the base directory of the host
    if(!defined('BASE')){
        define('BASE', $_SERVER["DOCUMENT_ROOT"]);
    }

	//Includes the database file that establishes the connection to the database
    include_once BASE.'/assets/includes/db.php';

	//Initiates the prepared statement
	$stmt = mysqli_stmt_init($connection);

  $userId = $_POST['userId'];
  $password = $_POST['userPassword'];

	//Calls the function ValidateUser() with the arguments $email,$password,$stmt,$connection and holds the return value of that function
	validateDriver($userId,$password,$stmt,$connection);

	//Function that validates the user
	function validateDriver($userId, $password, $stmt, $connection){
    //Starts the session if it is not already started
  	if(!isset($_SESSION)){
  		session_start();
  	}

    $password = md5($password);
		//Following code selects the st_id and status from database for the credentials
		$query = "SELECT user_id, user_name, user_phone from users where user_id = (?) and user_password = (?)";

		//Data is passed to the database using prepared statements to avoid SQL Injection attacks
		mysqli_stmt_prepare($stmt,$query);
		mysqli_stmt_bind_param($stmt,"ss",$userId,$password);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$userId, $userNane, $userPhone);
		mysqli_stmt_store_result($stmt);

		if(mysqli_stmt_num_rows($stmt) == 1) {
        while (mysqli_stmt_fetch($stmt)) {
            $_SESSION['userId'] = $userId;
            $_SESSION['userName'] = $userNane;
            $_SESSION['userPhone'] = $userPhone;
        }
        echo "success";
		}
		else {
        $_SESSION['error'] = 1;
		    header('Location: /auth.php');
        echo "error";
		}
    mysqli_close($connection);
	}

	?>
