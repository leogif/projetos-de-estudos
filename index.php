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
	<?php
		if(isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"])){ ?>

			<table border="0" width="100%">
				<tr>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Ações</th>
				</tr>
				<p><?php echo ucfirst($_SESSION["usuario"])?></p>
				<p><a href="logout.php">Sair</a></p>
				<a href="adicionar.php">Adicionar novo usuários</a>
				<?php listaUsuarios(); ?>
				
			</table>

		<?php }else{ ?>
			<form action="login.php" method="POST">
				<label for="email">E-mail</label>
				<input type="email" name="email">

				<label for="senha">Senha</label>
				<input type="password" name="senha"> 

				<input type="submit" value="Login">
			</form>
		<?php }
	?>
</body>
</html> 