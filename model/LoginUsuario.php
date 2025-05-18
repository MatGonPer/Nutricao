<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
//Se o usuário quando logou anteriormente clicou no botão lembrar-me, loga-se automaticamente 
if(isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header('Location: dashboard-usuario.php');
    exit();
}

require_once "CapturarDadosLogin.php";
require_once __DIR__ . "/../controller/UsuarioDAO.php";
require_once "BancoDeDados.php";

$bancoDeDados = new BancoDeDados();
$usuarioDAO = new UsuarioDAO($bancoDeDados);
$capturarDados = new CapturarDadosLogin();
$resultado = false;
$id = '';

//Tenta capturar os dados do formulário
if($capturarDados->capturarDados('usuario')) {
    $hash = '';
    $hash = $usuarioDAO->consultarHash($capturarDados->getEmail());
    if(empty($hash)) {
        $resultado = false;
    } else {
        if(password_verify($capturarDados->getSenha(), $hash)) {
            $dados = [
                "email" => $capturarDados->getEmail(),
                "senha" => $hash,
                "tipo_usuario" => "usuario"
            ];

            if($usuarioDAO->consultarDados($dados) === true) {
                $id = $usuarioDAO->recuperarId($capturarDados->getEmail());
                $resultado = true;
            } else {
                $resultado = false;
            }
        }
        
        
    }
}

//Se a consulta ao banco foi um sucesso, e o usuário selecionou o botão remember-me, seta logado para true, e loga o usuario
if(isset($_POST['submit']) && $resultado === true && isset($_POST['remember-me']) && !empty($id)) {
    //UsuarioId serve pra guarda o Id do usuário para as outras páginas lembrarem de qual usuário mostrar as informações
    $_SESSION['usuarioId'] = $id;
    $_SESSION['logado'] = true;
    $_SESSION['email'] = $dadosFormulario->getEmail();
    $_SESSION['tipo_usuario'] = 'usuario';
    header('Location: dashboard-usuario.php');
    exit();
}

//Se a consulta ao banco foi um sucesso, e o usuario não selecionou o botão remember-me
if(isset($_POST['submit']) === true && $resultado === true && !empty($id)) {
    //UsuarioId serve pra guarda o Id do usuário para as outras páginas lembrarem de qual usuário mostrar as informações
    $_SESSION['usuarioId'] = $id;
    header('Location: dashboard-usuario.php');
    exit();
}
?>