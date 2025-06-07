<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once __DIR__ . "/BancoDeDados.php";
require_once __DIR__ . "/Usuario.php";

$banco = new BancoDeDados();
$perfil = new Usuario($banco);
$sucesso = false;

if(isset($_SESSION['usuarioId']) && isset($_SESSION['tipo_usuario'])) {
    if($perfil->carregarUsuario($_SESSION['usuarioId'], $_SESSION['tipo_usuario'])) {
        $sucesso = true;
    }
}

if(isset($_POST['submit']) && isset($_POST['nome'])) {
    $perfil->setNome($_POST['nome']);
}

if(isset($_POST['submit']) && isset($_POST['email'])) {
    $perfil->setEmail($_POST['email']);
}

if(isset($_POST['submit']) && isset($_POST['telefone'])) {
    $perfil->setTelefone($_POST['telefone']);
}
?>