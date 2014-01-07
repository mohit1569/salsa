window.fbAsyncInit = function() {
alert("called");
	FB.init({
		appId      : '167281813482633', // App ID
		channelUrl : '//facebookphp/channel.php', // Channel File
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		frictionlessRequests : true, // enable frictionless requests		
		xfbml      : true  // parse XFBML
	});

	// Additional initialization code here

	//FB.Canvas.setAutoGrow();// to make canvas autogrow.Note to be this workable set canvas height and width to fixed

  window.onload = function() {
  
 // FB.Canvas.setAutoGrow(); //Run the timer every 100 milliseconds, you can increase this if you want to save CPU cycles

  }


};
// Load the JavaScript SDK Asynchronously
(function(d){
  var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
  js = d.createElement('script'); js.id = id; js.async = true;
  js.src = "//connect.facebook.net/en_US/all.js";
  d.getElementsByTagName('head')[0].appendChild(js);
}(document));

/*function postToFeed1(myTitle, myExcerpt) {


	FB.ui({
		method: 'feed',
		'link': 'http://apps.facebook.com/vyasaninscript',
		'picture': 'http://www.google.co.in/search?q=sky&site=imghp&tbm=isch&source=lnt&tbs=isz:ex,iszw:200,iszh:200&sa=X&ei=0aa4UomzGsGPrQfc1ICgCg&ved=0CCcQpwUoBQ#facrc=_&imgdii=_&imgrc=JMKR9TSh6hxqiM%3A%3BtFxNlAAGtGNMrM%3Bhttp%253A%252F%252Fcdn.marketplaceimages.windowsphone.com%252Fv8%252Fimages%252F13718d89-2ed9-4013-a9af-6fbeed92038c%253FimageType%253Dws_icon_large%3Bhttp%253A%252F%252Fwww.windowsphone.com%252Fen-gb%252Fstore%252Fapp%252Fsky-sports-news%252F0778df3d-bb22-4459-a8c1-d01323059ec5%3B200%3B200',
		'name': myTitle,
		'caption': 'View Source Blog',
		'description': document.getElementById('videogroup').innerHTML.value
	}, function(response) {
		if (response && response.post_id) {
			document.getElementById('mymessage').innerHTML = "Thanks. This has been posted onto your timeline.";
		} else {
			document.getElementById('mymessage').innerHTML = "The post was not published.";
		} //Response from post attempt
	}); // Call to FB.ui
} // postToFeed


function postToFeed(myTitle, myExcerpt) {


	FB.ui({
		method: 'feed',
		'link': 'http://apps.facebook.com/vyasaninscript',
		
	}, function(response) {
		if (response && response.post_id) {
			document.getElementById('mymessage').innerHTML = "Thanks. This has been posted onto your timeline.";
		} else {
			document.getElementById('mymessage').innerHTML = "The post was not published.";
		} //Response from post attempt
	}); // Call to FB.ui
} //

function messageToFriend(myTitle, myLink, myExcerpt) {
  FB.ui({
    'method': 'send',
    'link': myLink,
    'picture': 'http://localhost/facebookscript/images/viewsourcemonogram-sm.png',
    'name': myTitle,
    'caption': 'View Source Blog',
    'description': myExcerpt
  }, function(response) {
    if (response && response.post_id) {
      document.getElementById('mymessage').innerHTML = "Thanks. The message has been sent.";
    } else {
      document.getElementById('mymessage').innerHTML = "The message was cancelled.";
    } //Response from send attempt
  }); // Call to FB.ui
} // messageToFriend

function requestToFriends() {
*/
function shareToFriends() {
alert("hi");
  FB.ui({
      method: 'apprequests',
      title: 'View Source Request',
      message: 'Join me and be a part of the View Source revolution!'
  }); // Call to FB.ui
} // messageToFriend

//
 // FB.ui({
   //   method: 'apprequests',
    //  title: 'View Source Request',
     // message: 'Join me and be a part of the View Source revolution!'
  //}); // Call to FB.ui
} // messageToFriend

 
 function aaa()
{
alert("bb");
  $('body').addClass("loading");
}

function bbb()
{
 $('body').removeClass("loading");
}

function uploadResult()
{
alert("1111111111111");
var dataLinkAttacher = document.getElementById("dataSender").value;
//alert(dataLinkAttacher);
$.ajax({
    type:'GET',
    url: "uploadResult.php?"+dataLinkAttacher,
    //data:{query: $("#keyword").val()},
    //dataType:'json',
    async: true,
    success:function(d){
        // Your code.
		 // document.getElementById("txtHint").innerHTML=d;
		 $('#txtHint').show();
    },
    beforeSend: function(){
        // Code to display spinner
		$('#mydiv').show();
    },
    complete: function(){
        // Code to hide spinner.
	$('#mydiv').hide(); 
	
    }
});

}
/*
function uploadResult()
{
alert("hi");
aaa();
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
 
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
 var dataLinkAttacher = document.getElementById("dataSender").value;
  alert(dataLinkAttacher); 
var xmlhttp=new XMLHttpRequest();

xmlhttp.onreadystatechange=function()
  {
  
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  
 
xmlhttp.open("GET","uploadResult.php?"+dataLinkAttacher,true);
//xmlhttp.open("GET","uploadResult.php",true);

xmlhttp.send();
bbb();
}
*/