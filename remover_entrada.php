<html>
  <head>
    <title>Carregando...</title>
    <script type="text/javascript">
      function login_successfully(){
        document.location = 'dashboard_minhasentradas.php';
      }
      function login_failed(){
        document.location = 'dashboard_minhasentradas.php';
      }
    </script>
  </head>

  <body>
  <?php
    $entrada_id = $_GET['id'];
    echo $entrada_id;
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
    $sql = mysqli_query($conexao, "DELETE FROM entradas WHERE entrada_id = '$entrada_id'");

    if($sql){
      echo "<script> login_successfully() </script>";
    } else {
      echo "<script> login_failed()</script>";
    }
  ?>
  </body>
</html>
