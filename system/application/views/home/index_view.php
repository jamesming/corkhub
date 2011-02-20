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
padding-left:5px;
}
.side_text{
padding:5px 0px 20px 0px;
}
</style>

<div   style='background:#F1F0C4'  >

			<div  class='container' >
				
				<div  class='span-7 ' >
					
					<table>
						<tr>
							<td><img id='buy'  class='cursor_pointer' src='<?php echo base_url();    ?>/images/Number1-Icon.png'>
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
							<td><img id='buy'  class='cursor_pointer' src='<?php echo base_url();    ?>/images/Number2-Icon.png'>
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
							<td><img id='buy'  class='cursor_pointer' src='<?php echo base_url();    ?>/images/Number3-Icon.png'>
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
									
									
						<img id='buy'  class='cursor_pointer' src='<?php echo base_url();    ?>/images/buyNow.png'>
									
									
						
									
								</td>
							</tr>
						</table>
				</div>
			
				
				
			
			</div>
</div>


<div class='container'   style='font-size:24px;color:gray'  >
	
	<?php echo $products[0]->description;    ?>
	
</div>

</body>
<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 