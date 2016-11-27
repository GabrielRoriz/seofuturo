<?php 
	$url_content =  $_SESSION['url_content'];
	$wrong = false;
	$matches = array();
	$index = array();

	$pattern = '/<[\s]*a(.*?)[\s\/]*>/i';
	preg_match_all($pattern, $url_content, $matches);
	

	for ($i=0; $i < count($matches[1]); $i++) { 
		if(keyword($matches[1][$i], 'http'))$index[$i] = 'ext';//link externo
		else $index[$i] = 'int';

		if(!keyword($matches[1][$i], 'nofollow')) {
			$wrong = true;
			$status = '!nofollow';
		}
	}

	$_SESSION['linksCountMatches'] = count($matches[1]);
	$_SESSION['linksStatus'] = $status;
    $_SESSION['linksWrong'] = $wrong;
    $_SESSION['linksMatches'] = $matches;
    $_SESSION['linksIndex'] = $index;

?>