 window.fbAsyncInit = function() {
  
 // alert("inside3");
    // init the FB JS SDK
    FB.init({
      appId      : '569269163155443',                        // App ID from the app dashboard
      status     : true,                                 // Check Facebook Login status
      xfbml      : true,                                // Look for social plugins on the page
	  channelUrl : '//polar-lake-6108.herokuapp.com/channel.php' // Channel File
    });

	
    // Additional initialization code such as adding Event Listeners goes here
	 FB.ui({
      method: 'apprequests',
      title: 'Find your salsa partner',
      message: 'Check your salsa partner here'
  }); 
  
  window.onload = function() {
  FB.Canvas.setAutoGrow(); //Run the timer every 100 milliseconds, you can increase this if you want to save CPU cycles
}
  
  
  };

  // Load the SDK asynchronously
  (function(){
     // If we've already installed the SDK, we're done
     if (document.getElementById('facebook-jssdk')) {return;}

     // Get the first script element, which we'll use to find the parent node
     var firstScriptElement = document.getElementsByTagName('script')[0];

     // Create a new script element and set its id
     var facebookJS = document.createElement('script'); 
     facebookJS.id = 'facebook-jssdk';

     // Set the new script's source to the source of the Facebook JS SDK
     facebookJS.src = '//connect.facebook.net/en_US/all.js';

     // Insert the Facebook JS SDK into the DOM
     firstScriptElement.parentNode.insertBefore(facebookJS, firstScriptElement);
   }());