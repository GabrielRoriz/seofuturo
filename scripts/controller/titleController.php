<?php 
	$status = "nda";
	$matches = array();
	$url_content =  $_SESSION['url_content'];
	$keyword = $_SESSION['keyword'];
	$wrong = true;

	
	$pattern = '/<title[^>]*>([^<]+)<\/title>/i';
	$matches = array();
	preg_match($pattern, $url_content, $matches);

	if($matches){
		$status =   "title";
		$_SESSION['pontos'] += 5;

		if(strlen($matches[1]) > 70) $status =  $status . '+';
		else {
			$status = $status . '-';
			$_SESSION['pontos'] += 3;
			$wrong = false;
		} 
		
		if(preg_match('/'. $keyword . '/', $matches[1])){ 
			$status = $status . 'k';
			$_SESSION['pontos'] += 8;
		}else 
			$wrong = true;
	}
	else $status =  "!title";

    $_SESSION['titleStatus'] = $status;
    $_SESSION['titleWrong'] = $wrong;
    $_SESSION['titleMatches'] = $matches;

 ?>