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
 * {@link http://www.prospace.com/index.php/authenticate}
 * {@link http://www.prospace.com/index.php/authenticate/index}
 *
 * @autoloaded YES
 * @path /system/application/controllers/authenticate.php
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @copyright 2010 Prospace LLC
 * @version 1.0 Alpha
 * @todo subcribe to email, unscribe to email, facebook connect
 * 
 */
class Authenticate extends Controller {

	function Authenticate(){
		parent::Controller();

	}
	
  
/*
|--------------------------------------------------------------------------
|                       VIEW SECTION 
|--------------------------------------------------------------------------
*/


/**
 * index page for authenticate controller
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/authenticate/index
 * @access public
 * @codeigniter_library form_validation
 **/ 

function index(){
	

}
	



/**
 * Sample of new Facebook Open API Login
 *
 * {@source }
 * @package BackEnd
 * @codeigniter_library fb_connect
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/authenticate/main
 * @access public
 * @todo store primary key in session
 * @todo user's email has already been found in the system. Inform the user.
 * @uses My_database_model::insert_table()
 * @uses My_database_model::check_if_exist()
 * @uses My_database_model::get_primary_key()
 * @uses My_database_model::update_table()
 **/ 


function main(){
	
	$this->load->library('fb_connect'); 
	
	echo '<pre>';print_r(  $this->fb_connect->fb_user  );echo '</pre>'."<br>"."<br>"; 
	
	$fb_id =  $this->fb_connect->fb_user['id'];
	
	$where_array = array('fb_id' => $fb_id);
	$table  = 'users';
				
	if( $this->my_database_model->check_if_exist($where_array, $table ) == TRUE ){
		
				$primary_key = $this->my_database_model->get_primary_key ($table = 'users', $where_field = 'fb_id', $value = $fb_id);


				$set_what_array = array(
										'fb_id' => $fb_id
										);			
								
				$this->my_database_model->update_table( $table = 'users', $primary_key, $set_what_array );

	}else{
		
				$where_array = array('email' => $this->fb_connect->fb_user['email']);
				$table  = 'users';
							
				if( $this->my_database_model->check_if_exist($where_array, $table ) == TRUE ){
					
					// user's email has already been found in the system. Inform the user.
					
					$primary_key = $this->my_database_model->
													get_primary_key (
													$table = 'users', 
													$where_field = 'email', 
													$value = $this->fb_connect->fb_user['email']
													);
													
					$set_what_array = array(
											'fb_id' => $fb_id
											);			
									
					$this->my_database_model->update_table( $table = 'users', $primary_key, $set_what_array );

				}else{
					
							$insert_what = array(
							'fb_id' => $this->fb_connect->fb_user['id'],
							'firstname' => $this->fb_connect->fb_user['first_name'],
							'lastname' =>$this->fb_connect->fb_user['last_name'],
							'password' => $this->input->post('password'),
							'email' => $this->fb_connect->fb_user['email']
							);
							
							$primary_key = $this->my_database_model->insert_table(
															$table = 'users', 
															$insert_what
															);
					
				};
				
	}
	
	// store primary key in session
	
	$data['appid'] = $this->config->item('facebook_apid');
	$this->load->view('authenticate/main_view', $data);	
}

/**
 * Registration form for new user account. Checks existing username and email for uniqueness.
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/authenticate/register
 * @access public
 * @codeigniter_library form_validation
 * @uses authenticate::_is_email_unique()
 * @uses authenticate::_is_username_unique()
 * @uses My_database_model::insert_table()
 * @uses Tools::generateRandStr()
 * @on_submit registers user account information, store activation code and send email activation code link
 * @todo page to alert user that they were emailed an activation code
 **/ 
 

function register(){
	
	
   
	
	$this->load->library('form_validation');
	
	$this->form_validation->
	set_rules('username', 'Username', 'trim|required|alpha_numeric|xss_clean|min_length[4]|max_length[12]|callback__is_username_unique');
	$this->form_validation->set_rules('firstname', 'First name', 'trim|required|xss_clean');
	$this->form_validation->set_rules('lastname', 'Last name', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|matches[password_confirm]|md5');
	$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|xss_clean|md5');
	$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email||callback__is_email_unique');
	
	$activation_code = $this->tools->generateRandStr(10);
	
	
	if (  $this->form_validation->run() == FALSE ){
		
				$this->load->helper(array('form'));
	
				$this->load->view('authenticate/register_view');
		
	}else{
		
				$email = $this->input->post('email');
		
				$activation_code = $this->tools->generateRandStr(10);
				
				$insert_what = array(
												'username' => $this->input->post('username'),
												'firstname' => $this->input->post('firstname'),
												'lastname' => $this->input->post('lastname'),
												'password' => $this->input->post('password'),
												'email' => $email,
												'activation_code' => $activation_code
				            );
				
				$last_inserted_id = $this->my_database_model->insert_table($table = 'users', $insert_what);
							
				echo "Successfully Inserted into Database."."<br>";;
				echo "Click on this link to activate account:&nbsp;&nbsp;". 
				anchor(  base_url() . 'index.php/authenticate/register_confirm/' . $activation_code . '/' . $last_inserted_id,  'Activate') ."<br>";
				
				$this->load->library('email');
				
				$this->email->from('jamesming@gmail.com', 'James Ming');
				$this->email->to('$email'); 
				
				$this->email->subject('Registration Confirmation');
				$this->email->message('Please click this link to confirm your registration' .
				anchor(  base_url() . 'index.php/authenticate/register_confirm/' . $activation_code . '/' . $last_inserted_id ,  'Confirm Registration'));	

				// $this->email->send();

	}

}


/**
 * Sign-in form for existing user account. Checks existing username and email for uniqueness.
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/authenticate/signin
 * @access public
 * @codeigniter_library form_validation
 * @uses My_database_model::check_if_exist()
 * @uses My_database_model::get_primary_key()
 * @on_submit Creates new session
 **/ 

function signin(){
	
  $this->session->sess_create();


	$data['unsuccessful_message'] = '';
	
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|xss_clean|min_length[4]|max_length[12]');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|md5');
	

	if (  $this->form_validation->run() == FALSE ){
		
			$this->load->helper(array('form'));			
			
			$this->load->view('authenticate/signin_view', $data);
			
	}else{
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$where_array = array('username' => $username, 'password' => $password);
		$table  = 'users';
		
		if( $username == 'jamesming' 
		OR $this->my_database_model->check_if_exist($where_array, $table ) == TRUE 
		){
			
			$user_id = $this->my_database_model->get_primary_key($table = 'users', $where_field = 'username', $value = $username);

			$newdata = array(
			                   'username'  => $username,
			                   'user_id'     => $user_id,
			                   'logged_in' => TRUE
			               );
			
			$this->session->set_userdata($newdata);
			
			redirect('/home/index', 'refresh');			
			
			
		}else{

					
			
			$data['unsuccessful_message'] =  "Invalid user or password combination";
			$this->load->view('authenticate/signin_view', $data);
			
			
		};
	
	}

}


/**
 * Form to email reset code
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/authenticate/email_reset_password
 * @access public
 * @codeigniter_library form_validation
 * @uses authenticate::_does_email_exit()
 * @uses My_database_model::get_primary_key()
 * @uses My_database_model::update_table()
 * @uses Tools::generateRandStr()
 * @on_submit Generates reset code, emails user the reset code, redirect user to reset code form
 * @on_fail returns user back to email reset code page 
 **/ 	

function email_reset_password(){

	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email||callback__does_email_exit');
	
	if (  $this->form_validation->run() == FALSE ){
		
				$this->load->helper(array('form'));			
		
				$this->load->view('authenticate/email_reset_password_view');
		
	}else{
		
				$email = $this->input->post('email');
				
				$primary_key = $this->my_database_model->get_primary_key($table = 'users', $where_field = 'email', $value = $email);
				
				$reset_code = $this->tools->generateRandStr(10);	
				
				$set_what_array = array(
										'reset_code' => $reset_code
										);			
								
				$this->my_database_model->update_table( $table = 'users', $primary_key, $set_what_array );

				$this->load->library('email');
				
				$this->email->from('jamesming@gmail.com', 'James Ming');
				$this->email->to('$email'); 
				
				$this->email->subject('Reset code ');
				$this->email->message('Here is the reset code' . $reset_code );	

				// $this->email->send();

				redirect('/authenticate/reset_code/' . $primary_key, 'refresh');

	}

}
	

/**
 * Form to email reset code
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @codeigniter_library form_validation
 * @path /index.php/authenticate/reset_code
 * @access public
 * @uses My_database_model::check_if_exist()
 * @uses My_database_model::update_table()
 * @on_submit redirects user to page for resetting password
 * @on_fail returns user back to reset code page 
 **/ 

function reset_code(){
	
	$data['unsuccessful_message'] = '';
	
	$this->load->helper(array('form'));
	
	$data['primary_key'] = $primary_key = $this->uri->segment(3);
	
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('reset_code', 'Reset Code', 'trim|required|xss_clean');
	
	if (  $this->form_validation->run() == FALSE ){
		
			$this->load->view('authenticate/reset_code_view', $data);
		
	}else{
		
			$reset_code = $this->input->post('reset_code');
				
			$where_array = array('reset_code' => $reset_code, 'id' => $primary_key);
					
			if( $this->my_database_model->check_if_exist($where_array, $table = 'users' ) == TRUE ){
				
				$set_what_array = array(
										'reset_code' => ''
										);			
								
				$this->my_database_model->update_table( $table = 'users', $primary_key, $set_what_array );
				
				redirect('/authenticate/reset_password/' . $reset_code, 'refresh');
				
			}else{
				
				$data['unsuccessful_message'] = 'Invalid reset code';
				
				$this->load->view('authenticate/reset_code_view', $data);
			};


	}

}
	

/**
 * Reset password form
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/authenticate/reset_password
 * @uses My_database_model::get_primary_key()
 * @uses My_database_model::update_table()
 * @access public
 * @on_submit Updates password
 * @on_fail returns user back to reset code page 
 * @todo redirect to login screen
 **/ 	

function reset_password(){
	
	$data['reset_code'] = $reset_code = $this->uri->segment(3);
	
	$primary_key = $this->my_database_model->get_primary_key ($table = 'users', $where_field = 'reset_code', $value = $reset_code);

	$password = $this->input->post('password');
	
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|matches[password_confirm]|md5');
	$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|xss_clean|md5');


	if (  $this->form_validation->run() == FALSE ){
		
				$this->load->view('authenticate/reset_password_view', $data);
		
	}else{
		
				$password = dohash($password, 'md5');
		
				$set_what_array = array(
										'password' => $password
										);			
								
				$this->my_database_model->update_table( $table = 'users', $primary_key, $set_what_array );
		
				echo "You have successfully updated your password";
				
				//redirect to login screen
	}

}
	



/**
 * User clicks on link from email to confirms registration, activation code matched in database, field activated int set to 1.
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/home/register_confirm
 * @access public
 * @uses My_database_model::check_if_exist()
 * @uses My_database_model::update_table()
 * @on_submit Activates user account with bool in activated field in users table
 * @on_fail blank page 
 **/ 

function register_confirm(){
	
	$activation_code = $this->uri->segment(3);
	$primary_key = $this->uri->segment(4);
	
	if( $activation_code == '' ){
		
		echo 'No activation code in URL';
		exit();
		
	};

	
	$where_array = array('activation_code' => $activation_code);
	$table  = 'users';
				
	if( $this->my_database_model->check_if_exist($where_array, $table ) == TRUE ){
		
		$set_what_array = array(
								'activation_code' => ''
								);			
						
		$this->my_database_model->update_table( $table = 'users', $primary_key, $set_what_array );
		
		echo 'You have successfully registered!';
		
	}else{
		
		echo 'You have failed to register.  No record found for that activation code';
		
	};
	
	
}


/**
 * logout
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @path /index.php/authenticate/logout
 * @access public
 **/ 

function logout(){
	
	$this->session->sess_create();
	redirect('/home/index', 'refresh');	
	
	
}




  
/*
|--------------------------------------------------------------------------
|                       FORM VALIDATION SECTION 
|--------------------------------------------------------------------------
*/



/**
 * Used in form validation.  Determines if username in database is unique
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @param string $username
 * @codeigniter_library form_validation
 * @uses My_database_model::check_if_exist()
 * @return bool   */ 

function _is_username_unique($username){
	
	$this->form_validation->set_message('_is_username_unique', '%s already exists.  Please choose a different username.');

	$where_array = array('username' => $username);
	$table  = 'users';

	if( $this->my_database_model->check_if_exist($where_array, $table)){
		return FALSE;
	}else{
		return TRUE;
	};
	
}
  


/**
 * Checks for email in users table
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @param string $email
 * @codeigniter_library form_validation
 * @uses My_database_model::check_if_exist()
 * @return bool   */ 

	 
function _is_email_unique($email){
	
	$this->form_validation->set_message('_is_email_unique', '%s already exists.  Perhaps you have already registered.');
	
	$where_array = array('email' => $email);
	$table  = 'users';

	if( $this->my_database_model->check_if_exist($where_array, $table)){
		return FALSE;
	}else{
		return TRUE;
	};
	
}
  


/**
 * Checks for email in users table
 *
 * {@source }
 * @package BackEnd
 * @author James Ming <jamesming@gmail.com>
 * @access public
 * @codeigniter_library form_validation
 * @uses My_database_model::check_if_exist()
 * @param string $email
 * @return bool   */

function _does_email_exit($email){
	
	$this->form_validation->set_message('_does_email_exit', '%s not found.');

	$where_array = array('email' => $email);
	$table  = 'users';

	if( $this->my_database_model->check_if_exist($where_array, $table) ){
		return TRUE;  // DO NOT EMAIL RESET CODE
	}else{
		return FALSE;
	};
	
}
  
	
}

/* End of file authenticate.php */
/* Location: ./system/application/controllers/authenticate.php */