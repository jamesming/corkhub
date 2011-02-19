<?php   

		foreach($vendors as $vendor){
			
				
					echo "<li><a vendor_id='" . $vendor->id . "' class='vendor_name cursor_pointer'>" . $vendor->name  . "</a>&nbsp;&nbsp;<img  href='#iframe_to_edit_div'  class='edit cursor_pointer' vendor_id='" . $vendor->id . "' src='../../images/edit.png'>&nbsp;&nbsp;<img  class='delete cursor_pointer' vendor_id='" . $vendor->id . "' src='../../images/icon_trash.png'></li>";
			
		}; 
		
?>
<script type="text/javascript" language="Javascript">
	
							$('.edit').fancyZoom().bind('click', function() {
								
								var vendor_id = $(this).attr('vendor_id');
								
								$("#iframe_content_to_edit").attr('src','<?php echo base_url();    ?>index.php/home/vendor_form/' + vendor_id);
						  
							});
</script>

