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
  $status = $_GET['status'];

  echo $worker_id;
  echo $client_id;
  echo $status;

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
  switch ($status) {
    case 0:
      $sql = mysqli_query($conexao, "UPDATE trabalho SET status = '1' WHERE client_id='" . $client_id . "' and worker_id= '" . $worker_id. "'");
      break;

    case 1:
      $sql = mysqli_query($conexao, "UPDATE trabalho SET status = '2' WHERE client_id='" . $client_id . "' and worker_id= '" . $worker_id. "'");
      break;

    default:
      echo "<script> login_successfully() </script>";
      break;
  }

  if($sql){
    echo "<script> login_successfully() </script>";
  } else {
    echo "<script> login_failed()</script>";
  }
  ?>
</body>
</html>
