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
				
						$('#submit').click(function(event) {
							$('#form0').submit();
						});		
						
						$('#quantity').change(function() {
							
							$('#subtotal').text(  $(this).attr('value') * <?php  echo $products[0]->price;     ?> );
							
							$('#total').text(  $(this).attr('value') * <?php  echo $products[0]->price;     ?> + <?php  echo $products[0]->shipping_handling;     ?>);

						});
			});
			 
	</script>

</head>
<body>
<form name='form0' id='form0' action='<?php echo base_url()    ?>index.php?/buy/bought' method='post'>
<?php     

	$this->load->view('header/top_view.php');
	
?>


<div  class='container '    style='font-size:15px'  >
	
	<div  class='span-10 ' >
		
		
			How many do you want?  
	
	<select id='quantity' name='quantity' class=' input_field'   >
		<option value='1'>1</option>	
		<option value='2'>2</option>	
		<option value='3'>3</option>	
		<option value='4'>4</option>	
		<option value='5'>5</option>	
		<option value='6'>6</option>	
	</select>
<form>
	<style>	
	table#money_table td:nth-child(even){
	text-align:right;
	}
	</style>
		
		<table id='money_table'    style='width:320px;'    >
			<tr >
				<td colspan=2   style='text-align:center;font-size:25px'  ><?php  echo $products[0]->name;     ?>
				</td>
			</tr>
			<tr>
				<td>Each Cost
				</td>
				<td>
					<?php  echo $products[0]->price;     ?>
				</td>
			</tr>
			<tr>
				<td>Your subtotal is:
				</td>
				<td>
					<span id='subtotal' ><?php  echo $products[0]->price; ?></span>
				</td>
			</tr>
			<tr >
				<td style='border-bottom:1px solid gray' >Shipping and Handling
				</td>
				<td  style='border-bottom:1px solid gray'   ><?php  echo $products[0]->shipping_handling;     ?>
				</td>
			</tr>
			<tr>
				<td>Your Total is
				</td>
				<td>$<span id='total' ><?php  echo $products[0]->price + $products[0]->shipping_handling;     ?></span>
				</td>
			</tr>
		</table>		
		
	</div>
	
	<div  class='span-14 last '     >
		
	<table      >
			<tr>
				<td>How are you Paying?
				</td>
				<td>
						<input id="payment_type" type="radio" name="payment_type" value="CreditCard" />
						<img src='<?php  echo base_url();   ?>images/creditcards_logo.gif'>
				</td>
			</tr>
			<tr>
				<td>&nbsp;
				</td>
				<td>
					<input id="payment_type" type="radio" name="payment_type" value="Paypal" />
					<img src='<?php  echo base_url();   ?>images/paypal_logo.gif'>
				</td>
			</tr>
			
			
			<tr>
				<td>Full Name
				</td>
				<td>
						<input  class='input_field '  name="fullname" id="fullname" type="" value="">
				</td>
			</tr>
			<tr>
				<td>Address
				</td>
				<td>
						<input  class='input_field '  name="address" id="address" type="" value="">
				</td>
			</tr>	
			
			
			<tr>
				<td>
					City <input  class='input_field '  name="city" id="city" type="" value=""   style='width:100px'  >
				</td>
				<td>
						State	<select id='state' name='state' class=' input_field'   >
										<option value='CA'>CA</option>	
										<option value='OH'>OH</option>	
										<option value='NY'>NY</option>	
									</select> 
									
						Zip <input  class='input_field '  name="zip" id="zip" type="" value=""   style='width:70px'  >
									
				</td>
			</tr>		
			
			<tr>
				<td>
					Credit Card 
				</td>
				<td>
<input  class='input_field '  name="cc" id="cc" type="" value=""   style='width:200px'  >
					
				</td>
			</tr>				
					
			<tr>
				<td>
					Expires 
				</td>
				<td>
						<select id='year' name='year' class=' input_field'   >
										<option value='2010'>2010</option>	
										<option value='2011'>2011</option>	
										<option value='2012'>2012</option>	
									</select> 
					
				</td>
			</tr>		
			
			<tr>
				<td colspan=2   style='padding-top:20px'  >
						<div id='submit' class='button rounded_border cursor_pointer'  >
							I want to get this NOW!
						</div>	
					
				</td>
			</tr>					
			
			
		</table>	
		
	</div>
		

</div>
</body>
<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 