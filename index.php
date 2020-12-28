<?php
date_default_timezone_set("Asia/Jakarta");
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');
switch (ENVIRONMENT)
{
	case 'development':
		error_reporting(-1);
		ini_set('display_errors', 1);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors', 0);
		if (version_compare(PHP_VERSION, '5.3', '>='))
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		}
		else
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		}
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The app environment is not set correctly.';
		exit(1); // EXIT_ERROR
}
$engine_path = 'engine';
$app_folder = 'app';
$theme_folder = '';
// The directory name, relative to the "controllers" directory.  Leave blank
// if your controller is not in a sub-directory within the "controllers" one
// $routing['directory'] = '';

// The controller class file name.  Example:  mycontroller
// $routing['controller'] = '';

// The controller function you wish to be called.
// $routing['function']	= '';
// $assign_to_config['name_of_config_item'] = 'value of config item';
// Set the current directory correctly for CLI requests
if (defined('STDIN'))
{
	chdir(dirname(__FILE__));
}
if (($_temp = realpath($engine_path)) !== FALSE)
{
	$engine_path = $_temp.DIRECTORY_SEPARATOR;
}
else
{
	// Ensure there's a trailing slash
	$engine_path = strtr(
		rtrim($engine_path, '/\\'),
		'/\\',
		DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
	).DIRECTORY_SEPARATOR;
}
// Is the system path correct?
if ( ! is_dir($engine_path))
{
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
	exit(3); // EXIT_CONFIG
}
// The name of THIS file
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
// Path to the system directory
define('BASEPATH', $engine_path);
// Path to the front controller (this file) directory
define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
// Name of the "system" directory
define('SYSDIR', basename(BASEPATH));
// The path to the "app" directory
if (is_dir($app_folder))
{
	if (($_temp = realpath($app_folder)) !== FALSE)
	{
		$app_folder = $_temp;
	}
	else
	{
		$app_folder = strtr(
			rtrim($app_folder, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
}
elseif (is_dir(BASEPATH.$app_folder.DIRECTORY_SEPARATOR))
{
	$app_folder = BASEPATH.strtr(
		trim($app_folder, '/\\'),
		'/\\',
		DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
	);
}
else
{
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your app folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
	exit(3); // EXIT_CONFIG
}
define('APPPATH', $app_folder.DIRECTORY_SEPARATOR);
// The path to the "views" directory
if ( ! isset($theme_folder[0]) && is_dir(APPPATH.'views'.DIRECTORY_SEPARATOR))
{
	$theme_folder = APPPATH.'views';
}
elseif (is_dir($theme_folder))
{
	if (($_temp = realpath($theme_folder)) !== FALSE)
	{
		$theme_folder = $_temp;
	}
	else
	{
		$theme_folder = strtr(
			rtrim($theme_folder, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
}
elseif (is_dir(APPPATH.$theme_folder.DIRECTORY_SEPARATOR))
{
	$theme_folder = APPPATH.strtr(
		trim($theme_folder, '/\\'),
		'/\\',
		DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
	);
}
else
{
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
	exit(3); // EXIT_CONFIG
}
define('VIEWPATH', $theme_folder.DIRECTORY_SEPARATOR);
require_once BASEPATH.'core/CodeIgniter.php';
