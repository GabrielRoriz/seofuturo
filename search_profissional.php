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
  $textsearch = $_POST['textsearch'];
  $filter_search = $_POST['filter_search'];

  echo $textsearch;
  echo '<br>';
  echo $filter_search;

  /*
  if ($_POST['action'] == 'Atualizar dados') {
    $sql = "UPDATE usuarios SET nome='" .$nome. "', login= '" .$login. "', senha= '" .$senha. "', cpf= '" .$cpf. "', rg= '" .$rg. "', endereco= '" .$endereco. "', email= '" .$email. "' WHERE id='" .$id. "'";
    $result = mysqli_query($conexao, $sql);

    if($result){
      echo "<script> update_successfully() </script>";
    }
  }*/
  ?>
</body>
</html>
