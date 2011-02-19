<?php

/**
 * Authorize.net transaction class for CodeIgniter
 *
 * @author			James Gifford
 * @link			http://jamesgifford.com
 * @created 		March 11, 2008
 * @last_modified 	December 16, 2008
 * @filesource
 */
class Authorize_net 
{	
	/**
	 * Constructor
	 */
	function __construct ()
	{
		$this->ci =& get_instance();
		
		// Settings
		$this->config_authorize_url = "https://secure.authorize.net/gateway/transact.dll";
		$this->config_detail_response = true;
		
		// Set default parameters
		$this->x_version = '3.1';
		$this->x_delim_char = '*';
		$this->x_encap_char = '';
		$this->x_relay_response = 'False';
		$this->x_type = 'AUTH_CAPTURE';
		
		$this->response_fields = array('response_code', 'response_subcode', 'response_reason_code', 'response_reason_text', 'authorization_code', 'avs_response', 'transaction_id', 'invoice_number', 'description', 'amount', 'method', 'transaction_type', 'customer_id', 'first_name', 'last_name', 'company', 'address', 'city', 'state', 'zip_code', 'country', 'phone', 'fax', 'email_address', 'ship_to_first_name', 'ship_to_last_name', 'ship_to_company', 'ship_to_address', 'ship_to_city', 'ship_to_state', 'ship_to_zip_code', 'ship_to_country', 'tax', 'duty', 'freight', 'tax_exempt', 'purchase_order_number', 'md5_hash', 'card_code_response', 'cardholder_authentication_verification_response', 'customer_id');
		$this->fail = false;
	}
	
	/**
	 * Send a request to Authorize.net
	 * @access 	public
	 * @param 	bool 	$testing 	whether to send a test request
	 * @return 	bool
	 */
	public function process ($testing = false)
	{
		if ($testing)
			$this->set_test();
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->config_authorize_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->params_str());
		$result = curl_exec($ch);
		curl_close($ch);
		
		if (!$result) {
			$this->fail = true;
			
			return false;
		}
		
		$this->response = explode($this->x_delim_char, str_replace($this->x_encap_char, '', $result));
		
		if (count($this->response) <= 1) {
			$this->fail = true;
			
			return false;
		}
		
		if ($this->config_detail_response)
			$this->response = array_combine(array_pad($this->response_fields, count($this->response), null), array_values($this->response));
		
		return true;
	}
	
	/**
	 * Get a parameter from the transaction response
	 * @access 	public
	 * @param 	$pos 	mixed 	index of the parameter
	 * @return 	mixed
	 */
	public function response ($pos = false)
	{
		if ($this->fail)
			return false;
		
		if ($pos !== false)
			return trim($this->response[$pos]);
		
		return $this->response;
	}
	
	/**
	 * Generate a string of parameters to send to Authorize.net
	 * @access 	private
	 * @return 	string
	 */
	public function params_str ()
	{
		$params = array();
		
		foreach ($this as $key => $val) {
			if (!(preg_match('/^x_/', $key)))
				continue;
			
			$params[] = $key . '=' . urlencode($val);
		}
		
		return implode('&', $params);
	}
	
	/**
	 * Set transaction parameters
	 * @access 	public
	 * @param 	array 	$params 		parameters for the transaction string
	 * @param 	bool 	$add_prefix 	whether to add the 'x_' prefix to parameter names
	 * @return 	void
	 */
	public function set_params ($params, $add_prefix = true)
	{
		foreach ($params as $field => $value) {
			if ($add_prefix)
				$field = 'x_' . $field;
			
			$this->$field = $value;
		}
	}
	
	/**
	 * Set the API login id and transaction key
	 * @access 	public
	 * @param 	string 	$login_id 	the API login key
	 * @param 	string 	$tran_key 	the API transaction_key
	 * @return 	void
	 */
	public function set_login ($login_id, $tran_key)
	{
		$this->x_login = urlencode($login_id);
		$this->x_tran_key = urlencode($tran_key);
	}
	
	/**
	 * Set the transaction type
	 * @access 	public
	 * @param 	string 	$type 	the type for the next transaction
	 * @return 	void
	 */
	public function set_type ($type)
	{
		$this->x_type = urlencode($type);
	}
	
	/**
	 * Set the API version being used
	 * @access 	public
	 * @param 	float 	$version 	the version number
	 * @return 	void
	 */
	public function set_version ($version)
	{
		$this->x_version = urlencode($version);
	}
	
	/**
	 * Set the delimiting character to use for the response string;
	 * @access 	public
	 * @param 	string 	$delimiter 		character used to delimit fields
	 * @param 	string 	$encapsulator 	character used to encapsulate fields
	 * @return 	void
	 */
	public function set_delimiter ($delimiter, $encapsulator = '')
	{
		$this->x_delim_data = 1;
		$this->x_delim_char = urlencode($delimiter);
		$this->x_encap_char = urlencode($encapsulator);
	}
	
	/**
	 * Toggle the parameter to indicate a test transaction
	 * @access 	public
	 * @param 	bool 	$testing 	whether to send a test transaction
	 * @return 	void
	 */
	public function set_test ($testing = true)
	{
		$this->x_test_request = ($testing) ? 1 : 0;
	}
}
