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
  #input_search{
    width: 75%;
  }
  #select_search{
    width: 88.5%;
  }

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

  .input_longbox_w{
    width: 500px;
    height: 250px;
  }
  .bt_work{
    width: 505px;
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

      if($nivel == 2){
        $sql = "INSERT INTO trabalho(client_id, worker_id) VALUES('$id', '$worker_id')";
        $result = mysqli_query($conexao, $sql);
        if($result){
          echo "<form action=\"update_trabalho.php\" method=\"post\">";
          echo "<h2> Descrição do trabalho</h2>
            <br> <input type=\"text\" name=\"textreceive\" class=\"input_longbox_w\"></input>
            <br> <input type=\"submit\" name=\"action\" value=\"Salvar Informações\" class=\"bt_work\"/>
          </form>";
        }
      } else {
        echo "<h2> ERRO! </h2>";
        echo "<h1>Você não é um Cliente!</h1>";
      }?>


    </article>
    <footer>Copyright © SEOFuturo.com</footer>
  </div>
</body>
</html>
