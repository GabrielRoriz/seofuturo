<!DOCTYPE html>
  <html lang="pt-br">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
      <title>SEO Metrics</title>

      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>

    <?php require 'header.php'; ?>

      <div class="section no-pad-bot index-banner blue-grey darken-4" id="index-banner">
        <div class="container">
          <div class="hide-on-small-only"><br><br></div>
          <h3 class="center white-text header-h3">Analise, otimize e converta</h3>
          <h5 class="center white-text header-h5">Em poucos passos gere um relatório personalizado sobre a situação atual do SEO do seu e-commerce</h5>
          <br>


          <div class="row">


            <form name="form1" method="post" action="resultado.php">
              <div class="input-field col s8 offset-s2 website_url">
                <input type ="text" NAME="urlPlace" placeholder="Digite aqui sua URL">
              </div>

              <input type ="hidden" NAME="visible">

              <div class="input-field col s8 offset-s2 website_url">
                <input type ="text" NAME="keyPlace" placeholder="Digite aqui sua palavra chave">
                </div>
              </div>
              <br>
              <div class="row ">

              <div class="col s12 center">
                <button type="submit" value="Enviar">  Teste agora  </button>
              </div>
            </form>

              <br><br><br>
            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

    </body>
  </html>
