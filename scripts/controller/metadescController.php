<?php 
	$status = "nda";
	$matches = array();
	$url_content =  $_SESSION['url_content'];
	$keyword = $_SESSION['keyword'];
	$wrong = true;

	
	$matches = array();
	preg_match('/<meta[^>]*name=[\"|\']description[\"|\'][^>]*content=[\"]([^\"]*)[\"][^>]*>/i', $url_content, $matches);

	if($matches){
		$status =   "meta";
		$_SESSION['pontos'] += 4;

		if(strlen($matches[1]) > 270) $status =  $status . '+';
		else {
			$status = $status . '-';
			$_SESSION['pontos'] += 3;
			$wrong = false;
		} 
		
		if(preg_match('/'. $keyword . '/', $matches[1])){ 
			$status = $status . 'k';
			$_SESSION['pontos'] += 8;
		}
		else 
			$wrong = true;
	}
	else $status =  "!meta";

	$_SESSION['metaStatus'] = $status;
    $_SESSION['metaWrong'] = $wrong;
 ?>