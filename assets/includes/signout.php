<?php

	//Starts the session if it is not already started
	if(!isset($_SESSION)){
		session_start();
	}

	//Destroys the user's session
	session_destroy();

	//After destroying the cookies redirects the user to the signin page
	header("Location: /");

	?>
