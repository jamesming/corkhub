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
				<img id='logo'  class='cursor_pointer '  src='<?php echo  base_url();   ?>images/Titlelogo.png'>
		</div>
		<div  class='span-12 last '  >
			
			
					<table>
						<tr>
							<td   style='
								vertical-align:bottom;
								height:120px;
								font-weight:bold;
								color:white;
								font-size:18px;
								text-align:right;
								height:
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


	

