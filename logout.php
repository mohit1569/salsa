<?php
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '1443163612563988',
		'secret' => '2e189d426b9e1fae32c800bad1beadc1'
	));

	setcookie('fbs_'.$facebook->getAppId(),'', time()-100, '/', 'localhost');
	$facebook->destroySession();
	header('Location: index.php');
?>
