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
    $url = $_POST['website'];
    $keyword = $_POST['palavra_chave'];

    $sql = "SELECT count FROM url_count WHERE url='$url'";
    $result = mysqli_query($conexao, $sql);

    if($result){
      $count = mysqli_fetch_array($result);
      if($count === null){
        $sql_insert = "INSERT INTO url_count (url) VALUES ('$url')";
        $result = mysqli_query($conexao, $sql_insert);
        if($result){
          echo "<script> login_successfully()</script>";
        }
      } else {
        $count = $count[0];
        $count = $count + 1;
        $sql_update = "UPDATE url_count SET count='$count' WHERE url='$url'";
        $result_update = mysqli_query($conexao, $sql_update);
        if($result_update){
          echo "<script> login_successfully() </script>";
        }
      }
    }

    $sql = "SELECT count FROM keyword_count WHERE keyword='$keyword'";
    $result = mysqli_query($conexao, $sql);

    if($result){
      $count = mysqli_fetch_array($result);
      if($count === null){
        $sql_insert = "INSERT INTO keyword_count (keyword) VALUES ('$keyword')";
        $result = mysqli_query($conexao, $sql_insert);
        if($result){
          echo "<script> login_successfully()</script>";
        }
      } else {
        $count = $count[0];
        $count = $count + 1;
        $sql_update = "UPDATE keyword_count SET count='$count' WHERE keyword='$keyword'";
        
        $result_update = mysqli_query($conexao, $sql_update);
        if($result_update){
          echo "<script> login_successfully() </script>";
        }
      }
    }







    //REALIZAR TESTE
  } else {
    //invalid action!
  }
  ?>
</body>
</html>
