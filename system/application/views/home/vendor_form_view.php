<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<style>
	table.form_table {
	width:100%;
	}
	table.form_table_edit_album_info td{
	color:lightblack;
	font-size:27px;
	vertical-align:middle;
	padding:10px;
	}
	table.form_table_edit_album_info td:nth-child(odd){
	text-align:right;
	}
	table.form_table_edit_album_info input{
	width:460px;
	}
</style>	
	
	
	<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
	<?php  
			$this->load->view('header/header_css.php');
	?>
	<script type="text/javascript" language="Javascript">
	
			$(document).ready(function() { 
				
						$('#submit').click(function(event) {
							
							<?php
							if( count($vendors) > 0  ){  ?>
								
									$.post("<?php echo base_url() . 'index.php/home/vendor_edit/';    ?>",{
										name: $('#name').val()
									},function(data) {
											window.parent.$("#vendor_list").html(data); 
											window.parent.$('body').click();
									});							
								
							<?php    
							}else{  ?>
								
									$.post("<?php echo base_url() . 'index.php/home/vendor_insert/';    ?>",{
										name: $('#name').val()
									},function(data) {
											window.parent.$("#vendor_list").html(data); 
											window.parent.$('body').click();
									});							
								
							<?php    
							};
							?>					
							
							
							
							

							
							
							
							
							
							

						});		

			});
			 
	</script>

</head>

<body>
	
	<?php  
	
	
	
	
	

	
	
	?>
	

	<form name='form0'>
	
	<table class='form_table_edit_album_info'    >
		<tr>
			<td>Name
			</td>
			<td>
				<input class='input_field' name="name" id="name"  value='<?php
				
				
					if( count($vendors) > 0  ){
						echo $vendors[0]->name; 
					};
				 
				 
				?>'>
			</td>
		</tr>
		<tr>
			<td colspan=2   style='text-align:center'  >
						<div id='submit' class='button rounded_border cursor_pointer'  >
							submit
						</div>		
			</td>
		</tr>		
	</table>
	</form>
	
</body>
</html>