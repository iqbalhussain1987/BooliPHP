<?php
/**
 * Booli Exception
 * @author Niklas Fors [niklas.fo.git@gmail.com]
 * @package BooliPHP
 * @copyright 2012 Niklas Fors
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link http://github.com/niklasfo/BooliPHP
 */
class BooliException extends Exception {

}

/**
 * Missing credentials exception
 * @author Niklas Fors [niklas.fo.git@gmail.com]
 * @copyright 2012 Niklas Fors
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link http://github.com/niklasfo/BooliPHP
 */
class BooliMissingCredentialsException extends BooliException {
	/**
	 * Default error message
	 * @var string
	 */
	protected $message = 'Booli authentication credentials callerId and/or key missing! Please provide a valid callerId and key.';
}

/**
 * Invalid HTTP response from Booli
 * @author Niklas Fors [niklas.fo.git@gmail.com]
 * @copyright 2012 Niklas Fors
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link http://github.com/niklasfo/BooliPHP
 */
class BooliHTTPException extends BooliException {
	/**
	 * Response from Booli
	 * @var string
	 */
	protected $response = '';

	/**
	 * Default error message
	 * @var string
	 */
	protected $message = 'Booli responded with HTTP status code %s!';

	/**
	 * Override constructor to make message and code required
	 * @param string $response Response from Booli
	 * @param int $code HTTP status code from Booli
	 */
	public function __construct( $response, $code ){
		$this->response = $response;
		$message = sprintf($this->message, HTTPStatusCode::getMessage($code));
		parent::__construct($message, $code);
	}
}
?>
