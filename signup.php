<html>
<head>
  <title>Cadastro</title>
  <link rel="stylesheet" type="text/css" href="style_index.css">
</head>

<body>

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

  $nome = $_POST['name'];
  $login = $_POST['login'];
  $senha = $_POST['password'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $rg = $_POST['rg'];
  $endereco = $_POST['endereco'];
  $account_type = $_POST['account-type'];

  echo '<h2> Olá, ' . $nome . '</h2>';

  $sql = mysqli_query($conexao, "INSERT INTO usuarios(nome, login, senha, cpf, rg, endereco, nivel, email)
  VALUES('$nome', '$login', '$senha', '$cpf', '$rg', '$endereco', '$account_type', '$email')");
  switch($account_type){
  case 'administrador':
    echo '<form class="colform" action="main.php" method="post">
      <h3> Preencha seus dados para que o cadastro seja realizado </h3>
   <p>Login: <input type="text" name="login" /></p>
   <p>Senha: <input type="text" name="password" /></p>
   <p><input type="submit" value="Entrar"/></p>
  </form>';
break;
case 'cliente':
    echo '<form class="colform" action="main.php" method="post">
      <h2> Cadastrar Cliente</h2>
   <p>Login: <input type="text" name="login" /></p>
   <p>Senha: <input type="text" name="password" /></p>
   <p><input type="submit" value="Entrar"/></p>
  </form>';
break;
case 'profissional':
    echo '<form class="colform" action="main.php" method="post">
      <h3> Preencha seus dados para que o cadastro seja realizado: </h3>
   <p>Login: <input type="text" name="login" /></p>
   <p>Senha: <input type="text" name="password" /></p>
   <p><input type="submit" value="Entrar"/></p>
  </form>';
break;
default:
// Something went wrong or form has been tampered.
}
?>
</body>
</html>
