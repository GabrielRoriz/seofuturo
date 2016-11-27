<?php 
	$status = "nda";
	$matches = array();
	$url_content =  $_SESSION['url_content'];
	$wrong = true;

	if(keyword($url_content, 'rel="publisher"')){
		$status = "googleplus";	

		$pattern = '/plus.google.com\/[A-Za-z0-9\/\.\_\?\=\&\+]+/';
		$matches = array(); 
	
		$result = preg_match_all($pattern, $url_content, $matches, PREG_SET_ORDER); 

		$google_plus = implode("", $matches[0]);
		$_SESSION['googlePlus'] = $google_plus;
		$wrong = false;
		$_SESSION['pontos'] += 5;
	}
	else $status = "!googleplus";

    $_SESSION['googleStatus'] = $status;
    $_SESSION['googleWrong'] = $wrong;
 ?>