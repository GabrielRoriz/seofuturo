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
  }

  table {
    border-collapse: collapse;
    width: 100%;
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
      </ul>
    </nav>
    <article>
      <h2> Buscar Profissionais</h2>
      <form action="search_profissional.php" method="post">

        <input id="input_search"  type="text" name="textsearch">
        <input type="submit" value="Pesquisar">
        <select id="select_search" name="filter_search">
          <option value="name">Nome</option>
          <option value="exp">Experiência em Programação</option>
          <option value="esp">Especialidades</option>
        </select>
      </form>

      <?php
      $textsearch = $_POST['textsearch'];
      $filter_search = $_POST['filter_search'];

      if($filter_search == 'name'){

        $sql = "SELECT id FROM usuarios WHERE nome LIKE '%$textsearch%' and nivel = '3'";

      } else if($filter_search == 'exp'){
        $sql = "SELECT user_id FROM profissional WHERE experiencia LIKE '%$textsearch%'";
      } else if($filter_search == 'esp'){
        $sql = "SELECT user_id FROM profissional WHERE especialidade LIKE '%$textsearch%'";
      }
      $result = mysqli_query($conexao, $sql);


      echo "<table>";
      echo "<tr>";
      echo "<th> Nome </th>";
      echo "</tr>";

      while($linha = mysqli_fetch_array($result)){
        if($filter_search == 'exp' || $filter_search == 'esp' ){
          $id_user = $linha['user_id'];
        } else {
          $id_user = $linha['id'];
        }

        $sql_fromUser = "SELECT * FROM usuarios WHERE id = '$id_user'";
        $resultUser = mysqli_query($conexao, $sql_fromUser);
        while($linhaUser = mysqli_fetch_array($resultUser)){
          echo "<tr>";
          echo "<td>" . $linhaUser['nome'] . "</td>";
          echo "</tr>";
        }


      }
        echo "</table>";
      ?>
    </article>
    <footer>Copyright © SEOFuturo.com</footer>
  </div>
</body>
</html>
