<?php
/**
 * @package		OpenCart
 * @author		Daniel Kerr
 * @copyright	Copyright (c) 2005 - 2017, OpenCart, Ltd. (https://www.opencart.com/)
 * @license		https://opensource.org/licenses/GPL-3.0
 * @link		https://www.opencart.com
*/

/**
* Mail class
*/
class Sms {
	protected $to;
	
	protected $text;
	

	/**
	 * Constructor
	 *
	 * @param	string	$adaptor
	 *
 	*/
	public function __construct($adaptor = 'sms') {
		$class = 'Sms\\' . $adaptor;
		
		if (class_exists($class)) {
			$this->adaptor = new $class();
		} else {
			trigger_error('Error: Could not load sms adaptor ' . $adaptor . '!');
			exit();
		}	
	}
	
	/**
     * 
     *
     * @param	mixed	$to
     */
	public function setTo($to) {
		$this->to = $to;
	}
	

	
	/**
     * 
     *
     * @param	string	$text
     */
	public function setText($text) {
		$this->text = $text;
	}
	
	
	public function send() {
		if (!$this->to) {
			throw new \Exception('Error: Mobile number to required!');
		}

		

		
		

		if ((!$this->text) ) {
			throw new \Exception('Error:  message required!');
		}
		
		foreach (get_object_vars($this) as $key => $value) {
			$this->adaptor->$key = $value;
		}
		
	  return	$this->adaptor->send();
	}


	public function sendOTP() {
		if (!$this->to) {
			throw new \Exception('Error: Mobile number to required!');
		}

		

		
		

		if ((!$this->text) ) {
			throw new \Exception('Error:  message required!');
		}
		
		foreach (get_object_vars($this) as $key => $value) {
			$this->adaptor->$key = $value;
		}
		
	  return	$this->adaptor->sendOTP();
	}
}