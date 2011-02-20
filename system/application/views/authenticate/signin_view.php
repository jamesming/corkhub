<head>
<?php     	$this->load->view('header/header_css.php');  ?>
</head>



<?php echo form_open(  base_url() . 'index.php/authenticate/signin'); ?>
<div   style='border:1px solid gray'  >
	<ul>
		<li>
			<label>Username</label>
			<div>
				
				<input  <?php  
				
				if( form_error('username') != '' OR  $unsuccessful_message  ){
					 echo "style='background:yellow'";
				};
				
				 ?>  type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
			</div>
			<?php echo form_error('username'); ?>
		</li>
		

		<li>
			<label>Password</label>
			<div>
				
				<input   <?php  
				
				if( form_error('password') != '' OR  $unsuccessful_message  ){
					 echo "style='background:yellow'";
				};
				
				 ?>  type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />
				 
				 &nbsp;(<?php  echo anchor( base_url() . 'index.php/authenticate/email_reset_password' , 'Forgot?', array('title' => 'Forgot password'));   ?>)
			</div>
			
			
			<?php echo form_error('password'); 
			
			if( $unsuccessful_message ){
				
				echo $unsuccessful_message . '<br>';

			};
			
			?>
			
			
		</li>
		
		<li>
			<div>
				<?php  echo form_submit(array('name'=>'register'), 'Sign In');   ?>
			</div>
		</li>	
		
	</ul>
</div>

<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 