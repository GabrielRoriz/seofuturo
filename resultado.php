<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "seofuturo";
$conexao = mysqli_connect($host, $user, $pass, $banco);
if (!$conexao) {
  echo "<br> Error: Unable to connect to MySQL." . PHP_EOL;
  echo "<br> Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "<br> Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}

?>

<!DOCTYPE html>
<html lang = "pt-br">
<head>

  <title>Resultado do Teste</title>
  <script type="text/javascript">
  function login_successfully(){
    document.location = 'dashboard_minhasentradas.php';
  }
  </script>

  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style_resultados.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!--Let browser know website is optimized for mobile-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
  <?php
  session_start();
  if ($_POST['action'] == "Salvar Entrada") {
    $website = $_POST['website'];
    $palavra_chave = $_POST['palavra_chave'];
    $id = $_SESSION['id'];

    $sql = mysqli_query($conexao, "INSERT INTO entradas(usuario_id, website, chave)
    VALUES('$id', '$website', '$palavra_chave')");

    if($sql){
      echo "<script> login_successfully() </script>";
    } else {
    }
  }
  ?>



  <?php
  include("scripts/functions.php");
  ?>
  <?php
  error_reporting(0);
  session_start();

  $url = $_POST['website'];
  $keyword = $_POST['palavra_chave'];


  $sql = "SELECT count FROM url_count WHERE url='$url'";
  $result = mysqli_query($conexao, $sql);

  if($result){
    $count = mysqli_fetch_array($result);
    if($count === null){
      $sql_insert = "INSERT INTO url_count (url) VALUES ('$url')";
      $result = mysqli_query($conexao, $sql_insert);
      if($result){
      }
    } else {
      $count = $count[0];
      $count = $count + 1;
      $sql_update = "UPDATE url_count SET count='$count' WHERE url='$url'";
      $result_update = mysqli_query($conexao, $sql_update);
      if($result_update){
      }
    }
  }

  $sql = "SELECT count FROM keyword_count WHERE keyword='$keyword'";
  $result = mysqli_query($conexao, $sql);

  if($result){
    $count = mysqli_fetch_array($result);
    if($count === null){
      $sql_insert = "INSERT INTO keyword_count (keyword) VALUES ('$keyword')";
      $result = mysqli_query($conexao, $sql_insert);
      if($result){

      }
    } else {
      $count = $count[0];
      $count = $count + 1;
      $sql_update = "UPDATE keyword_count SET count='$count' WHERE keyword='$keyword'";

      $result_update = mysqli_query($conexao, $sql_update);
      if($result_update){

      }
    }
  }






  if(!preg_match_all('/http/', $url)) $url = 'http://' . $url;

    $_SESSION['pontos'] = 0;
    $_SESSION['url'] = $url;
    $_SESSION['keyword'] = $keyword;
    preg_match_all('/www.(\w+.\w+[\.]+\w+)/', $url, $matches);
    $url_raw = $matches[1];
    $_SESSION['url_content'] = file_get_contents($url);
    $_SESSION['url_raw'] = $url_raw;

    require 'scripts/controller/h1Controller.php';
    require 'scripts/controller/h2Controller.php';
    require 'scripts/controller/robotsController.php';
    require 'scripts/controller/sitemapfController.php';
    require 'scripts/controller/analyticsController.php';
    require 'scripts/controller/googleplusController.php';
    require 'scripts/controller/opengraphController.php';
    require 'scripts/controller/metadescController.php';
    require 'scripts/controller/titleController.php';
    require 'scripts/controller/imagesController.php';
    require 'scripts/controller/keywordController.php';
    require 'scripts/controller/htmlratioController.php';
    require 'scripts/controller/linksController.php';
    ?>

    <main>
      <div class="section summary white-text">
        <div class="container">
          <div class="col s12 result_h5"><h5>Resultado da analise: </h5></div>
          <div class="row">

            <div class="col s12 center url_dest">
              <h3><?php echo $url ?></h3>
              <h5>Palavra chave: <?php echo $keyword ?></h5>
            </div>

            <div class="gap col s12"></div>

            <div class="col s12 score center">
              <h3><?php echo $_SESSION['pontos'] ?></h3>

            </div>
            <div class="gap col s6"></div>
            <div class="col s2 center offset-s5">
              <div class="barra-area">
                <div class="barra">
                  <span class="carga"></span>
                </div>
              </div>
            </div>
            <div class="col s2 right">
              <form method="post" action="resultado.php">
                <?php echo '<input type="hidden" name="urlPlace" value = "'.$url.'">' ?>
                <?php echo '<input type="hidden" name="keyPlace" value = "'.$keyword.'">' ?>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php
      if($keyword == ""){ echo '
        <br><br>
        <div class = "col s12 center" ><i class="center large material-icons">thumb_down</i></div>
        <h4 class = "center"><br>Por favor digite um palavra chave!<h4>
        <h6 class = "center">Exemplo: SEO</h6><br>
        <a href = "index.php" class = "center"><h6>Volte ao início</h6></a><br><br><br>
        ';
      }else {
        if(!preg_match_all('/http/', $url)) {
          $url = 'http://' . $url;
        }

        $fp = @fopen($url,"r");

        if(!$fp) {
          echo '
          <br><br>
          <div class = "col s12 center" ><i class="center large material-icons">thumb_down</i></div>
          <h4 class = "center"><br>Por favor digite uma URL válida!<h4>
          <h6 class = "center">Exemplo: seometrics.com</h6><br>
          <a href = "index.php" ><h6 class = "center">Volte ao início</h6></a><br><br><br>
          ';
        }
        else {

          switch (get_post_action('wrong', '!wrong')) {
            case 'wrong':
            if($_SESSION['h1Wrong']) require 'scripts/view/h1.php';
            if($_SESSION['h2Wrong']) require 'scripts/view/h2.php';
            if($_SESSION['robotsWrong']) require 'scripts/view/robots.php';
            if($_SESSION['sitemapWrong']) require 'scripts/view/sitemapf.php';
            if($_SESSION['analycticsWrong']) require 'scripts/view/analytics.php';
            if($_SESSION['googleWrong']) require 'scripts/view/googleplus.php';
            if($_SESSION['opengraphWrong']) require 'scripts/view/opengraph.php';
            if($_SESSION['metaWrong']) require 'scripts/view/metadesc.php';
            if($_SESSION['titleWrong']) require 'scripts/view/title.php';
            if($_SESSION['imagesWrong']) require 'scripts/view/images.php';
            if($_SESSION['keywordWrong']) require 'scripts/view/keyword.php';
            if($_SESSION['htmlWrong']) require 'scripts/view/htmlratio.php';
            if($_SESSION['linksWrong']) require 'scripts/view/links.php';
            break;

            case '!wrong':
            if(!$_SESSION['h1Wrong']) require 'scripts/view/h1.php';
            if(!$_SESSION['h2Wrong']) require 'scripts/view/h2.php';
            if(!$_SESSION['robotsWrong']) require 'scripts/view/robots.php';
            if(!$_SESSION['sitemapWrong']) require 'scripts/view/sitemapf.php';
            if(!$_SESSION['analycticsWrong']) require 'scripts/view/analytics.php';
            if(!$_SESSION['googleWrong']) require 'scripts/view/googleplus.php';
            if(!$_SESSION['opengraphWrong']) require 'scripts/view/opengraph.php';
            if(!$_SESSION['metaWrong']) require 'scripts/view/metadesc.php';
            if(!$_SESSION['titleWrong']) require 'scripts/view/title.php';
            if(!$_SESSION['imagesWrong']) require 'scripts/view/images.php';
            if(!$_SESSION['keywordWrong']) require 'scripts/view/keyword.php';
            if(!$_SESSION['htmlWrong']) require 'scripts/view/htmlratio.php';
            if(!$_SESSION['linksWrong']) require 'scripts/view/links.php';
            break;

            default:
            require 'scripts/view/h1.php';
            require 'scripts/view/h2.php';
            require 'scripts/view/robots.php';
            require 'scripts/view/sitemapf.php';
            require 'scripts/view/analytics.php';
            require 'scripts/view/googleplus.php';
            require 'scripts/view/opengraph.php';
            require 'scripts/view/metadesc.php';
            require 'scripts/view/title.php';
            require 'scripts/view/images.php';
            require 'scripts/view/keyword.php';
            require 'scripts/view/htmlratio.php';
            require 'scripts/view/links.php';
            break;
          }
        }


      }

      ?>

    </main>
    <script>
    var width = 0;
    var end_width = 82;
    var tempo = 10;
    var carga = document.querySelector('.carga');

    if(end_width <= 30) carga.style.backgroundColor = "#f44336";
    else if (end_width <= 60) carga.style.backgroundColor = "#ffeb3b";
    else carga.style.backgroundColor = "#4caf50";


    var barra = setInterval(function(){
      width = width + 1;
      carga.style.width = width + '%';
      if (width === end_width){
        clearInterval(barra);
        width = 0;
      }
    },tempo);
    </script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.modal-trigger').leanModal();
    });
    </script>


    <!--Import jQuery before materialize.js-->


  </body>
  </html>
