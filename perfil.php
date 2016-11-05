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
      function update_successfully(){
        document.location = 'dashboard_meuperfil.php';
      }
      function remove_successfully(){
        document.location = 'auth.php';
      }
    </script>
  </head>

  <body>
  <?php
    session_start();
    $id = $_SESSION['id'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $nivel_de_acesso = $_POST['nivel_de_acesso'];
    $email = $_POST['email'];

    echo $id;
    echo $nome;
    echo $login;
    echo $senha;
    echo $cpf;
    echo $rg;
    echo $endereco;
    echo $nivel_de_acesso;
    echo $email;


    if ($_POST['action'] == 'Atualizar dados') {
    $_SESSION["login"] = $login;
    $_SESSION["senha"] = $senha;

    $sql = "UPDATE usuarios SET nome='" .$nome. "', login= '" .$login. "', senha= '" .$senha. "', cpf= '" .$cpf. "', rg= '" .$rg. "', endereco= '" .$endereco. "', email= '" .$email. "' WHERE id='" .$id. "'";
    $result = mysqli_query($conexao, $sql);

    if($result){
      echo "<script> update_successfully() </script>";
    }

    } else if ($_POST['action'] == 'Remover minha conta') {
        $sql = "DELETE FROM usuarios WHERE id = '$id'";

        $result = mysqli_query($conexao, $sql);
        if($result){
          if($nivel_de_acesso == 'Profissional'){
            $sql_pro = "DELETE FROM profissional WHERE User_id = '$id'";
            mysqli_query($conexao, $sql_pro);
          }
          echo "<script> remove_successfully() </script>";
        }
      } else if ($_POST['action'] == 'Atualizar dados profissionais'){

      echo "entrou!";

      $telefone = $_POST['telefone'];

      $ingles = $_POST['english'];
      $nivel_ingles = $_POST['english_level'];
      $experiencia = $_POST['experiencia'];
      $especialidade = $_POST['especialidade'];

      echo $ingles;
      echo $nivel_ingles;
      echo $experiencia;
      echo $especialidade;


      $update_sql = "UPDATE profissional SET ingles='".$ingles."', ingles_nivel='".$nivel_ingles."', especialidade= '".$especialidade."', experiencia= '".$experiencia."', telefone= '".$telefone."' WHERE user_id='".$_SESSION['id']."'";
      $result = mysqli_query($conexao, $update_sql);

      if($result){
        echo "<script> update_successfully() </script>";
      }
    }
  ?>
  </body>
</html>
