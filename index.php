<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Tela Inicial</title>
   <link rel="stylesheet" type="text/css" href="style_index.css">
</head>
<body>

  <form class="colform" action="action.php" method="post">
    <h2> Entrar</h2>
 <p>Login: <input type="text" name="login" /></p>
 <p>Senha: <input type="text" name="password" /></p>
 <p><input type="submit" value="Entrar"/></p>
</form>

<form class="colform" action="cadastro.php" method="post">
  <h2> Cadastrar</h2>
<p>Nome: <input type="text" name="name" /></p>
<p>Login: <input type="text" name="login" /></p>
<p>Senha: <input type="text" name="password" /></p>
<p>CPF: <input type="text" name="cpf" /></p>
<p>RG: <input type="text" name="rg" /></p>
<p>Endereço: <input type="text" name="endereco" /></p>
<select name="account-type">
  <option value="adm">Administrador</option>
  <option value="client">Cliente</option>
  <option value="pro">Profissional</option>
</select>
<p><input type="submit" value="Cadastrar"/></p>
</form>

</body>
</html>
