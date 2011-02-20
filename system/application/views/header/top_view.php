	<script type="text/javascript" language="Javascript">
	
			$(document).ready(function() { 
						$('#logo').click(function(event) {
							document.location.href='<?php echo  base_url();   ?>';
						});		
			});
			 
	</script>


<div  class='container'>
	
	<div  id='logo' class='span-7 cursor_pointer'     style='
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