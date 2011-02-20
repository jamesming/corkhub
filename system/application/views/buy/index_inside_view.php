<head>
<?php     	$this->load->view('header/header_css.php');  ?>
</head>

<div  class='container '    style='font-size:25px'  >
	
	So how many do you want?  
	
	<select id='quantity' name='quantity' class=' input_field'   >
		<option value='1'>1</option>	
		<option value='2'>2</option>	
		<option value='3'>3</option>	
		<option value='4'>4</option>	
		<option value='5'>5</option>	
		<option value='6'>6</option>	
	</select>
</div>

<div  class='container '    style='font-size:15px'  >
	
	<div  class='span-12 ' >
		
		<table  >
			<tr >
				<td colspan=2   style='text-align:center'  ><?php  echo $products[0]->name;     ?>
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
					<span id='subtotal' ></span>
				</td>
			</tr>
			<tr>
				<td>Shipping and Handling
				</td>
				<td><?php  echo $products[0]->shipping_handling;     ?>
				</td>
			</tr>
			<tr>
				<td>Your Total is
				</td>
				<td>
				</td>
			</tr>
		</table>		
		
	</div>
	
	<div  class='span-12 last ' >
		
	<table  >
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
						<select id='quantity' name='quantity' class=' input_field'   >
										<option value='2010'>2010</option>	
										<option value='2011'>2011</option>	
										<option value='2012'>2012</option>	
									</select> 
					
				</td>
			</tr>		
			
			<tr>
				<td colspan=2>
						<div id='submit' class='button rounded_border cursor_pointer'  >
							I want to get this
						</div>	
					
				</td>
			</tr>					
			
			
		</table>	
		
	</div>
		
		
</div>

<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 