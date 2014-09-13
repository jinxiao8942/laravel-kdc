<?php
/*
*	!!! THIS IS JUST AN EXAMPLE !!!, PLEASE USE ImageMagick or some other quality image processing libraries
*/

$imgUrl = $_POST['imgUrl'];
$imgInitW = $_POST['imgInitW'];
$imgInitH = $_POST['imgInitH'];
$imgW = $_POST['imgW'];
$imgH = $_POST['imgH'];
$imgY1 = $_POST['imgY1'];
$imgX1 = $_POST['imgX1'];
$cropW = $_POST['cropW'];
$cropH = $_POST['cropH'];

$jpeg_quality = 100;

$output_filename = "/uploads/news_imgs/croppedImg_".rand();

$what = getimagesize(realpath(dirname(__FILE__)).$imgUrl);
// print_r($imgUrl);
switch(strtolower($what['mime']))
{
    case 'image/png':
        $img_r = imagecreatefrompng(realpath(dirname(__FILE__)).$imgUrl);
		$source_image = imagecreatefrompng(realpath(dirname(__FILE__)).$imgUrl);
		$type = '.png';
        break;
    case 'image/jpeg':
        $img_r = imagecreatefromjpeg(realpath(dirname(__FILE__)).$imgUrl);
		$source_image = imagecreatefromjpeg(realpath(dirname(__FILE__)).$imgUrl);
		$type = '.jpeg';
        break;
    case 'image/gif':
        $img_r = imagecreatefromgif(realpath(dirname(__FILE__)).$imgUrl);
		$source_image = imagecreatefromgif(realpath(dirname(__FILE__)).$imgUrl);
		$type = '.gif';
        break;
    default: die('image type not supported');
}
	
	$resizedImage = imagecreatetruecolor($imgW, $imgH);
	imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, 
				$imgH, $imgInitW, $imgInitH);	
	
	
	$dest_image = imagecreatetruecolor($cropW, $cropH);
	imagecopyresampled($dest_image, $resizedImage, 0, 0, $imgX1, $imgY1, $cropW, 
				$cropH, $cropW, $cropH);	


	imagejpeg($dest_image, realpath(dirname(__FILE__)).$output_filename.$type, $jpeg_quality);
	
	$response = array(
			"status" => 'success',
			"url" => $output_filename.$type 
		  );
	 print json_encode($response);

?>