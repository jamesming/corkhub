	<script type="text/javascript" language="Javascript">
	
			$(document).ready(function() { 
						$('#logo').click(function(event) {
							document.location.href='<?php echo  base_url();   ?>';
						});		
			});
			 
	</script>


<div    style='
	height:140px;
	background:#550F0D'
	  >
	<div  class=' container' >
		
		<div  class='span-12 ' >
				<img id='logo'  class='cursor_pointer '  src='<?php echo  base_url();   ?>images/logo.png'>
		</div>
		
		<div  class='span-12 last '  >
		 	
					<table     >
						<tr>
							<td   style='
								vertical-align:middle;
								height:95px;
								color:white;
								text-align:right;
								' >
								<!--
								<input   name="" id=""  value="Join our mailing list!"   style='background:url(<?php  echo base_url()   ?>images/inputbg.gif) no-repeat; font-size:17px; color:#cacaca; width:260px; height:23px; padding:2px 3px 10px 4px'  >
								  -->
								
								<a href='http://unbouncepages.com/corkhub/'  target='_blank' style='color:lightgray; font-size:16px'  >Join our mailing list!</a>
								
<!--								
<form action="http://unbouncepages.com/fsg?pageId=1aa8fede-3c5f-11e0-8e27-12313e003591&variant=a" method="post"> 
<input  class='input_field' type="text" 
id="enter_your_email_and_we'll_put_you_on_our_invite_list" 
name="enter_your_email_and_we'll_put_you_on_our_invite_list" 
class="text" style="
top: 0px; 
left: 0px; 
width: 220px; 
font-size: 20px; 
line-height: 22px; 
height: 32px; 
padding-top: 10px; 
padding-bottom: 0px; 
padding-left: 5px; 
padding-right: 0px;
font-style: italic;
" 
value="Get on our invite list..."> 
<span  class='rounded_border button' onclick=$().submit()  style='
	
	font-size:16px;
	width:50px;
	display:inline;
	padding:7px;	
	
	'  >
	GO
</span>
</form>

  
<a href="http://www.twitter.com/corkhub" target="_blank"><img src="<img src="<?php echo base_url();    ?>images/twitter.jpg">"></a> 

<a href="http://www.facebook.com/pages/CorkHub/138601582871736" target="_blank"><img src="<?php echo base_url();    ?>images/facebook.png"></a>

-->
							</td>
						</tr>
						
						<tr>
							<td   style='
								vertical-align:bottom;
								height:20px;
								font-size:12x;
								color:white;
								text-align:right;
								letter-spacing:4px;
								' >GO ON A BLIND DATE WITH WINE, EVERY WEEK.
							</td>
						</tr>						
						
						
					</table>
			
		</div>		
		
	</div>

	
</div>	
<!--
	
	<div  class='span-7 '       style='
	font-size:16px;
	color:blue;
	vertical-align:bottom;
	height:60px;
	'       >
	
	
	
<?php if( $loggedin == TRUE ){?>

			Welcome <?php echo $users[0]->firstname . ' ' . $users[0]->lastname;    ?>&nbsp;&nbsp;&nbsp;
			
			
			<a href='<?php echo base_url();    ?>index.php/authenticate/logout'>
			logout</a>

<?php }else{?>

				<a href='<?php echo base_url();    ?>index.php/authenticate/signin'>
			login here</a> / or 
				
				
				<a href='<?php echo base_url();    ?>index.php/authenticate/register'>register</a>

<?php } ?>
	
	

	</div>
  -->
	
	

<div   style='background:#F1F0C4'  >
	<div   style='height:14px;background:url(<?php echo  base_url();   ?>images/shadow.png) repeat-x'  >
		
	
	</div>	
</div>


	

