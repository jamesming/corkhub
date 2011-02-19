<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
	
	

	FB.init({
	appId : '<?php  echo $appid ;   ?>',
	status : true, // check login status
	cookie : true, // enable cookies to allow the server to access the session
	xfbml : true // parse XFBML
	});
	
   FB.Event.subscribe('auth.login', function(response) {
  		
  		// alert('logged in');
   });
   
   FB.Event.subscribe('auth.logout', function(response) {
   	
			FB.logout(function(response) {
					// alert('LOGGED OUT');
			});

   });
  
   FB.getLoginStatus(function(response) {
   	
       if (response.session) {
       	
       		// alert('1-  connected');

     		
       } else {

 					// alert('2- not connected');
       		 
      	
    	 }
   });
};

(function() {
var e = document.createElement('script');
e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
e.async = true;
document.getElementById('fb-root').appendChild(e);
}());


</script>