<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/../controller/ParceiroDAO.php";
require_once __DIR__ . "/../model/BancoDeDados.php";
require_once __DIR__ . "/../model/CapturarDadosCadastro.php";
require_once __DIR__ . "/../model/ValidarVerificarSenha.php";
require_once __DIR__ . "/../model/ValidarEmail.php";
require_once __DIR__ . "/../model/ValidarDataDeNascimento.php";
require_once __DIR__ . "/../model/ValidarNome.php";

$banco = new BancoDeDados();
$dao = new ParceiroDAO($banco);
$capturar = new CapturarDadosCadastro();
$verificarSenha = new ValidarVerificarSenha();
$validarEmail = new ValidarEmail();
$validarDataNascimento = new ValidarDataDeNascimento();
$validarNome = new ValidarNome();
$camposVazios = [];
$erros = [];
$errosSenha = [];
$contaCriadaComSucesso = false;
$contaJaExiste = false;

if($capturar->capturarDadosDeCadastro('parceiro')) {
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

    if(empty($erros) && empty($errosSenha)) {
        $dados = [
            "email" => $capturar->getEmail(),
        ];

        if($dao->consultarDados($dados)) {
            $contaJaExiste = true;
        } else {
            if($dao->cadastrar($capturar->getNome(),$capturar->getEmail(),$capturar->getSenha(),$capturar->getConfirmarSenha(),$capturar->getDataNascimento(),$capturar->getSexo())) {
                $contaCriadaComSucesso = true;
            }
        }
    } 

} else {
    $camposVazios = $capturar->getErros();
}
?>