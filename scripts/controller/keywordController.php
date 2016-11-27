<?php 
	$url_content =  $_SESSION['url_content'];
	$wrong = true;
	$matches = array();
	$keyword = $_SESSION['keyword'];
	$keywordCount = 0;

	if(preg_match_all('/'.$keyword.'/i', $url_content, $matches)){
		$keywordCount = count($matches[0]);
		$wrong = false;	
		$_SESSION['pontos'] += 6;
	} 
	
	$_SESSION['keywordStatus'] = $status;
    $_SESSION['keywordWrong'] = $wrong;
    $_SESSION['keywordCount'] = $keywordCount;
 ?>