<?php
/**
 * This file is found in controller section of the codeigniter application directory
 *
 */


/**
 * Controller for default domain. 
 *
 * Viewable as:
 * {@link http://www.prospace.com}
 * {@link http://www.prospace.com/index.php/buy}
 * {@link http://www.prospace.com/index.php/buy/index}
 *
 * @autoloaded YES
 * @path /system/application/controllers/buy.php
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @copyright 2010 Prospace LLC
 * @version 1.0 Alpha
 * @todo subcribe to email, unscribe to email, facebook connect
 * 
 */
class Buy extends Controller {
	
	
	private $products;

	function Buy(){
		parent::Controller();

		$select_what =  'ph, acid, alcohol, vendor_id, name, id, description, attribute, price, discount, year, rating, shipping_handling, quantity';
		
		$where_array = array('show' => 1);
	
		$table  = 'products';
		
		$this->products = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array, $use_order = FALSE, $limit = 1 );

	}
	
  


/**
 * index page for buy controller
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/buy/index
 * @access public
 * @codeigniter_library form_validation
 **/ 

function index(){

	if( isset($this->session->userdata['user_id']) ){
		$loggedin = TRUE;
		
		$select_what =  'firstname, lastname';
		
		$where_array = array('id' => $this->session->userdata['user_id']);
	
		$table  = 'users';
		
		$users = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array, $use_order = FALSE, $limit = 1 );

		
	}else{
		$loggedin = FALSE;
		
		$users ='';
		
	};

	$data['controller'] = 'buy';

	$this->load->view('buy/index_view', $data);
 
}
	

/**
 * index page inside div that refreshes for testing purposes
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/index_inside
 * @access public
 * @codeigniter_library form_validation
 **/ 

function index_inside(){
	


}



/**
 * buy_form
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/buy_form
 * @access public
 * @codeigniter_library form_validation
 **/ 

function buy_form(){
	
	if( isset($this->session->userdata['user_id']) ){
		$loggedin = TRUE;
		
		
		$select_what =  'firstname, lastname';
		
		$where_array = array('id' => $this->session->userdata['user_id']);
	
		$table  = 'users';
		
		$users = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array, $use_order = FALSE, $limit = 1 );

		
	}else{
		$loggedin = FALSE;
		
		$users ='';
		
	};
	

	$data= array('products'  => $this->products, 'loggedin'  => $loggedin, 'users'  => $users);
	
	$this->load->view('buy/buy_form_view', $data);
}



/**
 * bought
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/bought
 * @access public
 * @codeigniter_library form_validation
 **/ 

function bought(){
	
	if( isset($this->session->userdata['user_id']) ){
		
		$loggedin = TRUE;
		
		$user_id = $this->session->userdata['user_id'];
		
		$select_what =  'firstname, lastname';
		
		$where_array = array('id' => $user_id);
	
		$table  = 'users';
		
		$users = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array, $use_order = FALSE, $limit = 1 );

		
	}else{
		$loggedin = FALSE;
		
		$insert_what = array(
										'email' => $email
		            );
		
		$last_inserted_id = $this->my_database_model->insert_table($table = 'users', $insert_what);

		
		$users ='';
		
	};
	
	
	
	
	

	$quantity = $this->input->post('quantity');
	
	$amount = ($quantity * $this->products[0]->price) + $this->products[0]->shipping_handling;
	
	$insert_what = array(
	'amount' => $amount,
	'user_id' => $user_id,
	'product_id' => $this->products[0]->id,
	'amount' => $amount,
	'quantity' => $quantity,
	);
	
	$primary_key = $this->my_database_model->insert_table(
									$table = 'users_vendors', 
									$insert_what
									);
									
	
	
	
	
	
	
	
	
	$data= array('amount'  => $amount, 'products'  => $this->products, 'loggedin'  => $loggedin, 'users'  => $users);
	
	$this->load->view('buy/bought_view', $data);
}

	
}

/* End of file buy.php */
/* Location: ./system/application/controllers/buy.php */