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
 * {@link http://www.prospace.com/index.php/home}
 * {@link http://www.prospace.com/index.php/home/index}
 *
 * @autoloaded YES
 * @path /system/application/controllers/home.php
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @copyright 2010 Prospace LLC
 * @version 1.0 Alpha
 * @todo subcribe to email, unscribe to email, facebook connect
 * 
 */
class Home extends Controller {

	function Home(){
		parent::Controller();

	}
	
  
/*
|--------------------------------------------------------------------------
|                       VIEW SECTION 
|--------------------------------------------------------------------------
*/


/**
 * index page for home controller
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/index
 * @access public
 * @codeigniter_library form_validation
 **/ 

function index(){

	$data['controller'] = 'home';
	$this->load->view('home/index_view', $data);
 
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
	
	$this->load->view('home/index_inside_view');

}


/**
 * vendors
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/vendors
 * @access public
 **/ 

function vendors(){
	
	
	$select_what =  'name';
	
	$where_array = array();

	$table  = 'vendors';
	
	$vendors = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

	$data= array('vendors'  => $vendors);	

	$this->load->view('home/vendors_view', $data);

}  


/**
 * vendor_form
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/vendor_form
 * @access public
 **/ 

function vendor_form(){
	

	$this->load->view('home/vendor_form_view');

}  

/**
 * vendor_insert
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/vendor_insert
 * @access public
 **/ 

function vendor_insert(){
	
	$insert_what = array(
	'name' => $this->input->post('name')
	);
	
	$primary_key = $this->my_database_model->insert_table(
									$table = 'vendors', 
									$insert_what
									);
	
	$select_what =  'name';
	
	$where_array = array();

	$table  = 'vendors';
	
	$vendors = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

	$data= array('vendors'  => $vendors);	

	$this->load->view('home/vendors_insert_view', $data);

}  

/**
 * users
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/users
 * @access public
 **/ 

function users(){
	
	$this->load->view('home/users_view');

}  
	
}

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */