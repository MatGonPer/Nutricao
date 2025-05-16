<?php

require "../../model/BancoDeDados.php";
require "../../model/ValidarVerificarSenha.php";
require "../../model/ValidarDataDeNascimento.php";
require "../../model/ValidarEmail.php";
require "../../model/ValidarNome.php";

class UsuarioDAO {

    private array $erros = [];

    public function cadastrar(string $nome, string $email, string $senha, string $cSenha, string $dataNasc, string $sexo) : bool {
        //Validar nome
        $validarNome = new ValidarNome();
        $nomeSanitizado = $validarNome->sanitizar($nome);
        if(!$validarNome->validar($nomeSanitizado)) {
            $this->erros[] = "Nome inválido";
            return false;
        }

        //Validar email
        $validarEmail = new ValidarEmail();
        $emailSanitizado = $validarEmail->sanitizar($email);
        if(!$validarEmail->validar($emailSanitizado)) {
            $this->erros[] = 'Email inválido';
            return false;
        }

        //Validar senha
        $validarSenha = new ValidarVerificarSenha();
        $errosSenha = $validarSenha->validar($senha, $cSenha);
        if(!empty($errosSenha)) {
            $this->erros = array_merge($this->erros, $errosSenha);
            return false;
        }
        $hashSenha = $validarSenha->gerarHash($senha);

        //Verificar validade da data nascimento
        $validarData = new ValidarDataDeNascimento();
        if(!$validarData->validar($dataNasc)) {
            $this->erros[] = 'Data de nascimento inválida';
            return false;
        }

        //Validar o sexo do usuario
        $sexo = strtoupper(trim($sexo));
        if(!in_array($sexo, ['M', 'F', 'P'])) {
            $this->erros[] = "Sexo inválido";
            return false;
        }

        $dados = [
            'nome' => $nomeSanitizado,
            'email' => $emailSanitizado,
            'senha' => $hashSenha,
            'data_de_nascimento' => $dataNasc,
            'sexo' => $sexo,
            'tipo_usuario' => 'usuario'
        ];

        $banco = new BancoDeDados();
        if(!$banco->conectar()) {
            $this->erros[] = "Erro de conexão com banco";
            return false;
        }

        if(!$banco->inserir('usuario', $dados)) {
            $this->erros[] = "Erro ao  inserir usuário";
            return false;
        }

        $banco->desconectar();
        return true;
    }

    public function consultar(BancoDeDados $banco, array $dados) : bool {
        if(!$banco->conectar()) {
            return false;
        }
        if(!$banco->consultar('usuario', $dados)) {
            return false;
        }
        $banco->desconectar();
        return true;
    }

    public function atualizar() {

    }

    public function deletar() {

    }
}
?>