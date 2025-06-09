<?php
$banco = new BancoDeDados();
$usuario = new Usuario($banco);

$usuario->carregarUsuario($_SESSION['usuarioId'], $_SESSION['tipo_usuario']);
?>