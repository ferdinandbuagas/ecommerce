<?php 
require 'config.php';
require 'database.php';


Class Users {

	protected $con;
	protected $get_userID;



	public function __construct(){
		$this->con = connect();
	}	

	public function userRegister(){
		$conn = $this->con;
		$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));


		if (isset($_POST['registerForm'])){

			$username  			    = $_POST['username']; 
	        $firstname 	            = $_POST['firstname'];
	        $lastname  			    = $_POST['lastname'];
			$email 	   		        = $_POST['email'];


			/*Adding salt to password*/
	        $password 				= sha1($_POST['password']) . 'qwertyuiop1234567890asdfghjklzxcvbnm';
	        $password_confirmation  = sha1($_POST['password_confirmation']) . 'qwertyuiop1234567890asdfghjklzxcvbnm';  

			if ($password == $password_confirmation) {	

	        	$query     = "INSERT INTO `users` (username, firstname, lastname, password, email) VALUES ('$username', '$firstname', '$lastname', '$password', '$email')";
	        	$result    = $conn->query($query) or die (mysqli_error()); 

	        	$_SESSION['username'] = $username;

	        	$update_user = "UPDATE users SET is_active = 1 WHERE username = ('$username')";
	        	$result = $conn->query($update_user) or die (mysqli_error()); 

	        	header("Location: index.php");	
				exit();

	        }else{
		        	return "Password does not match. Type both passwords again.";
	             }   
	        
	    

		}

	   /* // If the values are posted, insert them into the database.
	    if (isset($_POST['username']) && isset($_POST['password']))
	    {
	        
	 
	        
	    }*/
	}

	public function userLogin(){
		$url = $_SERVER["PHP_SELF"];
		$conn = $this->con;
		$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));

		if (isset($_POST['loginForm'])) {

			//Assigning posted values to variables.
			$username = $_POST['username'];
			$password = sha1($_POST['password']) . 'qwertyuiop1234567890asdfghjklzxcvbnm';			
			

			//Checking the values if exist in database
			$query    = "SELECT * FROM `users` WHERE username='$username' and password='$password'";								 
			$result   = $conn->query($query) or die (mysqli_error());

			$count    = mysqli_num_rows($result);			

			//If the posted values are equal to the database values, then session will be created for the user.
			if ($count == 1){
				$_SESSION['username'] = $username;	
				echo "yo"; 
				$status = "UPDATE users SET is_active = 1 WHERE username = ('$username')";
				$result = $conn->query($status) or die (mysqli_error());
				echo "ye"; 					

				/* Redirect to HomePage */
				header("Location: index.php");	
				exit();	

			}elseif ($url == '/index.php') {
				header("Location: login.php");	
			}else{
			//If the login credentials doesn't match, error message will be shown.			
			return "Invalid Login Credentials.";
			}	
	
		}			
	}

	public function userLogout(){

		$conn 		= $this->con;
		$username 	= $_SESSION['username'];
		$query 		= "UPDATE users SET is_active = 0 WHERE username = ('$username')";	
		$result 	= $conn->query($query);

		if ($result) {
			return $result;				
			$conn->close();	
		}
		echo $mysqli->error;	

	}

	public function showLoggedUser(){

		$conn 		= $this->con;
		$username 	= $_SESSION['username'];
		$query  	= "SELECT * FROM users WHERE username = ('$username')";	
		$result 	= $conn->query($query);			

	  	foreach ($result as $row) {
	  		return $row['username'];
	  	}
	}

	public function getUserID(){

		$conn 		= $this->con;

		if (isset($_SESSION['username'])) {

			$username 	= $_SESSION['username'];
			$query  	= "SELECT * FROM users WHERE username = ('$username')";	
			$result 	= $conn->query($query);	
			foreach ($result as $row) {
		  		return $row['id'];
		  	}
		}	
		return "not logged in";	
	  	
	}







	/*TRANSFER THESE FUNCTIONS TO ANOTHER CLASS*/

	public function getItem(){
		$conn 		= $this->con;
		$host  		= $_SERVER['HTTP_HOST']; 		
		$username 	= isset($_SESSION['username']);

		$query 		= "SELECT * from item";
		$result 	= $conn->query($query);
		/*$count    	= mysqli_num_rows($result); */
		return $result;
	}

	public function getCategory(){
		$conn 		= $this->con;
		$query 		= "SELECT * from item_category";
		$result 	= $conn->query($query);		
		return $result;		
	}

	public function uploadItem(){
		$conn = $this->con;
		$set_image = 'large_1212015';

		if (isset($_POST['item-upload'])) {

			/*Adding salt to image to avoid error in uploading with same file name*/
			$temp = explode(".", $_FILES["fileToUpload"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);	

			/*Set Image path*/ 
			$imgUrl  		= '/app/uploads/img/item_large_image/';
			/*$ImageFileName  = $imgUrl . $_FILES['fileToUpload']['name'] . $newfilename; */ 
			$ImageFileName  = $imgUrl . $set_image . $newfilename;

			/*Upload Image*/
			$target_dir = $_SERVER['DOCUMENT_ROOT'].'/app/uploads/img/item_large_image/';
			/*$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"] . $newfilename);*/
			$target_file = $target_dir . basename($set_image . $newfilename);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			// Check if image file is a actual image or fake image
			if(isset($_POST["item-upload"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}

			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}

			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 5000000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";

			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			        /*$uploadedImageFile = $imgUrl . basename( $_FILES["fileToUpload"]["name"]);
			        return $uploadedImageFile;*/

			        $user_id				= $this->getUserID();
					$item_large_image_path	= $ImageFileName;
					$item_thumb_image_path	= 'paping';
					$is_active	   			= isset($_POST['get-status'])? '1' : '0';
					$item_name 				= $_POST['item-name'];
			        $item_category 	    	= $_POST['item-category'];
			        $item_desc  			= $_POST['item-desc'];
					$item_price 	   		= $_POST['item-price'];
					$item_quantity	   		= $_POST['item-quantity'];

					$query 					= "INSERT INTO `item` (user_id, item_category, item_name, item_description, item_price, item_quantity, item_large_image_path, item_thumb_image_path, item_status) VALUES ('$user_id','$item_category','$item_name','$item_desc','$item_price','$item_quantity','$item_large_image_path','$item_thumb_image_path','$is_active')";
					$result 				= $conn->query($query) or die (mysqli_error($conn));
					return $result;	
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}					
		}
	}

	public function getUploadedItem(){
		$conn     = $this->con;	
		$user_id  = $this->getUserID();	
		$query 	  = "SELECT * FROM item WHERE user_id = ('$user_id')";
		$result   = $conn->query($query) or die (mysqli_error($conn));		

		/* fetch object array */
	    while ($row = $result->fetch_row()) {
	        $get_image = $row[7];
	    }

	    if (isset($get_image)) {
	    	return $get_image;
	    }


	}

	public function getThumb(){
		
		$conn      = $this->con;
		$user_id  = $this->getUserID();	

		if (isset($_POST['item_save_thumb'])) {	

			/*$x 		= $_POST['x1'];
			$y 		= $_POST['y1'];
			$width 	= $_POST['width1'];
			$height = $_POST['height1'];
			$scale 	= $_POST['scale1'];
			$angle 	= $_POST['angle1'];


			$thumb_width = 300;	
			$thumb_height = 400;

			$set_image = 'thumb_1212015';
			$target_dir = $_SERVER['DOCUMENT_ROOT'].'/app/uploads/img/item_thumb_image/';
			$target_file = $target_dir . basename($set_image);

			$url = $_SERVER['DOCUMENT_ROOT'];
			$image_path = 'http://localhost/app/uploads/img/item_large_image/large_12120151449991022.jpg';		
			$image_source = $url . $image_path;		*/
			


			$image_path = 'http://localhost/app/uploads/img/item_large_image/large_12120151449991022.jpg';	

			// The file
			$filename = $image_path;

			// Set a maximum height and width
			$width = 800;
			$height = 800;

			// Content type
			header('Content-Type: image/jpeg');		

			// Get new dimensions
			list($width_orig, $height_orig) = getimagesize($filename);

			$ratio_orig = $width_orig/$height_orig;

			if ($width/$height > $ratio_orig) {
			   $width = $height*$ratio_orig;
			} else {
			   $height = $width/$ratio_orig;
			}

			// Resample
			$image_p = imagecreatetruecolor($width, $height);
			$image = imagecreatefromjpeg($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

			// Output
			imagejpeg($image_p, null, 100);
			die();

			/*return $x . "<br>" . $y . "<br>" . $width . "<br>" . $height . "<br>" . $scale . "<br>" . $angle;*/	

		
		}
		
	}











	/*This is for development purposes only DO NOT DELETE*/
	public function pp($value){
		echo "<pre>";
		print_r($value);
		echo "</pre>";
	}

}

?>











	


