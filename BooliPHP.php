<?php
require('BooliException.php');
require('HTTPStatusCode.php');

/**
 * Abstract class with low level Booli API.
 * This class needs to be extended to implement calls to Booli - this abstract class just takes care of the low level business.
 * @author Niklas Fors [niklas.fo.git@gmail.com]
 * @package BooliPHP
 * @copyright 2012 Niklas Fors
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link http://github.com/niklasfo/BooliPHP
 */
abstract class BooliPHP {
	/**
	 * Booli caller ID used for authentication
	 * @var string
	 */
	private $callerId;

	/**
	 * Booli private key used for authentication
	 * @var string
	 */
	private $key;

	/**
	 * URL for Booli API
	 * @var string
	 */
	private static $url = 'http://api.booli.se';

	/**
	 * cURL options used when communication with Booli
	 * @var array
	 */
	private static $curlOptions = array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_USERAGENT => 'BooliPHP'
	);

	/**
	 * Constructor for the Booli class
	 * @param string $callerId Name given in Booli registration
	 * @param string $key Private key from Booli
	 * @throws BooliMissingCredentialsException When user did not specify credentials
	 */
	function __construct( $callerId, $key ){
		if( empty($callerId) || empty($key) ){
			throw new BooliMissingCredentialsException();
		}
		$this->callerId = $callerId;
		$this->key = $key;
	}

	/**
	 * Generate a random string of specified length with chars from a-zA-Z0-9
	 * @param int $length Length of string to generate. Default 16
	 * @return string Generated string
	 * @throws BooliException
	 */
	private function generateRandomString( $length = 16 ){
		if( !is_int($length) ){
			throw new BooliException('Parameter length was not an int!');
		}
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}

	/**
	 * Returns authentication array used by Booli
	 * @return array Authentication array to be send to Booli
	 */
	protected function getAuthenticateArray(){
		$auth = array();

		//Caller id
		$auth['callerId'] = $this->callerId;

		//Unix timestamp
		$dateTime = new DateTime(NULL, new DateTimeZone('Europe/Stockholm'));
		$auth['time'] = $dateTime->getTimestamp();

		//16 character string, randomized for each request
		$auth['unique'] = $this->generateRandomString();

		//40 characters hexadecimal SHA1 hash of string (callerId + time + key + unique)
		$auth['hash'] = hash('sha1', $this->callerId . $auth['time'] . $this->key . $auth['unique']);
		return $auth;
	}

	/**
	 * Do request to Booli and returns result
	 * @param string $path Parameters to send to Booli
	 * @return string Result form Booli
	 * @throws BooliHTTPException
	 */
	protected function request( $path ){
		//Build URL
		$url = self::$url . $path;

		//Do call to Booli
		$curl = curl_init($url);
		curl_setopt_array($curl, self::$curlOptions);
		$response = curl_exec($curl);
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		//Make sure that call went fine
		if( $httpCode != HTTPStatusCode::HTTP_OK ){
			throw new BooliHTTPException($response, $httpCode);
		}

		//Return response from Booli
		return $response;
	}

	/**
	 * Function for getListing against Booli. Implement this in child!
	 * @abstract
	 * @param string $area Area to search in
	 * @param array $filter (optional) Extra parameters to send to Booli
	 * @param int $offset (optional) Offset from beginning to return result from
	 * @param int $limit (optional) Number of results
	 */
	abstract public function getListing( $area, array $filter = null, $offset = 0, $limit = 1000 );

}
?>
