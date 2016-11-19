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
<html>
<head>
  <meta charset="UTF-8">
  <title> Dashboard | Início</title>
  <link rel="stylesheet" type="text/css" href="style_dashboard.css">
  <style>
  table, td, th {
    border: 1px solid black;
    text-align: center;
  }

  table {
    border-collapse: collapse;
    width: 88.5%;
    margin-top: 20px;
  }

  th {
    height: 50px;
  }
  </style>
</head>
<body>

  <div class="container">
    <header>
      <h1>SEOFuturo</h1>
    </header>
    <nav>

      <ul>
        <li><a href="dashboard_inicio.php">Início</a></li>
        <li><a href="dashboard_meuperfil.php">Meu Perfil</a></li>
        <li><a href="dashboard_realizarteste.php">Realizar Teste</a></li>
        <li><a href="dashboard_minhasentradas.php">Minhas Entradas</a></li>
        <li><a href="dashboard_buscarprofissionais.php">Buscar Profissionais</a></li>
        <?php
        session_start();
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM profissional WHERE user_id='$id'";
        $result = mysqli_query($conexao, $sql);
        if($result){
          $result_temp = mysqli_fetch_row($result);
          if(!empty($result_temp)){
            echo "<li><a href=\"auth.php\">Minhas Conexões</a></li>";
          }
        }
        ?>
        <li><a href="dashboard_meustrabalhos.php">Meus trabalhos</a></li>
        <li><a href="auth.php">Sair</a></li>
      </ul>
    </nav>
    <article>
      <h2> Meus Trabalhos</h2>
      <?php
      $id = $_SESSION['id'];
      $login = $_SESSION['login'];
      $senha = $_SESSION['senha'];
      $nivel = $_SESSION['nivel'];
      /*echo $id;
      echo $login;
      echo $senha;
      echo $nivel;
      echo "<br>";
      echo $worker_id;*/

      if($nivel == 2){
        $sql = "SELECT * FROM trabalho WHERE client_id = '$id'";
        $result = mysqli_query($conexao, $sql);
        if($result){
          echo "<table>";
          echo "<tr>";
          echo "<th> Profissional </th>";
          echo "<th> Descrição </th>";
          echo "<th> Nota </th>";
          echo "<th> Status </th>";
          echo "<th> Remover Trabalho </th>";
          echo "</tr>";

          while($linha = mysqli_fetch_array($result)){
            echo "<tr>";

            echo "<td>";
            echo $linha['worker_id'];
            echo "</td>";

            echo "<td>";
            echo $linha['description'];
            echo "</td>";

            echo "<td>";

            if($linha['nota'] == -1 && $linha['status'] == 2){
              echo "<form action=\"dar_nota_trabalho.php\" method=\"post\">";
              echo "<br> <input type=\"text\" name=\"nota\"></input>
              <br><input type=\"hidden\" name=\"workerid\" value=\"". $linha['worker_id'] ."\"/>
              <br><input type=\"submit\" name=\"action\" value=\"Atribuir Nota\" class=\"bt_work\"/>
              </form>";
            } else if($linha['nota'] == 1){
              echo " - ";

            } else {
              echo $linha['nota'];
            }

            echo "</td>";

            echo "<td>";
            switch ($linha['status']) {
              case 0:
              echo "Em espera";
              break;

              case 1:
              echo "Em atividade";
              break;

              case 2:
              echo "Finalizado";
              break;
            }
            echo "</td>";

            echo "<th>";
            echo "<a href=\"remover_trabalho.php?worker_id=" . $linha['worker_id'] . "&client_id=" . $id ."\">  Remover este trabalho </a>";
            echo "</th>";

            echo "</tr>";
          }
          echo "</table>";

        }
      } else if ($nivel == 3) {
        $sqlPro = "SELECT prof_id FROM profissional WHERE user_id = '$id'";
        $resultado = mysqli_query($conexao, $sqlPro);
        $row = mysqli_fetch_row($resultado);

        $prof_id = $row[0];

        $sql = "SELECT * FROM trabalho WHERE worker_id = '$prof_id'";
        $result = mysqli_query($conexao, $sql);
        if($result){
          echo "<table>";
          echo "<tr>";
          echo "<th> Cliente </th>";
          echo "<th> Descrição </th>";
          echo "<th> Nota </th>";
          echo "<th> Status </th>";
          echo "<th> Remover Trabalho </th>";
          echo "</tr>";

          while($linha = mysqli_fetch_array($result)){
            echo "<tr>";

            echo "<td>";
            echo $linha['client_id'];
            echo "</td>";

            echo "<td>";
            echo $linha['description'];
            echo "</td>";

            echo "<td>";

            if($linha['nota'] == -1 && $linha['status'] == 2){
              echo "Aguardando nota...";

            } else if ($linha['nota'] == -1){
              echo " - ";

            } else {
              echo $linha['nota'];
            }

            echo "</td>";

            echo "<td>";
            switch ($linha['status']) {
              case 0:
              echo "Em espera";
              echo "<br>";
              echo "<a href=\"avancar_trabalho.php?worker_id=" . $prof_id . "&client_id=" . $linha['client_id'] ."&status=".$linha['status']."\">  INICIAR ATIVIDADE </a>";
              break;

              case 1:
              echo "Em atividade";
              echo "<br>";
              echo "<a href=\"avancar_trabalho.php?worker_id=" . $prof_id . "&client_id=" . $linha['client_id'] ."&status=".$linha['status']."\"> FINALIZAR ATIVIDADE </a>";
              break;

              case 2:
              echo "Finalizado";
              break;
            }
            echo "</td>";

            echo "<th>";
            echo "<a href=\"remover_trabalho.php?worker_id=" . $prof_id . "&client_id=" . $linha['client_id'] ."\">  Remover este trabalho </a>";
            echo "</th>";

            echo "</tr>";
          }
          echo "</table>";
        }
      }
      ?>
    </article>
    <footer>Copyright © SEOFuturo.com</footer>
  </div>
</body>
</html>
