<?php
	function valida($url)
	{
    	$fp=@fopen($url,"r");
    	if($fp) return true;
    	else return false;
	}

	function keyword ($text, $keyword) 
	{
		$text = str_replace(" ","",$text);

		$pattern = "/". $keyword ."/"; 
		$keyword_matches = array(); 
	
		$result = preg_match($pattern, $text, $keyword_matches); 

		if($result > 0) return true; 
		else return false;
	}
	function get_post_action($name)
	{
    	$params = func_get_args();

    	foreach ($params as $name) {
        	if (isset($_POST[$name])) {
            	return $name;
        	}
    	}
	} 
?>