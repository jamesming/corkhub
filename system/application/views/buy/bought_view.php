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
				

			});
			 
	</script>

</head>
<body>
<form name='form0' id='form0' action='<?php echo base_url()    ?>index.php?/buy/bought' method='post'>
<?php     

	$this->load->view('header/top_view.php');
	
?>


<div  class='container '    style='font-size:15px'  >
	
	You just bought it.  Your were charged $<?php echo $charged;    ?> on your credit card. Don't drink and drive.
		

</div>
</body>
<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 