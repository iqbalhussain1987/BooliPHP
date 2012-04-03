<?php
/**
 * HTTPStatusCode provides named constants and messages for HTTP status codes used by Booli.
 * Please note that these are a subset of all HTTP status codes.
 * @author Niklas Fors [niklas.fo.git@gmail.com]
 * @package BooliPHP
 * @copyright 2012 Niklas Fors
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link http://github.com/niklasfo/BooliPHP
 */
class HTTPStatusCode {
	//OK
	const HTTP_OK = 200;
	const HTTP_CREATED = 201;

	//Client error
	const HTTP_BAD_REQUEST = 400;
	const HTTP_FORBIDDEN = 403;
	const HTTP_NOT_FOUND = 404;
	const HTTP_METHOD_NOT_ALLOWED = 405;
	const HTTP_NOT_ACCEPTABLE = 406;

	//Server error
	const HTTP_INTERNAL_SERVER_ERROR = 500;
	const HTTP_SERVICE_UNAVAILABLE = 503;

	/**
	 * Array containing message for each status code
	 * @var array
	 */
	private static $messages = array(
		HTTPStatusCode::HTTP_OK => '200 - OK',
		HTTPStatusCode::HTTP_CREATED => '201 - Created',

		HTTPStatusCode::HTTP_BAD_REQUEST=>'400 - Bad Request',
		HTTPStatusCode::HTTP_FORBIDDEN=>'403 - Forbidden',
		HTTPStatusCode::HTTP_NOT_FOUND=>'404 - Not Found',
		HTTPStatusCode::HTTP_METHOD_NOT_ALLOWED=>'405 - Method Not Allowed',
		HTTPStatusCode::HTTP_NOT_ACCEPTABLE=>'406 - Not Acceptable',

		HTTPStatusCode::HTTP_INTERNAL_SERVER_ERROR=>'500 - Internal Server Error',
		HTTPStatusCode::HTTP_SERVICE_UNAVAILABLE=>'503 - Service Unavailable'
	);

	/**
	 * Get message for specific status code
	 * @static
	 * @param int $code HTTP status code
	 * @return string Message
	 */
	public static function getMessage($code){
		return self::$messages[$code];
	}
}
?>
