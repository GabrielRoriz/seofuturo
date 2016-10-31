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
        <li><a href="dashboard_inicio_profissional.php">Início</a></li>
        <li><a href="dashboard_meuperfil_profissional.php">Meu Perfil</a></li>
        <li><a href="dashboard_realizarteste_profissional.php">Realizar Teste</a></li>
        <li><a href="dashboard_minhasentradas_profissional.php">Minhas Entradas</a></li>
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
