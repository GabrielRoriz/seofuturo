<?php 
	$status = "alt";
	$matches = array();
	$url_content =  $_SESSION['url_content'];
	$url = $_SESSION['url'];
	$wrong = false;
	$noAltCount = 0;
	$url_raw = $_SESSION['url_raw'];

	$pattern = '/<[\s]*img(.*?)[\s\/]*>/i';
	$matches = array();
	preg_match_all($pattern, $url_content, $matches); //

	$image_count = count($matches[1]);
	$no_alt_count = 0;

	$src_matches = array();

	for ($i = 0; $i < $image_count; $i++) { 
		if(!keyword($matches[1][$i], 'alt')){
			$no_alt_count++;
			$status = "!alt";
			$wrong = true;
			preg_match('/src="([^"]+)"/i', $matches[1][$i], $src_matches);
			$_SESSION['pontos'] += 9;
		}
	}

	$_SESSION['imagesStatus'] = $status;
    $_SESSION['imagesWrong'] = $wrong;
    $_SESSION['imagesNoAltCount'] = $noAltCount;
    $_SESSION['imagesImageCount'] = $image_count;
    $_SESSION['imagesMatches'] = $matches;
    $_SESSION['imagesSrcMatches'] = $src_matches;
 ?>