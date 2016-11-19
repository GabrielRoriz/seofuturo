<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title> Dashboard | Início</title>
  <link rel="stylesheet" type="text/css" href="style_dashboard.css">
  <style>
  #input_search{
    width: 75%;
  }
  #select_search{
    width: 88.5%;
  }
  </style>
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
        <li><a href="auth.php">Sair</a></li>
      </ul>
    </nav>
    <article>
      <h2> Buscar Profissionais</h2>
      <form action="search_profissional.php" method="post">

        <input id="input_search"  type="text" name="textsearch">
        <input type="submit" value="Pesquisar">
        	<select id="select_search" name="filter_search">
        	  <option value="name">Nome</option>
        	  <option value="exp">Experiência em Programação</option>
            <option value="esp">Especialidades</option>
        	</select>
      </form>
  </article>
  <footer>Copyright © SEOFuturo.com</footer>
</div>
</body>
</html>
