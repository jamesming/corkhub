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

<div   style='background:#F1F0C4'  >
	<div  class='container '    style='font-size:15px;padding-top:60px'  >
		
	<script src="https://www-sgw-opensocial.googleusercontent.com/gadgets/ifr?url=https%3A%2F%2Fstoregadgetwizard.appspot.com%2Fservlets%2FgadgetServlet%3Fkey%3D0Aklfz5z5VE02dEFBUll4SHc3WHk1TlZFN3pBLXVTWVE%26mid%3D230919259020477%26currency%3DUSD%26sandbox%3Dfalse%26gadget%3DLARGE&amp;container=storegadgetwizard&amp;w=800&amp;h=500&amp;title=&amp;brand=none&amp;output=js"></script>
			
	
	</div>	
	
</div>



<?php     

	$this->load->view('header/bottom_view.php');
	
?>
</body>
<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 