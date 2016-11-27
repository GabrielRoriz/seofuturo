<?php
	$status = "nda";
	$matches = array();
	$url =  $_SESSION['url'];
	$wrong = true;
	$url_raw = $_SESSION['url_raw'];
    $sitemap_on_robots = $_SESSION['sitemap_on_robots'];
	$url_robots = $_SESSION['url_robots'];;

	if($sitemap_on_robots){ //Esconder warnings!!
        $robots = file_get_contents($url_robots);
        if(preg_match_all('/sitemap: ([a-z \_\-\/\:\.]+)/i', $robots, $matches))
            $url_sitemap = $matches[1][0];

    } else $url_sitemap = 'http://'. $url_raw . '/sitemap.xml';


    if(valida($url_sitemap)){
        $_SESSION['pontos'] += 4;
        $status = "sitemap";
        $wrong = false;
    } else {
        $status = "!sitemap";
        $wrong = true;
    }

    $_SESSION['sitemapUrl'] = $url_sitemap;
    $_SESSION['sitemapStatus'] = $status;
    $_SESSION['sitemapWrong'] = $wrong;

?>