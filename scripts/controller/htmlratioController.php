<?php 
	$url_content =  $_SESSION['url_content'];
	$wrong = true;
	$matches = array();
	
	$codeCount = strlen($url_content);

 	$url_content = preg_replace('/(<\?php[\w\W]*\?>)/i','', $url_content); //Remove codigo php
 	$url_content = preg_replace('/(<style.*?>[\s\S]*?<\/style>)/i', '', $url_content); //Remove css
 	$url_content = preg_replace('/(<script.*?>[\s\S]*?<\/script>)/i','', $url_content); //Remove JS
 	$url_content = preg_replace('/(<[\s]*.*?[\s\/]*>)/i','',$url_content); //Remove codigo html
 	$url_content = preg_replace('/(<!--[\w\W]*-->)/i', '', $url_content); //Remove comentários html
 	$url_content = preg_replace('/(\/\*[\w\W]*\*\/)/i', '', $url_content); //Remove comentários php css JS*/
	
 	$textCount = strlen($url_content);

 	$percent = round(($textCount * 100)/$codeCount);

 	if($percent >= 15) {
 		$wrong = false;
 		$_SESSION['pontos'] += 5;
 	}


    $_SESSION['htmlStatus'] = $status;
    $_SESSION['htmlWrong'] = $wrong;
    $_SESSION['htmlPercent'] = $percent;
 ?>