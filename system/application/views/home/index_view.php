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
	<link href="<?php echo  base_url();   ?>resources/css/ext.css" media="screen" rel="stylesheet" type="text/css">

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

			<div  class='container'   style='padding-bottom:50px'  >
				
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
									<div id="bottle"><div id="infographic"></div></div>
								</td>
								<td width='65%'>
									
									
									
<table    >
	<tr>
		<td style='font-size:50px;color:#9FB200;line-height: 1.2;' >
									  Today's 
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
			

	<b>RETAIL PRICE:  $40</b>

		</td>
		
		
	</tr>
	
	
	<tr>
		<td  style='font-size:17px;' >
			
<b>LOWEST PRICE ONLINE:</b><span  style='color:red'  ><b>$33</b></span>
		</td>
		
		
	</tr>	
	
	
	
	<tr>
		<td  style='font-size:34px;color:#9FB200;padding-top:11px' >
			
<b>OUR PRICE: $28.40</b>

		</td>
		
		
	</tr>	
	
	
	
	
	
	
	

	
	
	<tr>
		<td   style='padding-top:11px'   >
			
										<img id='buy'  class='cursor_pointer' src='<?php echo base_url();    ?>/images/buyNow.png'>

		</td>
	</tr>
		
	
	
</table>

									
									<br>
						<div >
                       <div id="counter" class="counter">
                               <ul class="countdown">
                                       <li><div class="countdown_num"
id="countdown_day"></div><div>Days</div></li>
                                       <li><div class="countdown_num"
id="countdown_hour"></div><div>Hours</div></li>
                                       <li><div class="countdown_num"
id="countdown_min"></div><div>Minutes</div></li>
                                       <li><div class="countdown_num"
id="countdown_sec"></div><div>Seconds</div></li>
                               </ul>
                       </div>
                       <div id="expired" style="display:none;">
                               The deadline has passed.
                       </div>
               </div>

										
								</td>

							</tr>
						</table>
						

						
				</div>
			
				
				
			
			</div>
</div>

<div     style='
	background:#550F0D'>
	
		<div class='container'    >
			
			<div   style='padding:10px 35px 10px 10px;font-size:40px;color:white;float:left'  >
				Past Selections:
			</div>
			

			
<div class="oldwines">
   <div id="Merlot"><img src="<?php echo  base_url();   ?>/images/Bottle-final.png"><span>Merlot:<br><br>Retail: $40<br>Our Price: $20<br><br><font color="red">SOLD OUT</font></span></div>
   <div id="Resling"><img src="<?php echo  base_url();   ?>/images/Bottle-final.png"><span>Resling:<br><br>Retail: $45<br>Our Price: $22<br><br><font color="red">SOLD OUT</font></span></div>
   <div id="Shiraz"><img src="<?php echo  base_url();   ?>/images/Bottle-final.png"><span>Shiraz:<br><br>Retail: $48<br>Our Price: $30<br><br><font color="red">SOLD OUT</font></span></div>
</div>
		
		</div>	
	
</div>


</body>
	<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/ext-core-debug-min.js"></script>
	<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/ext-all-debug-min.js"></script>
	<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/Info.js"></script>
<?php
/* End of file myfile.php */ 
/* Location: ./system/modules/mymodule/myfile.php */ 