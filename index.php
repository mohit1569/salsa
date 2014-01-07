<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#">
<head>
 <meta charset="utf-8" />
  <title>Find your secret santa</title>
   <link rel="stylesheet" type="text/css" href="_/css/mystyles.css">
     <script type="text/javascript" src="_/js/jquery-1.7.2.min.js"></script>
     <script type="text/javascript" src="_/js/myscript1.js"></script>
	 <script type="text/javascript" src="_/js/myscript2.js"></script>
 </head>

<body>
		  <div id="fb-root"></div>
<script>
 
</script>
			
			
<div id="header">
<img src="like.gif" alt="like image" />
<div class="fb-like" data-href="https://www.facebook.com/Freakssssss" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>

</div>
<div id="center">
<div id="leftSideBar"></div>
<div id="content">
<div id="mydiv" style="display:none;">
<img src="495.gif" class="ajax-loader"  />
</div>
<?php

	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '569269163155443',
		'secret' => '3e7bd49b8b35bd5b5f13375e23974b38',
		'fileUpload' => true,  
  'cookie' => true // enable optional cookie support
	));

	//get user from facebook object
	$user = $facebook->getUser();
	
	if ($user): //check for existing user id
	try{	
	     $facebook->setFileUploadSupport(true);
		// echo '<p>User ID: ', $user, '</p>';
    
	
	//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	
	
		
	$facebook->setFileUploadSupport(true);
		//echo '<p>User ID: ', $user, '</p>';
    
	//Data to be published
	$userid=null;
	$friend_id=null;
	$user_name=null;
	$friend_name=null;
	$friend_pictureUrl=null;
	$user_pictureUrl=null;
	$access_token = $facebook->getAccessToken();
	$linkForSendingData=null;
	$friendfounder='false';   //To check whether friend found or not
	//Check current user Deatils and gender
	
    $current_userid = $facebook->api('/me?fields=id,name,gender,first_name,picture.width(142).height(184).type(large)');
   /* foreach ($current_userid['data'] as $key => $value)
	       {	
             $user_pictureUrl=$value['picture']['data']['url'];
			
			  $userid=$value['id'];
			 
		   }
  */
  
  
    $user_name=$current_userid['first_name'];
    $userid=$current_userid['id'];
	$user_pictureUrl=$current_userid['picture']['data']['url'];
	
	/*echo 'aaaa'.$userid;
	echo 'bbb'.$user_pictureUrl;
	*/
   //  echo '<pre>',print_r($current_userid),'<pre>';  // data check
	
	
	if($current_userid['gender']=='male')
	{
	//echo 'male1';                                      //data check
	//Now get a female friend if existing
	$femalefriends_graph = $facebook->api(array(
			'method' => 'fql.query',
			'query' => "select uid, name, sex,first_name from user where uid in(select uid2 from friend where uid1 = me()) and sex = 'female' LIMIT 1"
			 
		));
		
		foreach ($femalefriends_graph as $key => $value)
	    {		
		 $friend_id=$value['uid'];
		 $friend_name=$value['first_name'];
		 $friendfounder='true';
		}
		
		if($friendfounder=='true')
		{
	  $toGetUrlOfFriendPicture_graph=$facebook->api(''.$friend_id.'?fields=picture.width(142).height(184).type(large)');
      foreach ($toGetUrlOfFriendPicture_graph['picture'] as $key => $value)
	    {	
             $friend_pictureUrl=$value['url'];
		}	 

	   }
	  
	}
	else if($current_userid['gender']=='female')
	{
	//Now get a male friend if existing
	$malefriends_graph = $facebook->api(array(
			'method' => 'fql.query',
			'query' => "select uid, name, sex,first_name from user where uid in(select uid2 from friend where uid1 = me()) and sex = 'male' LIMIT 1"
		));
	
	foreach ($malefriends_graph as $key => $value)
	    {		
		 $friend_id=$value['uid'];
		 $friend_name=$value['first_name'];
		 $friendfounder='true';
		}
	
       if($friendfounder=='true')
	   {
      $toGetUrlOfFriendPicture_graph=$facebook->api(''.$friend_id.'?fields=picture.width(142).height(184).type(large)');
      foreach ($toGetUrlOfFriendPicture_graph['picture'] as $key => $value)
	    {	
         
		 $friend_pictureUrl=$value['url'];
		}	 

	 }
	  
	}
	
	else
	{
	//Now get a friend if existing
	$randomfriends_graph = $facebook->api(array(
			'method' => 'fql.query',
			'query' => "select uid, name, sex,first_name from user where uid in(select uid2 from friend where uid1 = me())  LIMIT 1"
		));
	
	foreach ($randomfriends_graph as $key => $value)
	    {		
		 $friend_id=$value['uid'];
		 $friend_name=$value['first_name'];
		 $friendfounder='true';
		}
		
		if($friendfounder=='true')
		{
		 $toGetUrlOfFriendPicture_graph=$facebook->api(''.$friend_id.'?fields=picture.width(142).height(184).type(large)');
         foreach ($toGetUrlOfFriendPicture_graph['picture'] as $key => $value)
	    {	
             $friend_pictureUrl=$value['url'];
		}	 

	    }
	
	}
	
	if($friendfounder=='false')
	{
	//Now get a friend if existing
	$randomfriends_graph = $facebook->api(array(
			'method' => 'fql.query',
			'query' => "select uid, name, sex,first_name from user where uid in(select uid2 from friend where uid1 = me())  LIMIT 1"
		));
	
	foreach ($randomfriends_graph as $key => $value)
	    {		
		 $friend_id=$value['uid'];
		 $friend_name=$value['first_name'];
		
		}
		
		
		
		 $toGetUrlOfFriendPicture_graph=$facebook->api(''.$friend_id.'?fields=picture.width(142).height(184).type(large)');
         foreach ($toGetUrlOfFriendPicture_graph['picture'] as $key => $value)
	    {	
             $friend_pictureUrl=$value['url'];
		}	 

	   
	
	}
	
	
	
	
	
	
	
	
	//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	
	/*
echo '111'.$userid.'passwd';
	echo '222'.$user_pictureUrl;
	echo '333'.$friend_id;
	echo '444'.$friend_pictureUrl;
	echo '555'.$user_name;
	echo '666'.$friend_name;
		
		*/
		 echo '<img src="result.php?userid='.$userid.'&user_pictureUrl='.$user_pictureUrl.'&user_name='.$user_name.'&friend_id='.$friend_id.'&friend_pictureUrl='.$friend_pictureUrl.'&friend_name='.$friend_name.'" alt="loading image " />';
		 
		 $linkForSendingData='userid=+'.$userid.'&user_pictureUrl=+'.$user_pictureUrl.'&user_name=+'.$user_name.'&friend_id=+'.$friend_id.'&friend_pictureUrl=+'.$friend_pictureUrl.'&friend_name=+'.$friend_name;
		 echo '<br/>';
		 echo '<input type="hidden" id="dataSender"  value='.$linkForSendingData.' />';
		//  echo '<img src="result.php?userid=100000399544716&user_pictureUrl=http://profile.ak.fbcdn.net/hprofile-ak-ash3/c0.9.240.311/s200x200/29589_519065191450128_43316702_n.jpg&friend_id=1263285072444&friend_pictureUrl=http://profile.ak.fbcdn.net/hprofile-ak-prn2/t1/c0.0.612.794/s200x200/1484199_10201309967292199_2095278675_n.jpg" alt="Error occured Please try more again " />';
		 			   
           }catch(FacebookApiException $e){
              echo $e->getMessage();
           }
		
		
		echo '
</div><!-- content ends here-->
<div id="rightSideBar"></div>
</div>   <!-- center ends here-->
<div id="footer"> 
 <div id="join" >
 
  <a href="#" onClick="uploadResult()">  
 <img src="images/shareResult.jpeg" alt="images"  style=" margin-left:250px;"   />
  </a>  


<br/>
 <div id="txtHint" style="display:none;">
 <img src="images/success.jpg" alt="images"  style=" margin-left:100px;"   />
 </div>
 </div>
                  
</div> ';
		
	else: //user doesn't exist
		$loginUrl = $facebook->getLoginUrl(array(
			'diplay'=>'popup',
			'scope'=>'publish_stream, user_photos',
			'redirect_uri' => 'https://apps.facebook.com/salsapartner'
		));
		echo '<p><a href="', $loginUrl, '" target="_top">login</a></p>';
	endif; //check for user id
?>


</body>
</html>