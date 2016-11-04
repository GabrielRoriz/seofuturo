<html>
<head>
  <title>Cadastro</title>
  <link rel="stylesheet" type="text/css" href="style_index.css">
  <script type="text/javascript">
    function login_successfully(){
      document.location = 'dashboard_inicio.php';
    }
    function login_failed(){
      document.location = 'auth.php';
    }
  </script>
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

  if($account_type == 'administrador'){
    $id_account_type = 1;
  } else if($account_type == 'cliente'){
    $id_account_type = 2;
  } else if($account_type == 'profissional'){
    $id_account_type = 3;
  }

  $sql = mysqli_query($conexao, "INSERT INTO usuarios(nome, login, senha, cpf, rg, endereco, nivel, email)
  VALUES('$nome', '$login', '$senha', '$cpf', '$rg', '$endereco', '$id_account_type', '$email')");

  $get_id_user = mysqli_query($conexao, "SELECT id FROM usuarios WHERE login = '$login' and senha = '$senha'");
  $row_id = mysqli_fetch_assoc($get_id_user);
  $id_user = $row_id['id'];


  if($id_account_type == 3) {
    $prof_sql = mysqli_query($conexao, "INSERT INTO profissional(user_id) VALUES('$id_user')");
    if(!$prof_sql){
      echo "<script> login_failed()</script>";
    }
  }

  if($sql){
    session_start();
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['id'] = $id_user;
    echo "<script> login_successfully() </script>";
  } else {
    echo "<script> login_failed()</script>";
  }
?>
</body>
</html>
