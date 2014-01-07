window.fbAsyncInit = function() {

//alert("qwerty");
	FB.init({
		appId      : '569269163155443', // App ID
		channelUrl : '//polar-lake-6108.herokuapp.com/channel.php', // Channel File
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		frictionlessRequests : true, // enable frictionless requests		
		xfbml      : true  // parse XFBML
	});

	// Additional initialization code here

	//Next, find out if the user is logged in
	
};




 function aaa()
{
//alert("bb");
  $('body').addClass("loading");
}

function bbb()
{
 $('body').removeClass("loading");
}

function uploadResult()
{
//alert("1111111111111");
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