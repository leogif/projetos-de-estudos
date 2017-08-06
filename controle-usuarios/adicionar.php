<?php
	require("config/config.php");
	require("funcoes/usuarios.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gerenciador de Usuários</title>
</head>

<body>
	<?php adicionaUsuario(); ?>
	
	<h1>Insira novo usuário</h1>
	<form method="POST">
		<label for="nome">Nome:</label>
		<input type="text" name="nome"> <br> <br>

		<label for="email">E-mail:</label>
		<input type="email" name="email"> <br> <br>

		<label for="senha">Senha:</label>
		<input type="password" name="senha"> <br> <br>

		<input type="submit" value="Cadastrar">

	</form>
</body>
</html>