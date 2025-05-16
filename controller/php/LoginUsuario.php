<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
//Se o usuário quando logou anteriormente clicou no botão lembrar-me, loga-se automaticamente 
if(isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header('Location: dashboard-usuario.php');
    exit();
}

require "../../controller/php/CapturarDadosLogin.php";
require "../../controller/php/VerificarLogin.php";

$dadosFormulario = new CapturarDadosLogin();
$verificarLogin = new VerificarLogin();
$resultado = false;

//Tenta capturar os dados do formulário
if($dadosFormulario->capturarDados('usuario')) {
    error_log("Dados capturados - Email: " . $dadosFormulario->getEmail());
    if($verificarLogin->verificarLogin('usuario', $dadosFormulario->getEmail(), $dadosFormulario->getSenha(), $dadosFormulario->getTipoUsuario())) {
        error_log("Login bem sucedido");
        $resultado = true;
    } else {
        error_log("Login falhou");
        $resultado = false;
    }
}

//Se a consulta ao banco foi um sucesso, e o usuário selecionou o botão remember-me, seta logado para true, e loga o usuario
if(isset($_POST['submit']) && $resultado === true && isset($_POST['remember-me'])) {
    $_SESSION['logado'] = true;
    $_SESSION['email'] = $dadosFormulario->getEmail();
    $_SESSION['tipo_usuario'] = 'usuario';
    header('Location: dashboard-usuario.php');
    exit();
}

//Se a consulta ao banco foi um sucesso, e o usuario não selecionou o botão remember-me
if(isset($_POST['submit']) === true && $resultado === true) {
    header('Location: dashboard-usuario.php');
    exit();
}
?>