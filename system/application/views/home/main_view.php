<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
	<?php  
			$this->load->view('header/header_css.php');
	//	$this->load->view('header/header_facebook.php'); 
	?>
	<script type="text/javascript" language="Javascript">
	
			$(document).ready(function() { 
				
						$('#vendors').click(function(event) {
							document.location.href='<?php echo  base_url();   ?>index.php/home/vendors';
						});		

						$('#users').click(function(event) {
							document.location.href='<?php echo  base_url();   ?>index.php/home/users';
						});	

			});
			 
	</script>

</head>

<body>


	
	
	<div class='container'     >
				
				
					
						<div id='vendors' class='button rounded_border cursor_pointer'  >
						vendors
						</div>			
						
						<div id='users' class='button rounded_border cursor_pointer'    >
						users
						</div>									
					
				
	</div>


</body>
</html>