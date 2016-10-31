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
        document.location = 'dashboard_inicio_profissional.php';
      }
      function login_failed(){
        document.location = 'auth.php';
      }
    </script>
  </head>

  <body>
  <?php
    $login = $_POST['login'];
    $senha = $_POST['password'];

    $sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE login = '$login' and senha = '$senha'");

    $row = mysqli_fetch_row($sql);
    var_dump($row);
    if($row !== NULL){
      session_start();
      $_SESSION['login'] = $row[2];
      $_SESSION['senha'] = $row[3];
      $_SESSION['id'] = $row[0];

      echo "<script> login_successfully() </script>";
    } else {
      echo "<script> login_failed()</script>";
    }
  ?>
  </body>
</html>
