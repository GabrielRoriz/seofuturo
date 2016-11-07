<html>
  <head>
    <title>Carregando...</title>
    <script type="text/javascript">
      function login_successfully(){
        document.location = 'dashboard_meustrabalhos.php';
      }
      function login_failed(){
        document.location = 'dashboard_meustrabalhos.php';
      }
    </script>
  </head>

  <body>
  <?php
    $worker_id = $_GET['worker_id'];
    $client_id = $_GET['client_id'];

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
    $sql = mysqli_query($conexao, "DELETE FROM trabalho WHERE worker_id = '$worker_id' and client_id = '$client_id'");

    if($sql){
      echo "<script> login_successfully() </script>";
    } else {
      echo "<script> login_failed()</script>";
    }
  ?>
  </body>
</html>
