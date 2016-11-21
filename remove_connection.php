<html>
  <head>
    <title>Carregando...</title>
    <script type="text/javascript">
      function login_successfully(){
        document.location = 'dashboard_minhasconexoes.php';
      }
      function login_failed(){
        document.location = 'dashboard_minhasconexoes.php';
      }
    </script>
  </head>

  <body>
  <?php
    $user_id = $_GET['user_id'];
    $prof_id = $_GET['prof_id'];

    echo $prof_id;
    echo $user_id;
    
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
    $sql = mysqli_query($conexao, "DELETE FROM conexoes WHERE user_id = '$user_id' and prof_id = '$prof_id'");

    if($sql){
      echo "<script> login_successfully() </script>";
    } else {
      echo "<script> login_failed()</script>";
    }
  ?>
  </body>
</html>
