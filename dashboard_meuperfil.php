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
        <li><a href="dashboard_inicio.php">Início</a></li>
        <li><a href="dashboard_meuperfil.php">Meu Perfil</a></li>
        <li><a href="dashboard_realizarteste.php">Realizar Teste</a></li>
        <li><a href="dashboard_minhasentradas.php">Minhas Entradas</a></li>
        <li><a href="dashboard_buscarprofissionais.php">Buscar Profissionais</a></li>
      </ul>
    </nav>

    <article>
      <form class="colform" action="perfil.php" method="post">
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
                //echo "<label for=\"id\">Id: </label>";
                $id_user = $value;
                //echo "<text name=\"id\" value=" . $value . "></input>";
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
                $nivel_de_acesso = $value;
                switch ($nivel_de_acesso) {
                    case 1:
                      echo "<input type=text name=\"nivel_de_acesso\" value=\"Administrador\"></input>";
                      break;

                    case 2:
                      echo "<input type=text name=\"nivel_de_acesso\" value=\"Cliente\"></input>";
                      break;

                    case 3:
                      echo "<input type=text name=\"nivel_de_acesso\" value=\"Profissional\"  readonly=\"readonly\"></input>";
                      break;
                }
                break;

              case 8:
                echo "<label for=\"email\">E-mail: </label>";
                echo "<input type=text name=\"email\" value=" . $value . "></input>";
                break;
            }
          }
        }
      ?>
      <input type="submit" name="action" value="Atualizar dados" style="width: 19em;height: 2em;"/>
      <input type="submit" name="action" value="Remover minha conta" style="width: 19em;height: 2em;"/>
     </form>


      <?php

      switch ($nivel_de_acesso) {
        case 1:
          break;
        case 2:
          break;
        case 3:


        $sql = mysqli_query($conexao, "SELECT * FROM profissional WHERE user_id = '$id_user'");

        $row = mysqli_fetch_assoc($sql);

        $prof_id = $row['prof_id'];
        $user_id = $row['user_id'];
        $ingles = $row['ingles'];
        $ingles_nivel = $row['ingles_nivel'];
        $telefone = $row['telefone'];
        $experiencia = $row['experiencia'];
        $especialidade = $row['especialidade'];

        echo "<form class=\"colform\" action=\"perfil.php\" method=\"post\">
            <h2> Dados Profissionais</h2>
             <label for=\"telefone\">Telefone: </label><input type=text name=\"telefone\" value='$telefone'></input>
            <label for= \"english\">Fala em Inglês: </label><select name=\"english\" autofocus='$ingles'>
                 <option value=\"1\">Sim</option>
                 <option value=\"2\">Não</option>
               </select>
             <select name=\"english_level\" autofocus='$ingles_nivel'>
               <option value=\"1\">Básico</option>
               <option value=\"2\">Intermediário baixo</option>
               <option value=\"3\">Intermediário médio</option>
               <option value=\"4\">Intermediário alto</option>
               <option value=\"5\">Avançado</option>
               <option value=\"6\">Fluente</option>
             </select>
             <br>Experiências com programação:
             <br>
             <input type=text name=\"experiencia\" class=\"input_longbox\" value='$experiencia'></input>
             <br> Especialidades:
             <br>
             <input type=text name=\"especialidade\" class=\"input_longbox\" value='$especialidade'></input>
             <input type=\"submit\" name=\"action\" value=\"Atualizar dados profissionais\" style=\"width: 19em;height: 2em;\"/>
           </form>";
          break;
      }
     ?>
    </article>
    <footer>Copyright © SEOFuturo.com</footer>
  </div>
</body>
</html>
