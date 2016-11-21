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
    text-align: center;
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
        <?php
        session_start();
        $id = $_SESSION['id'];

        $sql = "SELECT nivel FROM usuarios WHERE id='$id'";
        $result = mysqli_query($conexao, $sql);
        if($result){
          $result_temp = mysqli_fetch_row($result);
          $result_temp = $result_temp[0];
          switch($result_temp){
            case 1:
            echo "<li><a href=\"dashboard_relatorio_entradas.php\">Relatório de Entradas</a></li>";
            break;

            case 2:

            break;

            case 3:
            echo "<li><a href=\"dashboard_minhasconexoes.php\">Minhas Conexões</a></li>";
            break;
          }
        }
        ?>
        <li><a href="dashboard_meustrabalhos.php">Meus trabalhos</a></li>
        <li><a href="auth.php">Sair</a></li>
      </ul>
    </nav>
    <article>
      <h2>Relatório de Entradas</h2>
      <form action="relatorio_de_entradas.php" method="post" align="center">
        Digite a quantidade de itens que você deseja filtrar para gerar o relatório:
        <br>
        <input name="number" type="text">
        <input type="submit" value="Gerar Relatório">
      </form>
      <div align="center">
        <?php
        $value = $_POST['number'];

        if(is_numeric($value)){
          $i = 1;
          echo "<table>";
          echo "<tr>";
          echo "<th>Nº</th>";
          echo "<th>Website</th>";
          echo "<th>Website Contagem</th>";
          echo "<th>Nº</th>";
          echo "<th>Palavra-chave</th>";
          echo "<th>Palavra-chave Contagem</th>";
          echo "</tr>";

          $sql = "SELECT * FROM url_count ORDER BY count DESC LIMIT $value";
          $result = mysqli_query($conexao, $sql);

          $sql_keyword = "SELECT * FROM keyword_count ORDER BY count DESC LIMIT $value";
          $result_keyword = mysqli_query($conexao, $sql_keyword);

          if($result){
            while($row = mysqli_fetch_array($result))
            {
              $row_keyword = mysqli_fetch_array($result_keyword);
              echo "<tr>";
              echo "<th>" . $i . "</th>";
              echo "<td>" .  $row[0] . "</td>";
              echo "<td>" .  $row[1] . "</td>";
              echo "<th>" . $i . "</th>";
              echo "<td>" .  $row_keyword[0] . "</td>";
              echo "<td>" .  $row_keyword[1] . "</td>";
              echo "<tr>";
              $i = $i + 1;
            }
          }




          echo "</table>";
        } else {
          echo "<h1>Digite um número válido!</h1>";
        }
        ?>
      </div>
    </article>
    <footer>Copyright © SEOFuturo.com</footer>
  </div>
</body>
</html>
