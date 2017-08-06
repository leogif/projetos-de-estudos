<?php
	function listaUsuarios(){
		global $pdo;
		$sql = "SELECT * FROM usuarios";
		$sql = $pdo->query($sql);
		if($sql->rowCount() > 0){
			foreach($sql->fetchAll() as $usuarios){
				echo '<tr>';
				echo '<td>'.ucfirst($usuarios["nome"]).'</td>';
				echo '<td>'.$usuarios["email"].'</td>';
				echo '<td> <a href="editar.php?id='.$usuarios["id"].'">Editar</a> - <a href="excluir.php?id='.$usuarios["id"].'">Excluir</a> </td>';
				echo '</tr>';
			}  
		}
	}

	function adicionaUsuario(){
		global $pdo;
		if(isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"])){ 
			if(isset($_POST["nome"]) && !empty($_POST["nome"])){
				$nome = addslashes($_POST["nome"]);
				$email = addslashes($_POST["email"]);
				$senha = md5(addslashes($_POST["senha"]));

				$verificaEmail = "SELECT * FROM usuarios WHERE email = '$email'";
				$verificaEmail = $pdo->query($verificaEmail);

				if ($verificaEmail->rowCount() > 0 ) {
					echo "E-mail já cadastrado";
				}else{
					$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
					$sql = $pdo->query($sql);
					header("Location: index.php");
				}
			}
		}else{
				header("Location: index.php");
		}
	}

	function editaUsuario(){
		global $pdo;
		if(isset($_GET["id"]) && !empty($_GET["id"])){
			$id = addslashes($_GET["id"]);
		}

		if(isset($_POST["nome"]) && !empty($_POST["email"])){
			$nome = addslashes($_POST["nome"]);
			$email = addslashes($_POST["email"]);

			$sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = '$id'";
			$sql = $pdo->query($sql);

			header("Location: index.php");
		}

		$sql = "SELECT * FROM usuarios WHERE id = '$id'";
		$sql = $pdo->query($sql);
		if($sql->rowCount() > 0){
			$dado = $sql->fetch();
		}else{
			header("Location: index.php");
		}

		return $dado;
	}

	function excluiUsuario(){
		global $pdo;
		if(isset($_GET["id"]) && !empty($_GET["id"])){
			$id = addslashes($_GET["id"]);
			
			$sql = "DELETE FROM usuarios WHERE id = '$id'";
			$sql = $pdo->query($sql);

			header("Location: index.php");

		}else{
			header("Location: index.php");
		}
	}

	function login(){
		global $pdo;
		if(isset($_POST["email"]) && !empty($_POST["email"])){
			$email = addslashes($_POST["email"]);
			$senha = md5(addslashes($_POST["senha"]));

			$sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
			$sql = $pdo->query($sql);

			if($sql->rowCount() > 0){
				$dados = $sql->fetch();
				$_SESSION["usuario"] = $dados["nome"];
				header("Location: index.php");
			}else{
				echo "Usuário ou senha inválida";
			}
		}
	}

	function logout(){
		session_destroy();
		header("Location: index.php");
	}
