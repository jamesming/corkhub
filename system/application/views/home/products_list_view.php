<?php   

		foreach($products as $product){
			
				
					echo "<li>" . $product->name  . "&nbsp;&nbsp;<img  href='#iframe_to_edit_div'  class='edit cursor_pointer'   vendor_id='" . $product->vendor_id . "' product_id='" . $product->id . "' src='" . base_url(). "images/edit.png'>&nbsp;&nbsp;<img  class='delete cursor_pointer'   vendor_id='" . $product->vendor_id . "' product_id='" . $product->id . "' src='" . base_url(). "images/icon_trash.png'></li>";
			
		}; 
		
?>
<script type="text/javascript" language="Javascript">
	
							$('.edit').fancyZoom().bind('click', function() {
								
								var product_id = $(this).attr('product_id');
								
								var vendor_id = $(this).attr('vendor_id');
								
								$("#iframe_content_to_edit").attr('src','<?php echo base_url();    ?>index.php/home/product_form/' + vendor_id + '/' + product_id);
						  
							});
</script>

