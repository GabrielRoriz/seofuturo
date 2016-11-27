<?php
    $status = "nda";
    $wrong = true;
    $keyword = $_SESSION['keyword'];
    $url_content =  $_SESSION['url_content'];
    $matches = array(); 
  
    $result = preg_match_all('/<h1.*?>([\s\S]*?)<\/h1>/i', $url_content, $matches); 

    if($result === 1){
      $_SESSION['pontos'] += 7;
      $content = $matches[0][0];
      $content = strip_tags($content);
      $keyword_matches = array(); 
      $_SESSION['h1Content'] = $content;
      $result = preg_match_all('/'.$keyword.'/i', $content, $keyword_matches); 

      if($result > 0) {
        $_SESSION['pontos'] += 12;
        $status = "h1&k";
        $wrong = false;
      } else {
        $status = "h1";
      }
    
    } elseif ($result > 1) {
      $status = "h1s";
    }
    else { 
      $status = "!h1";
    }

    $_SESSION['h1Status'] = $status;
    $_SESSION['h1Wrong'] = $wrong;
    
?>
