<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title> Dashboard | Minhas Entradas</title>
   <link rel="stylesheet" type="text/css" href="style_dashboard.css">
   <style>
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
        <li><a href="dashboard_meustrabalhos.php">Meus trabalhos</a></li>
      </ul>
    </nav>
    <article>
        <h2> Minhas Entradas</h2>
        <?php
        session_start();
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

        $id = $_SESSION['id'];
        $sql = mysqli_query($conexao, "SELECT website,chave,entrada_id FROM entradas WHERE usuario_id = '$id'");

        if (!$sql) {
          echo 'Não foi possível executar a consulta:';
          exit;
        } else {
          echo "<table>";
            echo "<tr>";
            echo "<th> Website </th>";
            echo "<th> Palavra-chave </th>";
            echo "<th> Remover </th>";
            echo "</tr>";

          while($linha = mysqli_fetch_array($sql)){
            echo "<tr>";

            echo "<th>";
              echo $linha['chave'];
            echo "</th>";

            echo "<th>";
              echo $linha['website'];
            echo "</th>";

            echo "<th>";
            echo "<a href=\"remover_entrada.php?id=" . $linha['entrada_id'] . "\">  Remover esta entrada  </a>";
            echo "</th>";

            echo "</tr>";
          }
          echo "</table>";
        }
        ?>
      </form>
    </article>
    <footer>Copyright © SEOFuturo.com</footer>
  </div>
</body>
</html>
