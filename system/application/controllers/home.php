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
	
	
	$select_what =  'name, id';
	
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
	
	$vendor_id = $this->uri->segment(3);
	
	$select_what =  'name, id';
	
	$where_array = array('id' =>  $vendor_id );

	$table  = 'vendors';
	
	$vendors = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

	$data= array('vendors'  => $vendors);	
	
	$this->load->view('home/vendor_form_view', $data);

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
									
									
	
	$select_what =  'name, id';
	
	$where_array = array();

	$table  = 'vendors';
	
	$vendors = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

	$data= array('vendors'  => $vendors);	

	$this->load->view('home/vendors_list_view', $data);

}  


/**
 * vendor_edit
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/vendor_edit
 * @access public
 **/ 

function vendor_edit(){
	
	$vendor_id = $this->input->post('vendor_id');

	$set_what_array = array(
							'name' => $this->input->post('name')
							);			
					
	$this->my_database_model->update_table( $table = 'vendors', $primary_key = $vendor_id, $set_what_array );						
									
	
	$select_what =  'name, id';
	
	$where_array = array();

	$table  = 'vendors';
	
	$vendors = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

	$data= array('vendors'  => $vendors);	

	$this->load->view('home/vendors_list_view', $data);

}  


/**
 * vendor_delete
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/vendor_delete
 * @access public
 **/ 

function vendor_delete(){

 	$vendor_id = $this->input->post('vendor_id');
 	
	$where_array = array('id' => $vendor_id );
	
	$table  = 'vendors';
				
	$this->my_database_model->delete_from_table( $table, $where_array);
	

 	
	$select_what =  'name, id';
	
	$where_array = array();

	$table  = 'vendors';
	
	$vendors = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

	$data= array('vendors'  => $vendors);	

	$this->load->view('home/vendors_list_view', $data);

}  





/**
 * products
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/products
 * @access public
 **/ 

function products(){
	
	
	$select_what =  'name, id, vendor_id';
	
	$where_array = array('vendor_id' => $this->uri->segment(3));

	$table  = 'products';
	
	$products = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

	$data= array('products'  => $products, 'vendor_id' => $this->uri->segment(3));	

	$this->load->view('home/products_view', $data);

}  


/**
 * product_form
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/product_form
 * @access public
 **/ 

function product_form(){
	
	$vendor_id = $this->uri->segment(3);
	
	$product_id = $this->uri->segment(4);
	
	$select_what =  'name, id';
	
	$where_array = array('id' =>  $product_id );

	$table  = 'products';
	
	$products = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

	$data= array('products'  => $products, 'vendor_id'  => $vendor_id);	
	
	$this->load->view('home/product_form_view', $data);

}  


/**
 * product_insert
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/product_insert
 * @access public
 **/ 

function product_insert(){
	
	$insert_what = array(
	'name' => $this->input->post('name'),
	'vendor_id'  => $this->input->post('vendor_id')
	);
	
	$primary_key = $this->my_database_model->insert_table(
									$table = 'products', 
									$insert_what
									);
									
									
	
	$select_what =  'name, id, vendor_id';
	
	$where_array = array('vendor_id' => $this->input->post('vendor_id'));

	$table  = 'products';
	
	$products = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

	$data= array('products'  => $products);	

	$this->load->view('home/products_list_view', $data);

}  



/**
 * product_edit
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/product_edit
 * @access public
 **/ 

function product_edit(){
	
	$product_id = $this->input->post('product_id');
	
	$vendor_id = $this->input->post('vendor_id');

	$set_what_array = array(
							'name' => $this->input->post('name')
							);			
					
	$this->my_database_model->update_table( $table = 'products', $primary_key = $product_id, $set_what_array );						
									
	
	$select_what =  'name, id, vendor_id';
	
	$where_array = array('vendor_id' => $vendor_id);

	$table  = 'products';
	
	$products = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

	$data= array('products'  => $products);	

	$this->load->view('home/products_list_view', $data);

}  




/**
 * product_delete
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/product_delete
 * @access public
 **/ 

function product_delete(){
	
	$vendor_id = $this->input->post('vendor_id');

 	$product_id = $this->input->post('product_id');
 	
	$where_array = array('id' => $product_id );
	
	$table  = 'products';
				
	$this->my_database_model->delete_from_table( $table, $where_array);
	

 	
	$select_what =  'name, id, vendor_id';
	
	$where_array = array( 'vendor_id' => $vendor_id );

	$table  = 'products';
	
	$products = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

	$data= array('products'  => $products);	

	$this->load->view('home/products_list_view', $data);

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