<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once __DIR__ . "/BancoDeDados.php";
require_once __DIR__ . "/Usuario.php";

$banco = new BancoDeDados();
$usuario = new Usuario($banco);
$usuarioCarregado = false;

if(isset($_SESSION['usuarioId']) && isset($_SESSION['tipo_usuario'])) {
    if($usuario->carregarUsuario($_SESSION['usuarioId'], $_SESSION['tipo_usuario'])) {
        $usuarioCarregado = true;
    }
}
?>