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
    $text = $_POST['nota'];
    $worker_id = $_POST['workerid'];
    $id = $_SESSION['id'];

    $sql = mysqli_query($conexao, "UPDATE trabalho SET nota = '". $text . "' WHERE client_id='" . $id . "' and worker_id= '" . $worker_id. "'");
    if($sql){
      echo "<script> login_successfully() </script>";
    } else {
      echo "ERRO!";
    }
  ?>
  </body>
</html>
