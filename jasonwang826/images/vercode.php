<?
/*
 *	Author : Jason Wang ( 1971-, Taiwan )
 *	作者 : 王佳陳 ( 1971年生於台灣 )
 *
 *	Jason Wang 826 Lab. All rights reserved
 *	版權係屬 Jason Wang 826 Lab. 所有，未經書面授權，不得任意轉作商業用途
 */
	require_once('../jasonwang826.inc');
	require_once('default.inc.php');

	$GD2_disabled=false;

	if( in_array( strtolower(ini_get('session.auto_start')), array('0','off') ) )	{
		if(!isset($_SESSION)) session_start();
	}
	$instance_id = $_GET['instance_id'];
	if( !isset($_SESSION['vercode']) )	die('vercode fail!');
	$acceptedChars=$_SESSION['vercode'][$instance_id]->accept_chars;
	$stringlength=$_SESSION['vercode'][$instance_id]->length;

	// Build the  validation string
	$max = strlen($acceptedChars)-1;
	$password = NULL;
	for($i=0; $i < $stringlength; $i++) {
		$cnum[$i] = $acceptedChars{mt_rand(0, $max)};
		$password .= $cnum[$i];
	}

	function image_gdVersion($user_ver = 0)	{
		if (! extension_loaded('gd')) { return; }
		static $gd_ver = 0;
		// Just accept the specified setting if it's 1.
		if ($user_ver == 1) { $gd_ver = 1; return 1; }
		// Use the static variable if function was called previously.
		if ($user_ver !=2 && $gd_ver > 0 ) { return $gd_ver; }
		// Use the gd_info() function if possible.
		if (function_exists('gd_info')) {
			$ver_info = gd_info();
			preg_match('/\d/', $ver_info['GD Version'], $match);
			$gd_ver = $match[0];
			return $match[0];
		}
		// If phpinfo() is disabled use a specified / fail-safe choice...
		if (preg_match('/phpinfo/', ini_get('disable_functions'))) {
			if ($user_ver == 2) {
				$gd_ver = 2;
				return 2;
			} else {
				$gd_ver = 1;
				return 1;
			}
		}
		// ...otherwise use phpinfo().
		ob_start();
		phpinfo(8);
		$info = ob_get_contents();
		ob_end_clean();
		$info = stristr($info, 'gd version');
		preg_match('/\d/', $info, $match);
		$gd_ver = $match[0];
		return $match[0];
	}

	if( !$GD2_disabled && image_gdVersion()>=2 )	{

		// A value between 0 and 100 describing how much color overlap
		// there is between text and other objects.  Lower is more
		// secure against bots, but also harder to read.
		$contrast = 50;

		// Various obfuscation techniques.
		$num_polygons = 2; // Number of triangles to draw.  0 = none
		$num_ellipses = 2;  // Number of ellipses to draw.  0 = none
		$num_lines = 2;  // Number of lines to draw.  0 = none
		$num_dots = 5;  // Number of dots to draw.  0 = none

		$min_thickness = 2;  // Minimum thickness in pixels of lines
		$max_thickness = 8;  // Maximum thickness in pixles of lines
		$min_radius = 5;  // Minimum radius in pixels of ellipses
		$max_radius = 15;  // Maximum radius in pixels of ellipses

		// How opaque should the obscuring objects be. 0 is opaque, 127
		// is transparent.
		$object_alpha = 100;

		// Keep #'s reasonable.
		$min_thickness = max(1,$min_thickness);
		$max_thickness = min(20,$max_thickness);
		// Make radii into height/width
		$min_radius *= 2;
		$max_radius *= 2;
		// Renormalize contrast
		$contrast = 255 * ($contrast / 100.0);
		$o_contrast = 1.3 * $contrast;

		$width = $stringlength/4*13 * imagefontwidth (5);
		$height = 2.5 * imagefontheight (5);
		$image = imagecreatetruecolor ($width, $height);
		imagealphablending($image, true);
		$black = imagecolorallocatealpha($image,0,0,0,0);
		$white = imagecolorallocatealpha($image,255,255,255,0);
		imagefill( $image, 0, 0, $white );

		// Add string to image
		$rotated = imagecreatetruecolor (70, 70);
		$x=0;
		for ($i = 0; $i < $stringlength; $i++) {
			$buffer = imagecreatetruecolor (20, 20);
			$buffer2 = imagecreatetruecolor (40, 40);
			
			// Get a random color
			$red = mt_rand(0,192);
			$green = mt_rand(0,192);
			$blue = 255 - sqrt($red * $red + $green * $green);
			$color = imagecolorallocate ($buffer, $red, $green, $blue);

			// Create character
			imagestring($buffer, 5, 0, 0, $cnum[$i], $color);

			// Resize character
			imagecopyresized ($buffer2, $buffer, 0, 0, 0, 0, 40 + mt_rand(0,12), 32 + mt_rand(0,12), 20, 20);

			// Rotate characters a little
			$rotated = imagerotate($buffer2, mt_rand(-25, 25),imagecolorallocatealpha($buffer2,0,0,0,0)); 
			imagecolortransparent($rotated, imagecolorallocatealpha($rotated,0,0,0,0));

			// Move characters around a little
			$y = mt_rand(1, 3);
			$x += mt_rand(2, 6); 
			imagecopymerge ($image, $rotated, $x, $y, 0, 0, 40, 40, 100);
			$x += 22;

			imagedestroy ($buffer); 
			imagedestroy ($buffer2); 
		}

		// Draw polygons
		if ($num_polygons > 0) for ($i = 0; $i < $num_polygons; $i++) {
			$vertices = array (
				mt_rand(-0.25*$width,$width*1.25),mt_rand(-0.25*$width,$width*1.25),
				mt_rand(-0.25*$width,$width*1.25),mt_rand(-0.25*$width,$width*1.25),
				mt_rand(-0.25*$width,$width*1.25),mt_rand(-0.25*$width,$width*1.25)
			);
			$color = imagecolorallocatealpha ($image, mt_rand(0,$o_contrast), mt_rand(0,$o_contrast), mt_rand(0,$o_contrast), $object_alpha);
			imagefilledpolygon($image, $vertices, 3, $color);  
		}

		// Draw random circles
		if ($num_ellipses > 0) for ($i = 0; $i < $num_ellipses; $i++) {
			$x1 = mt_rand(0,$width);
			$y1 = mt_rand(0,$height);
			$color = imagecolorallocatealpha ($image, mt_rand(0,$o_contrast), mt_rand(0,$o_contrast), mt_rand(0,$o_contrast), $object_alpha);
		//	$color = imagecolorallocate($image, mt_rand(0,$o_contrast), mt_rand(0,$o_contrast), mt_rand(0,$o_contrast));
			imagefilledellipse($image, $x1, $y1, mt_rand($min_radius,$max_radius), mt_rand($min_radius,$max_radius), $color);  
		}

		// Draw random lines
		if ($num_lines > 0) for ($i = 0; $i < $num_lines; $i++) {
			$x1 = mt_rand(-$width*0.25,$width*1.25);
			$y1 = mt_rand(-$height*0.25,$height*1.25);
			$x2 = mt_rand(-$width*0.25,$width*1.25);
			$y2 = mt_rand(-$height*0.25,$height*1.25);
			$color = imagecolorallocatealpha ($image, mt_rand(0,$o_contrast), mt_rand(0,$o_contrast), mt_rand(0,$o_contrast), $object_alpha);
			imagesetthickness ($image, mt_rand($min_thickness,$max_thickness));
			imageline($image, $x1, $y1, $x2, $y2 , $color);  
		}

		// Draw random dots
		if ($num_dots > 0) for ($i = 0; $i < $num_dots; $i++) {
			$x1 = mt_rand(0,$width);
			$y1 = mt_rand(0,$height);
			$color = imagecolorallocatealpha ($image, mt_rand(0,$o_contrast), mt_rand(0,$o_contrast), mt_rand(0,$o_contrast),$object_alpha);
			imagesetpixel($image, $x1, $y1, $color);
		}

	}	else	{

		// A value between 0 and 100 describing how much color overlap
		// there is between text and other objects.  Lower is more
		// secure against bots, but also harder to read.
		$contrast = 50;

		// Various obfuscation techniques.
		$num_lines = 2;  // Number of lines to draw.  0 = none
		$num_dots = 5;  // Number of dots to draw.  0 = none

		$min_thickness = 2;  // Minimum thickness in pixels of lines
		$max_thickness = 8;  // Maximum thickness in pixles of lines
		$min_radius = 5;  // Minimum radius in pixels of ellipses
		$max_radius = 15;  // Maximum radius in pixels of ellipses

		// How opaque should the obscuring objects be. 0 is opaque, 127
		// is transparent.
		$object_alpha = 100;

		// Keep #'s reasonable.
		$min_thickness = max(1,$min_thickness);
		$max_thickness = min(20,$max_thickness);
		// Make radii into height/width
		$min_radius *= 2;
		$max_radius *= 2;
		// Renormalize contrast
		$contrast = 255 * ($contrast / 100.0);
		$o_contrast = 1.3 * $contrast;

		$width = $stringlength/4*13 * imagefontwidth (5);
		$height = 2.4 * imagefontheight (5);
		$image = imagecreate ($width, $height);
		$black = imagecolorallocate($image,0,0,0);
		$white = imagecolorallocate($image,255,255,255);
		imagefill( $image, 0, 0, $white );

		// Build the  validation string
		$max = strlen($acceptedChars)-1;
		$password = NULL;
		for($i=0; $i < $stringlength; $i++) {
			$cnum[$i] = $acceptedChars{mt_rand(0, $max)};
			$password .= $cnum[$i];
		}

		// Add string to image
		$rotated = imagecreate (70, 70);
		$x=0;
		for ($i = 0; $i < $stringlength; $i++) {
			$buffer = imagecreate (20, 20);
			$bgcolor = imagecolorallocate($buffer,0,0,0);
			$buffer2 = imagecreate (40, 40);
			$bgcolor2 = imagecolorallocate($buffer2,0,0,0);
			
			// Get a random color
			$red = mt_rand(0,192);
			$green = mt_rand(0,192);
			$blue = 255 - sqrt($red * $red + $green * $green);
			$color = imagecolorallocate ($buffer, $red, $green, $blue);

			// Create character
			imagestring($buffer, 5, 0, 0, $cnum[$i], $color);

			// Resize character
			imagecopyresized ($buffer2, $buffer, 0, 0, 0, 0, 40 + mt_rand(0,12), 32 + mt_rand(0,12), 20, 20);

			imagecolortransparent ($buffer2, $bgcolor2);

			// Move characters around a little
			$y = mt_rand(1, 3);
			$x += mt_rand(2, 6); 
			imagecopymerge ($image, $buffer2, $x, $y, 0, 0, 40, 40, 100);
			$x += 22;

			imagedestroy ($buffer); 
			imagedestroy ($buffer2); 
		}

		// Draw random lines
		if ($num_lines > 0) for ($i = 0; $i < $num_lines; $i++) {
			$x1 = mt_rand(-$width*0.25,$width*1.25);
			$y1 = mt_rand(-$height*0.25,$height*1.25);
			$x2 = mt_rand(-$width*0.25,$width*1.25);
			$y2 = mt_rand(-$height*0.25,$height*1.25);
			$color = imagecolorallocate ($image, mt_rand(0,$o_contrast), mt_rand(0,$o_contrast), mt_rand(0,$o_contrast));
			imageline($image, $x1, $y1, $x2, $y2 , $color);  
		}

		// Draw random dots
		if ($num_dots > 0) for ($i = 0; $i < $num_dots; $i++) {
			$x1 = mt_rand(0,$width);
			$y1 = mt_rand(0,$height);
			$color = imagecolorallocate ($image, mt_rand(0,$o_contrast), mt_rand(0,$o_contrast), mt_rand(0,$o_contrast));
			imagesetpixel($image, $x1, $y1, $color);
		}

	}

	$_SESSION['vercode'][$instance_id]->vercode = $password;

	header('Content-type: image/png');
	imagepng($image);
	imagedestroy($image);

?>