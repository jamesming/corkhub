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

	function Buy(){
		parent::Controller();

	}
	
  
/*
|--------------------------------------------------------------------------
|                       VIEW SECTION 
|--------------------------------------------------------------------------
*/


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
	
	$this->load->view('buy/index_inside_view');

}



/**
 * vendor_form
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/buy/vendor_form
 * @access public
 **/ 

function vendor_form(){
	
	$vendor_id = $this->uri->segment(3);
	
	$select_what =  'name, id';
	
	$where_array = array('id' =>  $vendor_id );

	$table  = 'vendors';
	
	$vendors = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

	$data= array('vendors'  => $vendors);	
	
	$this->load->view('buy/vendor_form_view', $data);

}  




	
}

/* End of file buy.php */
/* Location: ./system/application/controllers/buy.php */