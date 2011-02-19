<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This file is found in controller section of the codeigniter libraries directory
 *
 */

include(APPPATH.'libraries/facebook_php_sdk/facebook.php');

/**
 * Facebook Connect Class 
 *
 * Access PHP SDK & Graph API base Facebook Connect. 
 *
 * @autoloaded NO
 * @path /system/application/libraries/fb_connect.php
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @copyright 2010 Prospace LLC
 * @version 1.0 Alpha
 * 
 */
 

class Fb_connect {

	private $CI;
	public $fb_user;


/**
 * Connection Class. 
 *
 * {@source }
 * @autoloaded NO
 * @path /system/application/libraries/fb_connect.php
 * @author James Ming <jamesming@gmail.com>
 * @copyright 2010 Prospace LLC
 * @version 1.0 Alpha
 * 
 */
 
	function Fb_connect(){

				$this->CI =& get_instance();

				$this->fb = new Facebook(array(
					'appId'	=> $this->CI->config->item('facebook_apid'),
					'secret'	=> $this->CI->config->item('facebook_secret_key'),
					'cookie'	=> true,
				));
				
				//      echo '<pre>';
				//			print_r( $this->fb->getSession()  );
				//			echo '</pre>';  
				
				if(  $this->fb->getSession()  ){
					
				// 			echo '<pre>';
				//			print_r( $this->fb->api('/me')  );
				//			echo '</pre>'; 
							
							$this->fb_user =  $this->fb->api('/me');  
					
				};
				
	} 
	
	
} 