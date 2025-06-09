<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once __DIR__ . "/BancoDeDados.php";
require_once __DIR__ . "/Usuario.php";
require_once __DIR__ . "/../controller/UsuarioDAO.php";

$banco = new BancoDeDados();
$perfil = new Usuario($banco);
$dao = new UsuarioDAO($banco);
$sucesso = false;

if(isset($_SESSION['usuarioId']) && isset($_SESSION['tipo_usuario'])) {
    if($perfil->carregarUsuario($_SESSION['usuarioId'], $_SESSION['tipo_usuario'])) {
        $sucesso = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && $sucesso === true) {
    $dadosParaAtualizar = [];

    if (!empty($_POST['nome'])) {
        $dadosParaAtualizar['nome'] = $_POST['nome'];
    }
    if (!empty($_POST['email'])) {
        $dadosParaAtualizar['email'] = $_POST['email'];
    }
    if(!empty($_POST['sobreMim'])) {
        $dadosParaAtualizar['sobre_mim'] = $_POST['sobreMim'];
    }
    if (!empty($_POST['telefone'])) {
        $dadosParaAtualizar['telefone'] = $_POST['telefone'];
    }
    if (!empty($_POST['peso'])) {
        $dadosParaAtualizar['peso'] = $_POST['peso'];
    }
    if (!empty($_POST['altura'])) {
        $dadosParaAtualizar['altura'] = $_POST['altura'];
    }

    if (!empty($dadosParaAtualizar)) {
        try {
            if ($dao->inserirDados($perfil->getTipoUsuario(), $dadosParaAtualizar, $_SESSION['usuarioId'])) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        } catch (Exception $e) {
            error_log("Erro ao atualizar dados do perfil: " . $e->getMessage());
        }
    }
}
?>