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
      </ul>
    </nav>
    <article>
      <h2> Buscar Profissionais</h2>
      <form action="action_page.php">
        <?php
        //echo date('mY');
        ?>

        <input id="input_search"  type="text" name="firstname" value="Mickey">
        <input type="submit" value="Pesquisar">
        	<select id="select_search" name="filter_search">
        	  <option value="administrador">Nome</option>
        	  <option value="profissional">Experiência em Programação</option>
            <option value="profissional">Especialidades</option>
        	</select>
      </form>
    </form>
  </article>
  <footer>Copyright © SEOFuturo.com</footer>
</div>
</body>
</html>