<?php
	
	$status = "nda";
	$matches = array();
	$sitemap_on_robots = false;
	$url_raw = "";
	$url =  $_SESSION['url'];
	$wrong = true;

	if(preg_match_all('/(\w+.\w+[\.]+\w+)/', $url, $matches)) $url_raw = $matches[1][0];

	$url_robots = 'http://' . $url_raw . '/robots.txt';

	if(valida($url_robots)){
		$status =  "robots";
		$wrong = false;
		$_SESSION['pontos'] += 5;
		
		if(keyword(file_get_contents($url_robots), "sitemap")) { 
			$status =  "robots_sitemap";
			$sitemap_on_robots = true;
		}
		else $status =  "robots_!sitemap";
	}
	else $status =  "!robots";

    $_SESSION['sitemap_on_robots'] = $sitemap_on_robots;
    $_SESSION['url_robots'] = $url_robots;
    $_SESSION['url_raw'] = $url_raw;
    $_SESSION['robotsWrong'] = $wrong;
    $_SESSION['robotsStatus'] = $status;


?>