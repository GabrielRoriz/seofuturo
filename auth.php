<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Tela Inicial</title>
   <link rel="stylesheet" type="text/css" href="style_auth.css">
</head>
<body>

  <form class="colform" action="signin.php" method="post">
		<h2>Entrar</h2>
 <label for="login"> Login:</label><input type="text" name="login" />
 <label for="name">Nome:</label><input type="text" name="password" />
 <input type="submit" value="Entrar"/>
</form>


<form class="colform" action="signup.php" method="post">
	<h2> Cadastrar</h2>
	<label for="name">Nome: </label> <input type="text" name="name"/>
	<label for="login">Login: </label> <input type="text" name="login"/>
	<label for="senha">Senha: </label> <input type="text" name="password"/>
	<label for="email">E-mail: </label> <input type="text" name="email"/>
	<label for="cpf">CPF: </label> <input type="text" name="cpf"/>
	<label for="rg">RG: </label> <input type="text" name="rg"/>
	<label for="endereco">Endereco: </label> <input type="text" name="endereco"/>

	<select name="account-type">
	  <option value="administrador">Administrador</option>
	  <option value="cliente">Cliente</option>
	  <option value="profissional">Profissional</option>
	</select>
	<br>
	<input type="submit" value="Cadastrar"/>
</form>

</body>
</html>
