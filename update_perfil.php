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

<html>
  <head>
    <title>Carregando...</title>
    <script type="text/javascript">
      function login_successfully(){
        document.location = 'dashboard_meuperfil_profissional.php';
      }
      function login_failed(){

      }
    </script>
  </head>

  <body>
  <?php
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $nivel_de_acesso = $_POST['nivel_de_acesso'];
    $email = $_POST['email'];

    echo "<br>" . $id;
    echo "<br>" . $nome;
    echo "<br>" . $login;
    echo "<br>" . $senha;
    echo "<br>" . $cpf;
    echo "<br>" . $rg;
    echo "<br>" . $endereco;
    echo "<br>" . $nivel_de_acesso;
    echo "<br>" . $email;

    $sql = "UPDATE usuarios SET nome='" .$nome. "', login= '" .$login. "', senha= '" .$senha. "', cpf= '" .$cpf. "', rg= '" .$rg. "', endereco= '" .$endereco. "', email= '" .$email. "' WHERE id='" .$id. "'";

    //$sql = "UPDATE ususarios SET nome='". "$nome' .", login=" . '$login' . ", senha='$senha', cpf='$cpf', rg='$rg', endereco='$endereco' WHERE id='$id'";
    $result = mysqli_query($conexao, $sql);
      echo "<script> login_successfully() </script>";
  ?>
  </body>
</html>
