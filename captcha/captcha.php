<?php  if ( ! session_id() ) { session_start();}  ?>
<?php

$captcha_function = function() {
    //Set the image width and height
    $width = 80;
    $height = 30; 
	
	//ABCDEFGHIJKLMNOPQRSTUVWXYZ
	$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
	$text = substr(str_shuffle($chars),0,5);
	$_SESSION['captcha-text'] =$text;

    //Create the image resource 
    $image = ImageCreate($width, $height);  

    //We are making three colors, white, black and gray
    $white = ImageColorAllocate($image, 255, 255, 255);
    $black = ImageColorAllocate($image, 92, 100, 100);
    $grey = ImageColorAllocate($image, 92, 100, 92);

    //Make the background black 
    ImageFill($image, 0, 0, $black); 

    //Add randomly generated string in white to the image
    ImageString($image, 40, 25, 8, $text, $white); 

    //Throw in some lines to make it a little bit harder for any bots to break 
    ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
   // imageline($image, 0, $height/2, $width, $height/2, $grey); 
    //imageline($image, $width/2, 0, $width/2, $height, $grey); 
 
    //Tell the browser what kind of file is come in 
    header("Content-Type: image/jpeg"); 

    //Output the newly created image in jpeg format 
    ImageJpeg($image);
   
    //Free up resources
    ImageDestroy($image);
};

//Send a generated image to the browser
$captcha_function();
exit();

?>