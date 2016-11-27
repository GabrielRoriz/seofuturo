<?php 
	$status = "nda";
	$matches = array();
	$url_content =  $_SESSION['url_content'];
	$wrong = true;

	if(keyword($url_content, 'og:')){
		$status = "opengraph";	
		$wrong = false;
		$_SESSION['pontos'] += 3;
	}
	else $status = "!opengraph";

	$_SESSION['opengraphStatus'] = $status;
    $_SESSION['opengraphWrong'] = $wrong;

 ?>