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
    $text = $_POST['textreceive'];

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

    echo $_SESSION['id'];
    echo $_SESSION['worker_id'];

    $sql = mysqli_query($conexao, "UPDATE trabalho SET description = '$text' WHERE client_id= ". $_SESSION['id']. " and worker_id='" . $_SESSION['worker_id']. "'");

    if($sql){
      echo "<script> login_successfully() </script>";
    } else {
      echo "ERRO!";
    }
  ?>
  </body>
</html>
