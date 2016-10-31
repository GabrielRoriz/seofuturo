<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title> Dashboard | Meu Perfil</title>
   <link rel="stylesheet" type="text/css" href="style_dashboard.css">
</head>
<body>

  <div class="container">
    <header>
       <h1>SEOFuturo</h1>
    </header>
    <nav>
      <ul>
        <li><a href="dashboard_inicio_profissional.php">Início</a></li>
        <li><a href="dashboard_meuperfil_profissional.php">Meu Perfil</a></li>
        <li><a href="dashboard_realizarteste_profissional.php">Realizar Teste</a></li>
        <li><a href="dashboard_minhasentradas_profissional.php">Minhas Entradas</a></li>
      </ul>
    </nav>

    <article>
      <form class="colform" action="update_perfil.php" method="post">
      <h2> Meu perfil</h2>
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

        session_start();
        $login = $_SESSION["login"];
        $senha = $_SESSION["senha"];
        $sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE login = '$login' and senha = '$senha'");

        $row = mysqli_fetch_row($sql);

        if (!$sql) {
          echo 'Não foi possível executar a consulta:';
          exit;
        } else {


          foreach($row as $value){
            switch (array_search($value, $row)) {
              case 0:
                echo "<label for=\"id\">Id: </label>";
                echo "<input type=text name=\"id\" value=" . $value . "></input>";
                break;

              case 1:
                echo "<label for=\"nome\">Nome: </label>";
                echo "<input type=text name=\"nome\" value=" . $value . "></input>";
                break;

              case 2:
                echo "<label for=\"login\">Login: </label>";
                echo "<input type=text name=\"login\" value=" . $value . "></input>";
                break;

              case 3:
                echo "<label for=\"senha\">Senha: </label>";
                echo "<input type=text name=\"senha\" value=" . $value . "></input>";
                break;

              case 4:
                echo "<label for=\"cpf\">C.P.F: </label>";
                echo "<input type=text name=\"cpf\" value=" . $value . "></input>";
                break;

              case 5:
                echo "<label for=\"rg\">R.G: </label>";
                echo "<input type=text name=\"rg\" value=" . $value . "></input>";
                break;

              case 6:
                echo "<label for=\"endereco\">Endereço: </label>";
                echo "<input type=text name=\"endereco\" value=" . $value . "></input>";
                break;

              case 7:
                echo "<label for=\"nivel_de_acesso\">Nível de Acesso: </label>";
                echo "<input type=text name=\"nivel_de_acesso\" value=" . $value . "></input>";
                break;

              case 8:
                echo "<label for=\"email\">E-mail: </label>";
                echo "<input type=text name=\"email\" value=" . $value . "></input>";
                break;

            }
          }
        }
      ?>
      <input type="submit" value="Atualizar Dados" style="width: 19em;height: 2em;"/>
     </form>
    </article>
    <footer>Copyright © SEOFuturo.com</footer>
  </div>
</body>
</html>
