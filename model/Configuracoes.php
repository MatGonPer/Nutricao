<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once __DIR__ . "/../controller/UsuarioDAO.php";
require_once __DIR__ . "/ValidarVerificarSenha.php";

$banco = new BancoDeDados();
$usuario = new Usuario($banco);
$dao = new UsuarioDAO($banco);
$validarSenha = new ValidarVerificarSenha();
$senhaAlterada = false;

$usuario->carregarUsuario($_SESSION['usuarioId'], $_SESSION['tipo_usuario']);

//Alterar senha do usuario
if(isset($_POST['botaoConfirmar'])) {

    if(isset($_POST['alterarSenha']) && !empty($_POST['alterarSenha'])) {

        $novaSenha = $_POST['alterarSenha'];
        $erros = [];
        $erros = $validarSenha->validar($novaSenha, $novaSenha);

        if(empty($erros)) {

            $hash = $validarSenha->gerarHash($novaSenha);
            $dados = [
                "senha" => $hash
            ];

            if($dao->inserirDados($_SESSION['tipo_usuario'], $dados, $_SESSION['usuarioId'])) {
                $senhaAlterada = true;
            }
        }
    
    }
}

if($senhaAlterada) {
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}

//Deletar conta do usuario

if(isset($_POST['deletarConta'])) {

    if($dao->deletarConta($_SESSION['tipo_usuario'], $_SESSION['usuarioId'])) {
        header("Location: landing-page.php");
        exit();
    }
}
?>