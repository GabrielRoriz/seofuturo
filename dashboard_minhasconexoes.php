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
  }

  table {
    border-collapse: collapse;
    width: 100%;
    text-align: center;
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
      <h2> Minhas Conexões</h2>
      <?php
      $sql = "SELECT prof_id FROM profissional WHERE user_id='$id'";
      $result = mysqli_query($conexao, $sql);
      if($result){
        $prof_id = mysqli_fetch_row($result);
        $prof_id = $prof_id[0];
      }

      $sql = "SELECT prof_id, data FROM conexoes WHERE user_id = '$prof_id'";
      $result = mysqli_query($conexao, $sql);
      if($result){
        echo "<table>";
        echo "<tr>";
        echo "<th> Nome </th>";
        echo "<th> Endereco </th>";
        echo "<th> E-mail </th>";
        echo "<th> Telefone </th>";
        echo "<th> Inglês </th>";
        echo "<th> Nível de Inglês </th>";
        echo "<th> Experiência </th>";
        echo "<th> Especialidade </th>";
        echo "<th> Remover Conexão </th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)) {

          $prof_row_id = $row['prof_id'];


          $sqlProf = "SELECT user_id, ingles, ingles_nivel,telefone,experiencia,especialidade FROM profissional WHERE prof_id='$prof_row_id'";

          $resultado = mysqli_query($conexao, $sqlProf);
          if($resultado){
              $rowID = mysqli_fetch_row($resultado);
              $id_de_user_do_prof = $rowID[0];
              $ingles = $rowID[1];
              $ingles_nivel = $rowID[2];
              $telefone = $rowID[3];
              $exp = $rowID[4];
              $esp = $rowID[5];
          }





            $sqlProf = "SELECT * FROM usuarios WHERE id='$id_de_user_do_prof'";
            $resultado = mysqli_query($conexao, $sqlProf);
            if($resultado){
              $linha = mysqli_fetch_row($resultado);
              $nome = $linha[1];
              $endereco = $linha[6];
              $email = $linha[8];
            }





          echo "<tr>";
          echo "<td> ".$nome ." </td>";
          echo "<td> ".$endereco ." </td>";
          echo "<td> ".$email ." </td>";
          echo "<td> ". $telefone . " </td>";
          if($ingles == 1){
             echo "<td> Sim </td>";
          } else {
            echo "<td> Não </td>";
          }

          switch ($ingles_nivel) {
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
          echo "<td>". $exp ."</td>";
          echo "<td>". $esp ."</td>";
          echo "<td> <a href=\"remove_connection.php?user_id=".$prof_id."&prof_id=".$prof_row_id."\">Remover conexão</a></td>";
          echo "</tr>";
        }
      }
      echo "</table>"
      ?>

    </form>
  </article>
  <footer>Copyright © SEOFuturo.com</footer>
</div>
</body>
</html>
