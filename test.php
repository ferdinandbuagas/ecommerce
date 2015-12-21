<?php 

			/*// Create a blank image and add some text
			$im = imagecreatetruecolor(120, 20);
			$text_color = imagecolorallocate($im, 233, 14, 91);
			imagestring($im, 1, 5, 5,  'A Simple Text String', $text_color);

			// Set the content type header - in this case image/jpeg
			header('Content-Type: image/jpg');

			// Output the image
			imagejpeg($im);

			// Free up memory
			imagedestroy($im);*/






			/*$image_path = 'http://localhost/app/uploads/img/item_large_image/large_12120151449991022.jpg';	

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
			imagejpeg($image_p, null, 100);*/


	





			/*// The file
			$filename = 'http://localhost/app/uploads/img/item_large_image/large_12120151449991022.jpg';

		

			// Set a maximum height and width
			$width = 400;
			$height = 300;

			// Content type
			header('Content-Type: image/jpeg');

			// Get new dimensions
			list($width_orig, $height_orig) = getimagesize($filename);



			$ratio_orig = $width_orig/$height_orig;

			if ($width/$height > $ratio_orig) {
			   $width = $width/$width_orig;
			   $height = $height/$height_orig;
			} else {
			   $height = $width/$ratio_orig;
			}

			// Resample
			$image_p = imagecreatetruecolor($width, $height);
			$image = imagecreatefromjpeg($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

			// Output
			imagejpeg($image_p, null, 100);*/










			/*$jpeg_quality = 100;

			$x 		= 1044; //1044
			$y 		= 543; //543

			
			$scale = 1.1592; //5796 1.1592


			$targ_w = 400;
			$targ_h = 300;
			

			list($width_orig, $height_orig) = getimagesize('http://localhost/app/uploads/img/item_large_image/large_12120151449991022.jpg');
			
			$ratio_orig = $width_orig/$height_orig;



			$src = 'http://localhost/app/uploads/img/item_large_image/large_12120151449991022.jpg';
			$img_r = imagecreatefromjpeg($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );


			 
			imagecopyresampled($dst_r,$img_r,0,0,$x,$y,$targ_w,$targ_h,$width_orig,$height_orig);


			 
			header('Content-Type: image/jpeg');
			imagejpeg($dst_r,null,$jpeg_quality);*/






			$x 		= 0; //1044
			$y 		= 0; //543
			$scale = 1.1592;


			// The file
			$filename = 'http://localhost/app/uploads/img/item_large_image/large_12120151449991022.jpg';

			// Set a maximum height and width
			$new_width = 400;
			$new_height = 300;

			// Content type
			header('Content-Type: image/jpeg');

			// Get new dimensions
			list($width_orig, $height_orig) = getimagesize($filename);

			$ratio_orig = $width_orig/$height_orig;

			if ($new_width/$new_height > $ratio_orig) {
			   $new_width = $new_height*$ratio_orig;
			} else {
			   $new_height = $new_width/$ratio_orig;
			}

			// Resample
			$image_p = imagecreatetruecolor($new_width, $new_height);
			$image = imagecreatefromjpeg($filename);
			imagecopyresampled($image_p, $image, 0, 0, $x, $y, $new_width, $new_height, $width_orig, $height_orig);




			// Output
			imagejpeg($image_p, null, 100);








 echo "string";









?>
