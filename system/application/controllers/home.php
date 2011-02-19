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
	
					$select_what =  'name';
					
					$where_array = array('id' => '1' );
				
					$table  = 'vendors';
					
					$vendors = (array) $this->my_database_model->select_from_table( $table, $select_what, $where_array );

					echo '<pre>';print_r(  $vendors   );echo '</pre>';  exit;
 
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

  
	
}

/* End of file home.php */
/* Location: ./system/application/controllers/home.php */