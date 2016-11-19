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
        <li><a href="dashboard_meustrabalhos.php">Meus trabalhos</a></li>
        <li><a href="auth.php">Sair</a></li>
      </ul>
    </nav>
    <article>
      <?php
      session_start();
      $id = $_SESSION['id'];
      $login = $_SESSION['login'];
      $senha = $_SESSION['senha'];
      $nivel = $_SESSION['nivel'];
      $worker_id = $_GET['worker_id'];
      $_SESSION['worker_id'] = $worker_id;

      /*echo $id;
      echo $login;
      echo $senha;
      echo $nivel;
      echo "<br>";
      echo $worker_id;*/


      if($nivel == 3){
        $sql = "SELECT prof_id FROM profissional WHERE user_id='$id'";
        $result = mysqli_query($conexao, $sql);
        if($result){
          $prof_id = mysqli_fetch_row($result);
          $prof_id = $prof_id[0];

          $date = new DateTime();
          $data = $date->getTimestamp();
          $sql = "INSERT INTO conexoes(user_id, prof_id, data) VALUES('$prof_id', '$worker_id', '$data')";
          $result = mysqli_query($conexao, $sql);
          if($result){
            //redirecionar para a página de minhas conexões
            echo "Sucesso rapazeada";
          } else {
            echo "Deu problema em criar a conexão";
          }
        } else {
          echo "Deu problema em pegar seus dados";
        }
      } else {
        echo "<h2> ERRO! </h2>";
        echo "<h1>Você não é um Profissional!</h1>";
      }
      ?>


    </article>
    <footer>Copyright © SEOFuturo.com</footer>
  </div>
</body>
</html>
