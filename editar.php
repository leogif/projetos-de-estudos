<?php
	require("config/config.php");
	require("funcoes/usuarios.php");
	$usuario = editaUsuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gerenciador de Usuários</title>
</head>

<body>
	<?php editaUsuario(); ?>
	
	<h1>Editar Usuário</h1>
	<form method="POST">
		<label for="nome">Nome:</label>
		<input type="text" name="nome" value="<?php echo $usuario['nome']; ?>"> <br> <br>

		<label for="email">E-mail:</label>
		<input type="email" name="email" value="<?php echo $usuario["email"] ?>"> <br> <br>

		<input type="submit" value="Editar">

	</form>
</body>
</html>