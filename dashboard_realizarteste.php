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
  <title> Dashboard | Realizar Teste</title>
  <link rel="stylesheet" type="text/css" href="style_dashboard.css">
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
      <form class="colform" action="resultado.php" method="post">
        <h2> Realizar Teste</h2>
        <label for="name">Website: </label><input type="text" name="website" />
        <label for="name">Palavra-chave: </label><input type="text" name="palavra_chave" />
        <input type="submit" name="action" value="Realizar Teste"/>
        <input type="submit" name="action" value="Salvar Entrada"/>
      </form>
    </article>

    <footer>Copyright © SEOFuturo.com</footer>
  </div>
</body>
</html>
