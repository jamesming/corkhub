<head>
<?php     	$this->load->view('header/header_css.php');  ?>
</head>



<?php echo form_open( base_url() . 'index.php/authenticate/reset_code/' . $primary_key); ?>
<div   style='border:1px solid gray'  >
	<ul>
		<li>
			<label>Reset Code</label>
			<div>
				
				<input  <?php  
				
				if( form_error('reset_code') != ''  ){
					 echo "style='background:yellow'";
				};
				
				 ?>  type="text" name="reset_code" value="<?php echo set_value('reset_code'); ?>" size="50" />
			</div>
			<?php echo form_error('reset_code'); 
			
			if( $unsuccessful_message ){
				
				echo $unsuccessful_message . '<br>';

			}; 
			
			?>
		</li>
		

		
		<li>
			<div>
				<?php  echo form_submit(array('name'=>'register'), 'Submit');   ?>
			</div>
		</li>	
		
	</ul>
</div>

<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 