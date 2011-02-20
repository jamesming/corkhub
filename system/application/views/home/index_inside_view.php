<head>
<?php     	$this->load->view('header/header_css.php');  ?>
</head>
<body>
<div  class='container'>
	
	<div  class='span-7 '     style='
	font-size:60px;
	color:darkorange;
	'       >Corkhub
	</div>
	
	<div  class='span-4 '       style='
	font-size:16px;
	color:lightblue;
	vertical-align:bottom;
	height:60px;
	'       >
	
	<a href='<?php echo base_url();    ?>index.php/authenticate/signin'>
login here</a> / or 
	
	
	<a href='<?php echo base_url();    ?>index.php/authenticate/register'>register</a>
	</div>
	
	
	<div  class='span-13 last '       style='
	font-size:16px;
	color:lightblue;
	vertical-align:bottom;
	height:60px;
	'       >
today's cork&nbsp;&nbsp;&nbsp;
blog&nbsp;&nbsp;&nbsp;
community&nbsp;&nbsp;&nbsp;
write us&nbsp;&nbsp;&nbsp;
about&nbsp;&nbsp;&nbsp;
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
			$<?php echo $products[0]->price;    ?> <span   style='font-size:14px;'  >plus   <?php  echo $products[0]->shipping_handling;   ?>shipping and handling.</span>
			</p>	
			<p   style='font-size:17px;'  >
			Ph level:<?php echo $products[0]->ph;    ?>/Alcohol: <?php echo $products[0]->acid;    ?>/Acid:<?php echo $products[0]->alcohol;    ?>
			</p>		
		</td>
		<td align='center' style='vertical-align:middle;font-size:44px;color:gray'  >
			<img src='<?php echo base_url();    ?>/images/buy_now.png'>
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