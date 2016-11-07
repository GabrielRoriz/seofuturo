<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title> Dashboard | Realizar Teste</title>
   <link rel="stylesheet" type="text/css" href="style_dashboard.css">
</head>
<body>

  <div class="container">
    <header>
       <h1>SEOFuturo</h1>
    </header>
    <nav>
      <ul>
        <li><a href="dashboard_inicio.php">Início</a></li>
        <li><a href="dashboard_meuperfil.php">Meu Perfil</a></li>
        <li><a href="dashboard_realizarteste.php">Realizar Teste</a></li>
        <li><a href="dashboard_minhasentradas.php">Minhas Entradas</a></li>
        <li><a href="dashboard_buscarprofissionais.php">Buscar Profissionais</a></li>
        <li><a href="dashboard_meustrabalhos.php">Meus trabalhos</a></li>
      </ul>
    </nav>

    <article>
      <form class="colform" action="teste.php" method="post">
        <h2> Realizar Teste</h2>
          <label for="name">Website: </label><input type="text" name="website" />
          <label for="name">Palavra-chave: </label><input type="text" name="palavra_chave" />
          <input type="submit" name="action" value="Salvar Entrada"/>
          <input type="submit" name="action" value="Realizar Teste"/>
      </form>
    </article>

    <footer>Copyright © SEOFuturo.com</footer>
  </div>
</body>
</html>
