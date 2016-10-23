<html>
<head>
  <title>Cadastro</title>
</head>

<body>
<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $banco = "seofuturo";
  $conexao = mysqli_connect($host, $user, $pass, $banco);

  if (!$conexao) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
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

  $sql = mysqli_query($conexao, "INSERT INTO usuarios(nome, login, senha, cpf, rg, endereco, nivel, email)
  VALUES('$nome', '$login', '$senha', '$cpf', '$rg', '$endereco', '$account_type', '$endereco')");
?>
</body>

</html>
