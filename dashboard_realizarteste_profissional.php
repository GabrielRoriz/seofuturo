<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title> Dashboard</title>
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
      </ul>
    </nav>

    <article>
      <form action="#" method="post">
        <h2> Entrada dos Dados</h2>
          <label for="name">Login: </label><input type="text" name="login" />
          <label for="name">Nome: </label><input type="text" name="password" />
          <input type="submit" value="Entrar"/>
          <input type="button" value="Salvar Entrada" style="margin:10px;display: block;"/>
      </form>
    </article>

    <footer>Copyright © SEOFuturo.com</footer>
  </div>
</body>
</html>
