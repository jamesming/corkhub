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
						$('#buy').click(function(event) {
							document.location.href='<?php echo  base_url();   ?>index.php/buy/';
						});		
			});
			 
	</script>

</head>
<body>
<div  class='container'>
	
	<div  class='span-7 '     style='
	font-size:60px;
	color:darkorange;
	'       >Corkhub
	</div>
	

	
	
	<div  class='span-10 last '       style='
	font-size:16px;
	color:blue;
	vertical-align:bottom;
	height:60px;
	'       >
today's cork&nbsp;&nbsp;&nbsp;
blog&nbsp;&nbsp;&nbsp;
community&nbsp;&nbsp;&nbsp;
write us&nbsp;&nbsp;&nbsp;
about&nbsp;&nbsp;&nbsp;
	</div>	
	
	
	
	<div  class='span-7 '       style='
	font-size:16px;
	color:blue;
	vertical-align:bottom;
	height:60px;
	'       >
	
	
	
<?php if( $loggedin == TRUE ){?>

			Welcome <?php echo $users[0]->firstname . ' ' . $users[0]->lastname;    ?>&nbsp;&nbsp;&nbsp;
			
			
			<a href='<?php echo base_url();    ?>index.php/authenticate/signin'>
			logout</a>

<?php }else{?>

				<a href='<?php echo base_url();    ?>index.php/authenticate/signin'>
			login here</a> / or 
				
				
				<a href='<?php echo base_url();    ?>index.php/authenticate/register'>register</a>

<?php } ?>
	
	

	</div>
	
	
	
</div>

<hr   style='height:3px'  >

<div  class='container' >
	
	
<table>
	<tr>
		<td width='35%'>
			<img src='<?php  echo base_url() . '/uploads/' . $products[0]->vendor_id . '/' . $products[0]->id . '/image.png'  ?>'>
		</td>
		<td width='35%'>
			<p    style='font-size:50px;'  >
			<?php echo $products[0]->name;    ?>
			</p>
			<p   style='font-size:44px;'  >
			$<?php echo $products[0]->price;    ?> <span   style='font-size:14px;'  >plus   <?php  echo $products[0]->shipping_handling;   ?>&nbsp;shipping and handling.</span>
			</p>	
			<p   style='font-size:17px;'  >
			Ph level:<?php echo $products[0]->ph;    ?>/Alcohol: <?php echo $products[0]->acid;    ?>/Acid:<?php echo $products[0]->alcohol;    ?>
			</p>		
		</td>
		<td align='center' style='vertical-align:middle;font-size:44px;color:gray'  >
			
			

			<img id='buy'  class='cursor_pointer' src='<?php echo base_url();    ?>/images/buy_now.png'>
			
			

			
		</td>
	</tr>
</table>
	
	

</div>

<div class='container'   style='font-size:24px;color:gray'  >
	
	<?php echo $products[0]->description;    ?>
	
</div>

</body>
<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 