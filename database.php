<?php 
	
	/*Database Connection*/
	function connect(){			

		global $my_host;
		global $my_user;
		global $my_pass;
		global $my_db;	

		// Create connection
		$conn = new mysqli($my_host, $my_user, $my_pass, $my_db);

		// Check connection
		if ($conn->connect_error) {
			echo "Not Connected to Database";
		    die("Connection failed: " . $conn->connect_error);
		} 
		//echo "Connected successfully";
		return $conn;
		$conn->close();

	}

	

?>