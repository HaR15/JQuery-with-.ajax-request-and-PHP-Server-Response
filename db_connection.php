<?php
		//initialize globals
		define('HOST', 'localhost');
		define('USER', 'root');
		define('PASSWORD', 'root');
		define('DATABASE', 'my_db');
		
		// connect to database
		$link = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
		// error checking
		if (mysqli_connect_errno()) {
				// failed to connect
				 echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
?>