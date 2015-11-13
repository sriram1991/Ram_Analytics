<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */


/*
|--------------------------------------------------------------------------
| GENERIC MODE 
|--------------------------------------------------------------------------
|
| These modes are used for white labeling.
|
*/
define('PRODUCT_LOGO', 			"ask_logo.png");
define('FAVICON_IMAGE', 		"ask.png");
define('PRODUCT_NAME',     		"Ask Analytics");
define('PRODUCT_SERIAL_CODE',   "ASKS");
define('DOMAIN_PROTOCOL', 		'http');
define('DOMAIN_HOST',			'localhost');
define('DOMAIN_PORT', 			'8086');

/*
|--------------------------------------------------------------------------
| E-Mail Configuration
|--------------------------------------------------------------------------
| Mobisir SKOL Email
| These modes are used for email labeling.
|
*/
/*
define('EMAIL_PROTOCOL', 	'smtp');
define('EMAIL_HOST', 		'smtp.mobisir.net');
define('EMAIL_PORT', 		'587');
define('EMAIL_USERID', 		'skol@mobisir.net');
define('EMAIL_PASSWD', 		'Admin@321');

*/
/*
|--------------------------------------------------------------------------
| Production E-Mail Configuration
|--------------------------------------------------------------------------
|
| These modes are used for email labeling.
|
*/

define('EMAIL_PROTOCOL', 	'smtp');
define('EMAIL_HOST', 		'ssl://smtp.gmail.com');
define('EMAIL_PORT', 		'465');
define('EMAIL_USERID', 		'askanalytics02@gmail.com');
define('EMAIL_PASSWD', 		'askadmin123');

/* End of file constants.php */
/* Location: ./application/config/constants.php */
