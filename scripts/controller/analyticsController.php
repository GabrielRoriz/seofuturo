<?php
	$status = "nda";
	$matches = array();
	$url_content =  $_SESSION['url_content'];
	$wrong = true;

	if(keyword($url_content, "google-analytics")) { 
		$status = 'ganalytics';
		$wrong = false;
		$_SESSION['pontos'] += 3;
	}
	else $status = "!ganalytics";

	$_SESSION['analycticsStatus'] = $status;
    $_SESSION['analycticsWrong'] = $wrong;
    $_SESSION['pontos'] += 10;
?>