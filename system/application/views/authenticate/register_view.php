<head>
<?php     	$this->load->view('header/header_css.php');  ?>
</head>



<?php echo form_open(  base_url() . 'index.php/authenticate/register'); ?>
<div   style='border:1px solid gray'  >
	<ul>
		<li>
			<label>Username</label>
			<div>
				
				<input  <?php  
				
				if( form_error('username') != ''){
					 echo "style='background:yellow'";
				};
				
				 ?>  type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
			</div>
			<?php echo form_error('username'); ?>
		</li>
		
		<li>
			<label>First Name</label>
			<div>
				
				<input   <?php  
				
				if( form_error('firstname') != ''){
					 echo "style='background:yellow'";
				};
				
				 ?>  type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" size="50" />
			</div>
			<?php echo form_error('firstname'); ?>
		</li>
		
		<li>
			<label>Last Name</label>
			<div>
				
				<input   <?php  
				
				if( form_error('lastname') != ''){
					 echo "style='background:yellow'";
				};
				
				 ?>  type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" size="50" />
			</div>
			<?php echo form_error('lastname'); ?>
		</li>
		
		<li>
			<label>Email</label>
			<div>
				
				<input   <?php  
				
				if( form_error('email') != ''){
					 echo "style='background:yellow'";
				};
				
				 ?>  type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />
			</div>
			<?php echo form_error('email'); ?>
		</li>
	
		<li>
			<label>Password</label>
			<div>
				
				<input   <?php  
				
				if( form_error('password') != ''){
					 echo "style='background:yellow'";
				};
				
				 ?>  type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />
			</div>
			<?php echo form_error('password'); ?>
		</li>
		
		<li>
			<label>Confirm Password</label>
			<div>
				
				<input   <?php  
				
				if( form_error('password_confirm') != ''){
					 echo "style='background:yellow'";
				};
				
				 ?>  type="password" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>" size="50" />
			</div>
			<?php echo form_error('password_confirm'); ?>
		</li>
		
		
		<li>
			<div>
				<?php  echo form_submit(array('name'=>'register'), 'Register');   ?> &nbsp;&nbsp;or  <?php  echo anchor( base_url() . 'index.php/authenticate/signin' , 'Sign in', array('title' => 'Sign in'));   ?>
			</div>
		</li>	
		
	</ul>
</div>

<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 