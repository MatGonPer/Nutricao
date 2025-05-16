<?php
//Essa classe serve para capturar os dados do login do usuário
class CapturarDadosLogin {

    private string $email = '';
    private string $senha = '';
    private array $erros = [];
    private string $tipoUsuario = '';

    public function capturarDados($tipoUsuario) : bool {
        //Verifica se o usuário deu submit, e verifica se os campos de email e senha estão vazios
        //Se não tiver submitado, ou se estiverem vazios, retornar false
        if(!isset($_POST['submit'])) {
            return false;
        }
        if(empty($_POST['email'])) {
            $this->erros[] = "Email não inserido!";
        } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->erros[] = "Email inválido!";
        }
        if(empty($_POST['senha'])) {
            $this->erros[] = "Senha não inserida!";
        }
        if(!empty($this->erros)) {
            return false;
        }
        //Insere os dados do formulário nos atributos da classe
        $this->email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $this->senha = $_POST['senha'];
        $this->tipoUsuario = $tipoUsuario;
        return true;
    }

    public function getErros() : array {
        return $this->erros;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }
    
    public function getSenha() {
        return $this->senha;
    }
}
?>