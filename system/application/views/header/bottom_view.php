	<script type="text/javascript" language="Javascript">
	
			$(document).ready(function() { 
						$('.about_div_link').fancyZoom();
						$('.terms_div_link').fancyZoom();
			});
			 
	</script>

	<script>
		
	(function($){
	$.fn.fancyZoom = function(options){
		
	  var options   = options || {};
	  var directory = options && options.directory ? options.directory : '<?php echo base_url();    ?>js/fancyzoom/images';
	  var zooming   = false;
	  
	  if ($('#zoom').length == 0) {
	    var ext = $.browser.msie ? 'gif' : 'png';
	    var html = '<div id="zoom" style="display:none;"> \
	                  <table id="zoom_table" style="border-collapse:collapse; width:100%; height:100%;"> \
	                    <tbody> \
	                      <tr> \
	                        <td class="tl" style="background:url(' + directory + '/tl.' + ext + ') 0 0 no-repeat; width:20px; height:20px; overflow:hidden;" /> \
	                        <td class="tm" style="background:url(' + directory + '/tm.' + ext + ') 0 0 repeat-x; height:20px; overflow:hidden;" /> \
	                        <td class="tr" style="background:url(' + directory + '/tr.' + ext + ') 100% 0 no-repeat; width:20px; height:20px; overflow:hidden;" /> \
	                      </tr> \
	                      <tr> \
	                        <td class="ml" style="background:url(' + directory + '/ml.' + ext + ') 0 0 repeat-y; width:20px; overflow:hidden;" /> \
	                        <td class="mm" style="background:#fff; vertical-align:top; padding:10px;"> \
					                  <a href="#" title="Close" id="zoom_close" style="height:5px;float:right;position:relative; left:7px;top:-5px;"> \
					                    <img  src="' + directory + '/closebox.' + ext + '" alt="Close" style=" margin:0; padding:0;" /> \
					                  </a> \
	                          <div id="zoom_content"> \
	                          </div> \
	                        </td> \
	                        <td class="mr" style="background:url(' + directory + '/mr.' + ext + ') 100% 0 repeat-y;  width:20px; overflow:hidden;" /> \
	                      </tr> \
	                      <tr> \
	                        <td class="bl" style="background:url(' + directory + '/bl.' + ext + ') 0 100% no-repeat; width:20px; height:20px; overflow:hidden;" /> \
	                        <td class="bm" style="background:url(' + directory + '/bm.' + ext + ') 0 100% repeat-x; height:20px; overflow:hidden;" /> \
	                        <td class="br" style="background:url(' + directory + '/br.' + ext + ') 100% 100% no-repeat; width:20px; height:20px; overflow:hidden;" /> \
	                      </tr> \
	                    </tbody> \
	                  </table> \
	                </div>';
	
	    $('body').append(html);
	
	    $('html').click(function(e){if($(e.target).parents('#zoom:visible').length == 0) hide();});
	    $(document).keyup(function(event){
	        if (event.keyCode == 27 && $('#zoom:visible').length > 0) hide();
	    });
	
	    $('#zoom_close').click(hide);
	    
	
	    
	  }
	
	  var zoom          = $('#zoom');
	  var zoom_table    = $('#zoom_table');
	  var zoom_close    = $('#zoom_close');
	  var zoom_content  = $('#zoom_content');
	  var middle_row    = $('td.ml,td.mm,td.mr');
	
	  this.each(function(i) {
	    $($(this).attr('href')).hide();
	    $(this).click(show);
	  });
	
	  return this;
	
	  function show(e) {
	    if (zooming) return false;
			zooming         = true;
			var content_div = $($(this).attr('href'));
	  	var zoom_width  = options.width;
			var zoom_height = options.height;
	
			var width       = window.innerWidth || (window.document.documentElement.clientWidth || window.document.body.clientWidth);
	  	var height      = window.innerHeight || (window.document.documentElement.clientHeight || window.document.body.clientHeight);
	  	var x           = window.pageXOffset || (window.document.documentElement.scrollLeft || window.document.body.scrollLeft);
	  	var y           = window.pageYOffset || (window.document.documentElement.scrollTop || window.document.body.scrollTop);
	  	var window_size = {'width':width, 'height':height, 'x':x, 'y':y}
	
			var width              = (zoom_width || content_div.width()) + 60;
			var height             = (zoom_height || content_div.height()) + 60;
			var d                  = window_size;
	
			// ensure that newTop is at least 0 so it doesn't hide close button
			var newTop             = Math.max((d.height/2) - (height/2) + y, 0);
			var newLeft            = (d.width/2) - (width/2);
			var curTop             = e.pageY;
			var curLeft            = e.pageX;
	
			zoom_close.attr('curTop', curTop);
			zoom_close.attr('curLeft', curLeft);
			zoom_close.attr('scaleImg', options.scaleImg ? 'true' : 'false');
	
	    $('#zoom').hide().css({
				position	: 'absolute',
				top				: curTop + 'px',
				left			: curLeft + 'px',
				width     : '1px',
				height    : '1px'
			});
	
	    fixBackgroundsForIE();
	    zoom_close.hide();
	
	    if (options.closeOnClick) {
	      $('#zoom').click(hide);
	    }
	
			if (options.scaleImg) {
	  		zoom_content.html(content_div.html());
	  		$('#zoom_content img').css('width', '100%');
			} else {
			  zoom_content.html('');
			}
	
	    $('#zoom').animate({
	      top     : newTop + 'px',
	      left    : newLeft + 'px',
	      opacity : "show",
	      width   : width,
	      height  : height
	    }, 500, null, function() {
	      if (options.scaleImg != true) {
	    		zoom_content.html(content_div.html());
	  		}
				unfixBackgroundsForIE();
				zoom_close.show();
				zooming = false;
	    })
	    return false;
	  }
	
	  function hide() {
	    if (zooming) return false;
			zooming         = true;
		  $('#zoom').unbind('click');
			fixBackgroundsForIE();
			if (zoom_close.attr('scaleImg') != 'true') {
	  		zoom_content.html('');
			}
			zoom_close.hide();
			$('#zoom').animate({
	      top     : zoom_close.attr('curTop') + 'px',
	      left    : zoom_close.attr('curLeft') + 'px',
	      opacity : "hide",
	      width   : '1px',
	      height  : '1px'
	    }, 500, null, function() {
	      if (zoom_close.attr('scaleImg') == 'true') {
	    		zoom_content.html('');
	  		}
	      unfixBackgroundsForIE();
				zooming = false;
	    });
	    return false;
	  }
	
	  function switchBackgroundImagesTo(to) {
	    $('#zoom_table td').each(function(i) {
	      var bg = $(this).css('background-image').replace(/\.(png|gif|none)\"\)$/, '.' + to + '")');
	      $(this).css('background-image', bg);
	    });
	    var close_img = zoom_close.children('img');
	    var new_img = close_img.attr('src').replace(/\.(png|gif|none)$/, '.' + to);
	    close_img.attr('src', new_img);
	  }
	
	  function fixBackgroundsForIE() {
	    if ($.browser.msie && parseFloat($.browser.version) >= 7) {
	      switchBackgroundImagesTo('gif');
	    }
		}
	
	  function unfixBackgroundsForIE() {
	    if ($.browser.msie && $.browser.version >= 7) {
	      switchBackgroundImagesTo('png');
	    }
		}
	}
	})(jQuery);
	</script>
<div    style='
	height:80px;
	background:#550F0D;
	'
	  >
	<div  class=' container'   style='text-align:center;padding-top:30px;color:white;'  >
		
	<a href="#about_div"  class="about_div_link"  style='color:white'  href='<?php echo base_url();    ?>index.php?/home/about'>About</a> &nbsp;&nbsp;<a href="#terms_div"  class="terms_div_link"  style='color:white'  href='<?php echo base_url();    ?>index.php?/home/about'>Terms</a> &nbsp;&nbsp;<a  style='color:white'  href='mailto:corkhub@gmail.com'>Contact Us</a>&nbsp;&nbsp;&copy;&nbsp;Copyright 2011<br>
		
	</div>

	
</div>	


	<div id="about_div"   style='width:450px;font-size:12px'     >
<b>CorkHub is the new online buying experience in fine wines</b>, bringing the best wine deals from the best wineries. CorkHub is devoted to bringing you the single best thing in the world, a great bottle of wine. We are committed to connecting our customers with California’s best winemakers, to deliver premium wines at a tremendous value. To give our sellers discretion and the opportunity to reach a new audience, we keep the wine label hidden, but only at the time of purchase. No one likes drinking an expensive wine that is defined by name alone. Our solution, is to sell wines based on taste and attributions, rather than solely name or brand. 
<br><br>
Like most wine drinkers, we want to drink a wine, based on its essence, rather than perception. That being said, we have relationships with top wine-makers in California, helping them get their wine into your belly. We treat our customers with five star service and only bring them the best and most tastiest wines. We’re like the Four Seasons for wine, but you have to provide the slippers and the spa. Whether pairing wine with dinner on a first date, entertaining friends for a party, or drinking wine by yourself, we will deliver a wine that will blow you mind.
	</div>
	
	<div id="terms_div"   style='width:450px;font-size:12px'     >
<b>Return/Cancellation policy:</b><br>

If you are unsatisfied in your wine in any way within 30 days, we will either replace it or give CorkHub credit. We will do our best to make make it right.
<br><br>
<b>Shipping Policy:</b><br>

We only ship within California. The wine will be shipped and arrive at your door within 14 business days of the end of sale period. A person of 21 must be present to accept the shipment with a government issued ID.
	</div>	
	
