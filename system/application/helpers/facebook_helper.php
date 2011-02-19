<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2010, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Facebook Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		faisal ahmed 
 * @link		http://www.thephpx.com/2010/06/20/codeigniter-facebook-social-plugin-like-button-helper/
 */

// ------------------------------------------------------------------------

/**
 * Site URL
 *
 * Create Facebook like button dynamically for any content, by just giving-in the URL of the page.
 *
 * @access	public
 * @param	string
 * @return	string
 *
 * Usage:
  <?php
	$url = current_url();
	echo facebook_like($url);
	?>
 *
 *
 *
 *
 */
 
if(!function_exists(‘facebook_like’)){
 function facebook_like($url){
 $formlink=‘<iframe src="http://www.facebook.com/plugins/like.php?href=’;
  $formlink .= urlencode($url);
  $formlink .= ‘;layout=button_count&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>’;
               
  return $formlink;
  }
 }
 
 /*

 
 */


}


/* End of file url_helper.php */
/* Location: ./system/helpers/url_helper.php */