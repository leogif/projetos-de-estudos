<?php
session_start();

$banco = "mysql:dbname=blog;host=localhost;charset=utf8";
$user = "root";
$pass = "";

try{
	$pdo = new PDO($banco, $user, $pass);
	
} catch (PDOException $e){
	echo "Conexão falhou: ".$e->getMessage();
}