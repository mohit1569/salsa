<?php

# Path to facebook's PHP SDK.
require 'php-sdk/facebook.php';

# Facebook application config.
$config = array(
    'appId'      => '167281813482633',
    'secret'     => '781b4e2c20493a0f1543e66ff497a6c3',
    'fileUpload' => true # Optional and can be set later as well (Using setFileUploadSupport() method).
);

//$userid = $_GET['dataSending'];

//$user_pictureUrl = 'http://profile.ak.fbcdn.net/hprofile-ak-ash3/c0.9.240.311/s200x200/29589_519065191450128_43316702_n.jpg';
$user_pictureUrl = trim($_GET['user_pictureUrl']);
/*
$userid = $_GET['userid'];
$user_pictureUrl = $_GET['user_pictureUrl'];
$user_name = $_GET['user_name'];
$friend_id = $_GET['friend_id'];
$friend_pictureUrl = $_GET['friend_pictureUrl'];
$friend_name = $_GET['friend_name'];

*/





# Create a new facebook object.
$facebook = new Facebook($config);

# Current user ID.
$user_idLocal = $facebook->getUser();

# Check to see if we have user ID.
if($user_idLocal) {

  # If we have a user ID, it probably means we have a logged in user.
  # If not, we'll get an exception, which we handle below.
  try {

  # Save photo to system
  
    //Now combine The photos
		$dest = imagecreatefromjpeg('images/output.jpg');
        
		// Text color		
		$cor = imagecolorallocate($dest, 255, 0, 25);
		//$src1 = imagecreatefromjpeg($friend_pictureUrl);
		//$src2 = imagecreatefromjpeg('images/a3.jpg');
		
		if($user_pictureUrl=="http://profile.ak.fbcdn.net/hprofile-ak-ash3/c0.9.240.311/s200x200/29589_519065191450128_43316702_n.jpg")
		{
		imagejpeg($dest, "yyy.jpg");
		}		
		else{
		imagejpeg($dest, "nnn.jpg");
		}
		
       $src2=imagecreatefromjpeg($user_pictureUrl);
       
		/*echo $friend_pictureUrl;
		echo $user_pictureUrl;
		
		echo $user_name;
		echo $friend_name;
		*/
	    imagecopymerge($dest,$src2, 60, 178, 0, 0, 142, 184, 100); 
       // imagecopymerge($dest, $src2, 510, 178, 0, 0, 142, 184, 100); 
       

	   //x of desc on source,y of desc on sorrce,own frame,own frame, width of photo,Height of photo ,opacity
$font='font/MTCORSVA.TTF';


//imagettftext($dest, 23, 0, 60, 405, $cor, $font,$user_name);
//imagettftext($dest, 23, 0, 530, 405, $cor, $font,$friend_name);
//image,size,angle,x coordinate ,y cordinate,color,font style,text
imagejpeg($src2, "aaaa.jpg");
//imagejpeg($src1, "/images/{$_GET["image_name"]}.jpg");
//header("Content-Type: image/jpeg");
//imagejpeg($dest);
//imagejpeg($src2);

//imagedestroy($dest);
//unlink('aaaa.jpg');

        
  
  
  
  
  
    # Get the current user access token:
    $access_token = $facebook->getAccessToken();

    # Create an album:
    $album_details = array(
            'access_token' => $access_token,
            'name'         => 'Album Name',
            'message'      => 'Your album message goes here',
    );

    $create_album = $facebook->api('/me/albums', 'POST', $album_details);

    # Get album ID of the album you've just created:
    $album_id = $create_album['id'];

    # Output album ID:
    echo 'Album ID: ' . $album_id;

    # Upload photo to the album we've created above:
   // $image_absolute_url = 'http://www.gamerdna.com/public/images/user_image/set217/image/217666/troll-thumb.jpg';

    $photo_details = array();
    $photo_details['access_token']  = $access_token;
   // $photo_details['url']           = $image_absolute_url;                        # Use this to upload image using an Absolute URL.
    $photo_details['message']       = 'Y/c';

    $image_relative_url             = 'aaaa.jpg';
    $photo_details['source']        = '@' . realpath($image_relative_url);      # Use this to upload image from using a Relative URL. (Currently commented out).

    $upload_photo = $facebook->api('/' . $album_id . '/photos', 'POST', $photo_details);

    # Output photo ID:
    echo '<br>Photo ID: ' . $upload_photo['id'];

  } catch(FacebookApiException $e) {
    // If the user is logged out, you can have a 
    // user ID even though the access token is invalid.
    // In this case, we'll get an exception, so we'll
    // just ask the user to login again here.
    $login_url = $facebook->getLoginUrl( array('scope' => 'publish_stream, user_photos')); 
    echo 'Please <a href="' . $login_url . '">login.</a>';
    error_log($e->getType());
    error_log($e->getMessage());
  }   
} else {

  # No user, print a link for the user to login and give the required permissions to perform tasks.
  $params = array(
      'scope' => 'publish_stream, user_photos', # These permissions are required in order to upload image to user's profile.
  );

  $login_url = $facebook->getLoginUrl($params);
  echo 'Please <a href="' . $login_url . '">login.</a>';

    }
	
	
	
	
	//echo ''.$friend_name;
?>