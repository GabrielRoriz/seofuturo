<head>
	<meta charset="UTF-8">
	<title> Cadastro</title>
</head>
<body>
  <?php
    $account_type = $_POST['account-type'];
    $nome = $_POST['name'];
    $login = $_POST['login'];
    $senha = $_POST['password'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];

    switch($account_type){
  case 'adm':
      echo 'Adm!';
      echo '<form class="colform" action="main.php" method="post">
        <h2> Olá, ' . $nome . '</h2>
        <h3> Preencha seus dados para que o cadastro seja realizado </h3>
     <p>Login: <input type="text" name="login" /></p>
     <p>Senha: <input type="text" name="password" /></p>
     <p><input type="submit" value="Entrar"/></p>
    </form>';
  break;
  case 'client':
      echo 'Client!';
      echo '<form class="colform" action="main.php" method="post">
        <h2> Cadastrar Cliente</h2>
     <p>Login: <input type="text" name="login" /></p>
     <p>Senha: <input type="text" name="password" /></p>
     <p><input type="submit" value="Entrar"/></p>
    </form>';
  break;
  case 'pro':
      echo 'Pro!';
      echo '<form class="colform" action="main.php" method="post">
        <h2> Olá, ' . $nome . '</h2>
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
