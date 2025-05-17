<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "/opt/lampp/htdocs/Nutricao/controller/UsuarioDAO.php";
require_once "/opt/lampp/htdocs/Nutricao/model/BancoDeDados.php";
require_once "/opt/lampp/htdocs/Nutricao/model/CapturarDadosCadastro.php";
require_once "/opt/lampp/htdocs/Nutricao/model/ValidarVerificarSenha.php";
require_once "/opt/lampp/htdocs/Nutricao/model/ValidarEmail.php";
require_once "/opt/lampp/htdocs/Nutricao/model/ValidarDataDeNascimento.php";
require_once "/opt/lampp/htdocs/Nutricao/model/ValidarNome.php";

$banco = new BancoDeDados();
$dao = new UsuarioDAO($banco);
$capturar = new CapturarDadosCadastro();
$verificarSenha = new ValidarVerificarSenha();
$validarEmail = new ValidarEmail();
$validarDataNascimento = new ValidarDataDeNascimento();
$validarNome = new ValidarNome();
$camposVazios = [];
$erros = [];
$errosSenha = [];
$contaCriadaComSucesso = false;

if($capturar->capturarDadosDeCadastro('usuario')) {
    if(!$validarNome->validar($capturar->getNome())) {
        $erros[] = "Nome inválido";
    }

    if(!$validarEmail->validar($capturar->getEmail())) {
        $erros[] = "Email inválido";
    }

    $errosSenha = $verificarSenha->validar($capturar->getSenha(), $capturar->getConfirmarSenha());

    if(!$validarDataNascimento->validar($capturar->getDataNascimento())) {
        $erros[] = "Data de nascimento inválida";
    }

    if($dao->cadastrar($capturar->getNome(),$capturar->getEmail(),$capturar->getSenha(),$capturar->getConfirmarSenha(),$capturar->getDataNascimento(),$capturar->getSexo())) {
        $contaCriadaComSucesso = true;
    }
} else {
    $camposVazios = $capturar->getErros();
}
?>