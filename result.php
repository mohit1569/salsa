<?php 

/*	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '1443163612563988',
		'secret' => '2e189d426b9e1fae32c800bad1beadc1',
		'fileUpload' => true,  
  'cookie' => true // enable optional cookie support
	));
*/

$userid = $_GET['userid'];
$user_pictureUrl = $_GET['user_pictureUrl'];
$user_name = $_GET['user_name'];
$friend_id = $_GET['friend_id'];
$friend_pictureUrl = $_GET['friend_pictureUrl'];
$friend_name = $_GET['friend_name'];



/*
$userid = '100000399544716';
$user_pictureUrl = 'http://profile.ak.fbcdn.net/hprofile-ak-ash3/c0.9.240.311/s200x200/29589_519065191450128_43316702_n.jpg';
$friend_id = '1263285072444';
$friend_pictureUrl = 'http://profile.ak.fbcdn.net/hprofile-ak-prn2/t1/c0.0.612.794/s200x200/1484199_10201309967292199_2095278675_n.jpg';
	  
*/

	//get user from facebook object
	
	
	
		//echo '<p>User ID: ', $user, '</p>';
    

	
	//Check current user Deatils and gender
	
	    //Now combine The photos
		$dest = imagecreatefromjpeg('images/final.jpg');
        
		// Text color		
		$cor = imagecolorallocate($dest, 255, 255, 255);
		$src1 = imagecreatefromjpeg($friend_pictureUrl);
		
        $src2=imagecreatefromjpeg($user_pictureUrl);
       
		/*echo $friend_pictureUrl;
		echo $user_pictureUrl;
		
		echo $user_name;
		echo $friend_name;
		*/
	    imagecopymerge($dest, $src2, 60, 178, 0, 0, 142, 184, 100); 
        imagecopymerge($dest, $src1, 510, 178, 0, 0, 142, 184, 100); 
       

	   //x of desc on source,y of desc on sorrce,own frame,own frame, width of photo,Height of photo ,opacity
$font='font/MTCORSVA.TTF';


imagettftext($dest, 23, 0, 60, 405, $cor, $font,$user_name);
imagettftext($dest, 23, 0, 530, 405, $cor, $font,$friend_name);
//image,size,angle,x coordinate ,y cordinate,color,font style,text

header("Content-Type: image/jpeg");
imagejpeg($dest);
imagedestroy($dest);

        

		
	
	
?>


