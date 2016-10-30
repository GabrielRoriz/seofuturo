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
        <li><a href="#">Início</a></li>
        <li><a href="#">Meu Perfil</a></li>
        <li><a href="dashboard_realizerteste_profisisonal">Realizar Teste</a></li>
      </ul>
    </nav>
    <article>
      <form action="signin.php" method="post">
        <h2>REALIZAR TESTE</h2>
          <label for="name">Login: </label><input type="text" name="login" />
          <label for="name">Nome: </label><input type="text" name="password" />
          <input type="submit" value="Entrar"/>
          <input type="submit" value="Salvar Entrada"/>
      </form>
    </article>

    <footer>Copyright © SEOFuturo.com</footer>
  </div>
</body>
</html>
