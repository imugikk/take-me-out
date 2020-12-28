<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**/
function is_logged_in()
{
	$CI =& get_instance();
	$ss = $CI->session->userdata('LoggedIn');
	if($ss != '')
	{
		return TRUE;
	}
	return FALSE;
}
function randomString($amount)
{
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	$string = array(); //remember to declare $pass as an array
	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	for ($i = 0; $i < $amount; $i++) {
		$n = rand(0, $alphaLength);
		$string[] = $alphabet[$n];
	}
	return implode($string); //turn the array into a string
}
function generateCaptcha(){
	$vals = array(
		'word'          => randomString(16),
		'img_path'      => 'assets/media/captcha/',
		'img_url'       => 'https://localhost/office_edodon/assets/media/captcha/',
		'font_path'     => 'https://localhost/office_edodon/assets/fonts/baloo2/Baloo2-Regular.ttf',
		'img_width'     => 250,
		'img_height'    => 50,
		'expiration'    => 7200,
		'word_length'   => 8,
		'font_size'     => 20,
		'img_id'        => 'Imageid',
		'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

		// White background and border, black text and red grid
		'colors'        => array(
			'background' => array(102, 204, 255),
			'border' => array(255, 255, 255),
			'text' => array(255, 255, 255),
			'grid' => array(250, 240, 109)
		)
	);

	$cap = create_captcha($vals);
	return $cap['image'];
}
if ( ! function_exists('log2file'))
{
	function log2file($msg)
	{
		$myFile = "log_file.txt";
		$fh = fopen($myFile, 'a') or die("can't open file");
		$stringData = date("Y-m-d h:m:s").chr(13);
		fwrite($fh, $stringData);
		
		fwrite($fh, $msg.chr(13).chr(13));
		fclose($fh);
	}
}
if ( ! function_exists('GUID'))
{
	function GUID()
	{
		if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
}