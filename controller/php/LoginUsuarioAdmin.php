<?php
session_start();
//Se o usuário quando logou anteriormente clicou no botão lembrar-me, loga-se automaticamente 
if(isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header('Location: landing-page.php');
    exit();
}

require "../../controller/php/CapturarDadosLogin.php";
require "../../model/BancoDados.php";
//Tenta capturar os dados do formulário
$dadosFormulario = new CapturarDadosLogin();
$resultado = false;
//Tenta capturar os dados do formulário
if($dadosFormulario->capturarDados('usuario')) {
    //Cria um objeto do BancoDados e tenta conectar-se a ele
    $banco = new BancoDados;
    if($banco->conectarBanco()) {
        //Verifica se email e senha fornecidos pelo usuario constam no banco da dados.
        if($banco->consultarDados('usuario', $dadosFormulario->getEmail(), $dadosFormulario->getSenha())) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        $banco->fecharConexao();
    }
}
//Se a consulta ao banco foi um sucesso, e o usuário selecionou o botão remember-me, seta logado para true, e loga o usuario
if(isset($_POST['submit']) && $resultado === true && isset($_POST['remember-me'])) {
    $_SESSION['logado'] = true;
    $_SESSION['email'] = $dadosFormulario->getEmail();
    $_SESSION['tipo_usuario'] = 'usuario';
    header('Location: landing-page.php');
    exit();
}
//Se a consulta ao banco foi um sucesso, e o usuario não selecionou o botão remember-me
if(isset($_POST['submit']) === true && $resultado === true) {
    header('Location: landing-page.php');
    exit();
}

?>