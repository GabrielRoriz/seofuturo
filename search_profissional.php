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
      echo "<th>Nome </th>";
      echo "<th>Inglês </th>";
      echo "<th>Nível do Inglês </th>";
      echo "<th>Telefone </th>";
      echo "<th>Experiência em Programação</th>";
      echo "<th>Especialidade</th>";
      echo "<th>Iniciar Atividade de Trabalho</th>";
      echo "<th>Conexão</th>";
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

          $sql_fromProfissional = "SELECT * FROM profissional WHERE user_id = '$id_user'";
          $resultProfissional = mysqli_query($conexao, $sql_fromProfissional);
          $linhaProfissional = mysqli_fetch_row($resultProfissional);

          echo "<tr>";
          echo "<td>" . $linhaUser['nome'] . "</td>";
          if($linhaProfissional[2] == 1){
            echo "<td> X </td>";
            switch ($linhaProfissional[3]) {
              case 1:
              echo "<td>Básico</td>";
              break;

              case 2:
              echo "<td>Intermediário baixo</td>";
              break;
              case 3:
              echo "<td>Intermediário médio</td>";
              break;
              case 4:
              echo "<td>Intermediário alto</td>";
              break;
              case 5:
              echo "<td>Avançado</td>";
              break;
              case 6:
              echo "<td>Fluente</td>";
              break;

            }

          } else if($linhaProfissional[2] == 2){
            echo "<td> - </td>";
            echo "<td> - </td>";
          }

          echo "<td>" . $linhaProfissional[4] . "</td>";
          echo "<td>" . $linhaProfissional[5] . "</td>";
          echo "<td>" . $linhaProfissional[6] . "</td>";
          echo "<td><a href=\"work.php?worker_id=" . $linhaProfissional[0] . "&id= ".$_SESSION['id']."'\">  Iniciar Atividade de Trabalho </a></td>";
          echo "<td><a href=\"realize_connection.php?worker_id=" . $linhaProfissional[0] . "&id= ".$_SESSION['id']."'\">Realizar Conexão</a></td>";
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
