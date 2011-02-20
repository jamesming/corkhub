<head>
<?php     	$this->load->view('header/header_css.php');  ?>
</head>



<?php echo form_open(  base_url() . 'index.php/authenticate/email_reset_password'); ?>
<div   style='border:1px solid gray'  >
	<ul>
		<li>
			<label>Email</label>
			<div>
				
				<input  <?php  
				
				if( form_error('email') != ''  ){
					 echo "style='background:yellow'";
				};
				
				 ?>  type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />
			</div>
			<?php echo form_error('email'); ?>
		</li>
		

		<li>
			<div>
				<?php  echo form_submit(array('name'=>'register'), 'Send');   ?>
			</div>
		</li>	
		
	</ul>
</div>

<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 