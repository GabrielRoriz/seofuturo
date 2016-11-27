<?php
    $status = "nda";
    $wrong = true;
    $keyword = $_SESSION['keyword'];
    $url_content =  $_SESSION['url_content'];
    $matches = array(); 
  
    $result = preg_match_all('/<h2.*?>([\s\S]*?)<\/h2>/i', $url_content, $matches); 

    if($result){
      $_SESSION['pontos'] += 5;
      $content = $matches[1][0];
      $keyword_matches = array(); 
      $_SESSION['h2Content'] = $content;
      $result = preg_match_all('/'.$keyword.'/i', $content, $keyword_matches); 
      if($result) {
        $_SESSION['pontos'] += 8;
        $status = "h2&k";
        $wrong = false;
      } else {
        $status = "h2";
      }
    } else { 
      $status = "!h2";
    }

    $_SESSION['h2Status'] = $status;
    $_SESSION['h2Wrong'] = $wrong;
    
?>
