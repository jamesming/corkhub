<?php

/**
 * Access for Users Table
 * @autoloaded YES
 * @path /system/application/models/users_model.php
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @copyright 2010 Prospace LLC
 * @version 1.0
 * @todo method to delete a record
 * 
 */
 
class My_database_model extends Model {
	

function My_database_model(){
	
    // Call the Model constructor
    parent::Model();
    
    
    
    
    
    
/*        
		$newdata = array(
		                   'username'  => 'johndoe',
		                   'email'     => 'johndoe@some-site.com',
		                   'logged_in' => TRUE
		               );
		
		$this->session->set_userdata($newdata);
		
		
		//$this->session->sess_destroy();
    
		//echo '<pre>';print_r(  $this->session  );echo '</pre>';  exit; 
		
		echo $this->session->userdata('username')."<br>";;
		*/


	 // echo $this->db->last_query()."<br>";;

      
	// echo '<pre>';print_r(  $set_what_array   );echo '</pre>';  exit;
	            
	// $this->update_table( $table, $primary_key, $set_what_array );
		
}




/**
 * Create table
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @codeigniter_library database
 * @param string $table
 * @param string $primary_key
 * @param array $fields_array
 * @return bool */
 
function create_table_with_fields($table, $primary_key, $fields_array){

	$this->load->dbforge();
	$this->dbforge->add_field($fields_array);
	$this->dbforge->add_key($primary_key, TRUE);
	
	/**
	 * Returns TRUE/FALSE based on success or failure:
	 */
	return $this->dbforge->create_table($table, TRUE); // Only CREATE TABLE IF NOT EXISTS 
}



/**
 * Add column to table
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @codeigniter_library database
 * @param string $table
 * @param array $fields_array
 * @return bool */
 
function add_column_to_table_if_exist($table, $fields_array){

	$this->load->dbforge();
	
	foreach(  $fields_array as $field => $value){
		
		if( $this->db->field_exists($field, $table ) == FALSE){
			
			$this->dbforge->add_column($table, array($field => $value) );
			
		};
		
		
	}

}



/**
 * Insert into table
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @codeigniter_library database
 * @param string $table
 * @param array $insert_what
 * @return int last inserted id */
 
function insert_table($table, $insert_what){

	$insert_what['created'] = date('Y-m-d H:i:s'); 
	
	$this->db->insert($table, $insert_what);
	
	return $this->db->insert_id();
}

/**
 * Delete from table
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @codeigniter_library database
 * @param string $table
 * @param array $where_array
 **/
 
function delete_from_table($table, $where_array){
	
	$this->db->delete($table, $where_array); 
	
}


/**
 * Update table
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @codeigniter_library database
 * @param string $table
 * @param string $primary_key
 * @param array $set_what_array
 **/

function update_table( $table, $primary_key, $set_what_array ){
	
	$this->db->where('id', $primary_key);
	
	$set_what_array['updated'] = date('Y-m-d H:i:s'); 
	
	$this->db->update($table, $set_what_array); 
	
}



/**
 * Select from table
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @codeigniter_library database
 * @uses Unit_test::test_my_database_model_select_from_table()
 * @param string $table
 * @param string $select_what
 * @param array $where_array ({field} => {value})
 * @return array */

function select_from_table( $table, $select_what, $where_array, $use_order = FALSE, $limit = -1){
	
	$this->db->select($select_what);
	
	foreach( $where_array as $field => $value ){
		$this->db->where($field, $value);
	}
	
	if( $use_order == TRUE){
		
		$this->db->order_by("order");
		$this->db->order_by('created desc');
		
	}else{
		
		$this->db->order_by('created desc');
		
	};
	
	if( $limit == -1 ){
		
	}else{
		$this->db->limit($limit);
	};
	
	
	
	$query = $this->db->get($table); 
	
	return $query->result(); 
	
}


/**
 * Counts records
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @codeigniter_library database
 * @param array $where_array ({field} => {value})
 * @param string $table
 * @return  int */	

function count_records( $table,  $where_array ){
	
	$this->db->select('id');
	$this->db->from($table);
	foreach( $where_array as $field => $value ){
		$this->db->where($field, $value);
	}
		
	$query = $this->db->get();
	
	return $query->num_rows();
}



/**
 * Validates if record exist
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @uses Unit_test::test_my_database_model_check_if_exist()
 * @access public
 * @codeigniter_library database
 * @param array $where_array ({field} => {value})
 * @param string $table
 * @return  bool */	

function check_if_exist($where_array, $table ){
	
	$this->db->select('id');
	$this->db->from($table);
	foreach( $where_array as $field => $value ){
		$this->db->where($field, $value);
	}
		
	$query = $this->db->get();
	
	if( $query->num_rows() ){
		return TRUE;
	}else{
		return FALSE;
	};
}


/**
 * Retrieve primary key
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @codeigniter_library database
 * @param string $where_field
 * @param string $value
 * @param string $table
 * @return  bool */

function get_primary_key ($table, $where_field, $value){
	
	$this->db->select('id');
	$this->db->from($table);
	$this->db->where($where_field, $value);
	
	$query = $this->db->get();
	
	if( $query->num_rows() ){
		return $query->row(0)->id;
	}else{
		return FALSE;
	};

}

		 
/*
|--------------------------------------------------------------------------
| get_last_ten_entries()
|--------------------------------------------------------------------------
|
|	Called from: 
|	Purpose:  
|	@access	public
|	@param	string
|	@return object
|	Result:  
*/

function get_last_ten_entries(){
	
    $query = $this->db->get('users', 100 );
    return $query->result();        

}
        
    
}

/* End of file users_model.php */ 
/* Location: ./system/application/model/users_model.php */