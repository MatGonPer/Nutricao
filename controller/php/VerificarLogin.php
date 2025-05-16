<?php
require "../../model/BancoDeDados.php";
class VerificarLogin {

    private BancoDeDados $banco;

    public function __construct() {
        $this->banco = new BancoDeDados();
    }

    public function verificarLogin(string $tabela, string $email, string $senha, string $tipoUsuario) : bool {
        
        if(empty($email) || empty($senha) || empty($tipoUsuario)) {
            error_log("Parâmetros de login inválidos");
            return false;
        }

        if(!$this->banco->conectar()) {
            error_log("Falha na conexão com banco");
            return false;
        }

        $dados = [
            "email" => $email,
            "tipo_usuario" => $tipoUsuario
        ];

        $resultado = $this->banco->consultar($tabela, $dados);

        error_log("Email tentando login: " . $email);
        error_log("Resultado da consulta: " . print_r($resultado, true));

         if(empty($resultado) || count($resultado) !== 1) {
            $this->banco->desconectar();
            return false;
         }

        $hash = $resultado[0]['senha'];
        if(empty($hash)) {
            error_log("Hash da senha não encontrado");
            $this->banco->desconectar();
            return false;
        }

        $senhaCorreta = password_verify($senha, $hash);
    
        // Debug da verificação da senha
        error_log("Hash do banco: " . $hash);
        error_log("Senha fornecida: " . $senha);
        error_log("Resultado verificação: " . ($senhaCorreta ? 'true' : 'false'));

        $this->banco->desconectar();
        return $senhaCorreta;
    }
}
?>