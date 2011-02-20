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
							document.location.href='<?php echo  base_url();   ?>index.php/buy/buy_form/';
						});		
			});
			 
	</script>

</head>
<body>

<?php     

	$this->load->view('header/top_view.php');
	
?>

<style>
.side_header{
vertical-align:middle;
background:darkbrown;
font-weight:bold;
font-size:20px;	
vertical-align:center;
padding-left:12px;
}
.side_text{
padding:5px 0px 20px 0px;
font-size:17px;	
color:darygray
}
</style>

<div   style='background:#F1F0C4'  >

			<div  class='container' >
				
				<div  class='span-7 ' >
					
					<table>
						<tr>
							<td><img  class='cursor_pointer' src='<?php echo base_url();    ?>/images/Number1-Icon.png'>
							</td>
							<td   class=' side_header'>What is CorkHub?
							</td>
						</tr>
						<tr>
							<td  class='side_text ' colspan=2>
								The CorkHub is the online wine store
											
											with the best wine deals from the best
											
											wineries. We sell on their behalf at the
											
											best price available and they ship it to
											
											you. 
							</td>
						</tr>
						
					
					
						<tr>
							<td><img   class='cursor_pointer' src='<?php echo base_url();    ?>/images/Number2-Icon.png'>
							</td>
							<td    class=' side_header' >Why the discount? 
							</td>
						</tr>
						<tr>
							<td   class='side_text ' colspan=2>
					Wineries need to open space for the
								
								next vintage, and we help them out. 
							</td>
						</tr>
						
						
						<tr>
							<td><img  class='cursor_pointer' src='<?php echo base_url();    ?>/images/Number3-Icon.png'>
							</td>
							<td    class=' side_header' >Why can’t I see the label now?
							</td>
						</tr>
						<tr>
							<td   class='side_text ' colspan=2>
					We protect our partner’s brand value
								
								and we want you to focus on what’s
								
								important.
							</td>
						</tr>
					
					
					
					
					
					
					
					
						
					</table>
					
					
					
					
					
					
					
				</div>
				
				<div class='span-16 last'   style='padding-left:40px'   >
						<table>
							<tr>
								<td width='35%'>
									<img src='<?php echo base_url();    ?>/images/Bottle-Final.png'>
								</td>
								<td width='65%'>
									
									
									
<table    >
	<tr>
		<td style='font-size:59px;color:#9FB200;line-height: 1.2;' >
									  Today's<br>
									  Selection:
		</td>
	</tr>
	<tr>
		<td  style='font-size:17px;padding-top:8px;' >

									<b>ABOUT THIS WINE</b>
			
		</td>
	</tr>
	<tr>
		<td  style='font-size:17px;'  >

									<?php echo $products[0]->description;    ?>

			
		</td>
	</tr>
	
	
	
	<tr>
		<td    style='font-size:11px;' >
			
Ph level:<?php echo $products[0]->ph;    ?>/Alcohol: <?php echo $products[0]->acid;    ?>/Acid:<?php echo $products[0]->alcohol;    ?>

		</td>
	</tr>
	
	
	
	
	<tr>
		<td  style='font-size:22px;padding-top:9px' >
			

									<b><?php echo $products[0]->name;    ?></b>

		</td>
	</tr>
	<tr>
		<td  style='font-size:17px;' >
			

	<b>RETAIL PRICE:  $35</b>

		</td>
		
		
	</tr>
	
	
	<tr>
		<td  style='font-size:17px;' >
			
<b>LOWEST PRICE ONLINE:</b><span  style='color:red'  ><b>$30</b></span>
		</td>
		
		
	</tr>	
	
	
	
	<tr>
		<td  style='font-size:34px;color:#9FB200;padding-top:11px' >
			
<b>OUR PRICE: $20</b>

		</td>
		
		
	</tr>	
	
	
	
	
	
	
	

	
	
	<tr>
		<td   style='padding-top:11px'   >
			
										<img id='buy'  class='cursor_pointer' src='<?php echo base_url();    ?>/images/buyNow.png'>

		</td>
	</tr>
		
	
	
</table>

									
									

										
								</td>

							</tr>
						</table>
				</div>
			
				
				
			
			</div>
</div>


<div class='container'   style='font-size:24px;color:gray'  >
	
	BOTTOM
	
</div>

</body>
<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 