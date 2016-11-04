<html>
  <head>
    <title>Carregando...</title>
    <script type="text/javascript">
      function login_successfully(){
        document.location = 'dashboard_realizarteste.php';
      }
      function login_failed(){
        document.location = 'dashboard_inicio.php';
      }
    </script>
  </head>

  <body>
  <?php
    if ($_POST['action'] == 'Salvar Entrada') {

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

      $website = $_POST['website'];
      $palavra_chave = $_POST['palavra_chave'];

      session_start();
      $id = $_SESSION['id'];

      $sql = mysqli_query($conexao, "INSERT INTO entradas(usuario_id, website, chave)
      VALUES('$id', '$website', '$palavra_chave')");

      var_dump($row);
      if($sql){
        echo "<script> login_successfully() </script>";
      } else {
        echo "<script> login_failed()</script>";
      }

    } else if ($_POST['action'] == 'Realizar Teste') {
        //REALIZAR TESTE
    } else {
        //invalid action!
    }
  ?>
  </body>
</html>
