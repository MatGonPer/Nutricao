<?php

class Usuario {

    private string $id;
    private string $email;
    private string $senha;
    private string $tipoUsuario;
    private string $nome;
    private string $sexo;
    private string $dataDeNascimento;
    private string $dataDeCadastro;
    private bool $status;
    private string $telefone;
    private BancoDeDados $banco;

    public function __construct(BancoDeDados $banco) {
        $this->banco = $banco;
    }

    public function carregarUsuario(string $id, string $tipoUsuario) : bool {
        if(!$this->banco->conectar()) {
            return false;
        }

        $dados = [
            'id' => $id,
            'tipo_usuario' => $tipoUsuario
        ];

        $resultado = $this->banco->consultar($tipoUsuario, $dados);

        if($resultado && !empty($resultado[0])) {
            $this->id = $resultado[0]['id'];
            $this->email = $resultado[0]['email'];
            $this->senha = $resultado[0]['senha'];
            $this->tipoUsuario = $resultado[0]['tipo_usuario'];
            $this->nome = $resultado[0]['nome'];
            $this->sexo = $resultado[0]['sexo'];
            $this->dataDeNascimento = $resultado[0]['data_de_nascimento'];
            $this->dataDeCadastro = $resultado[0]['data_de_cadastro'];
            $this->status = $resultado[0]['status'];

            return true;
        }

        return false;
    }

    
    public function atualizarFotoPerfil(string $id, string $filename) : bool {
        if(!$this->banco->conectar()) {
            return false;
        }

        $dados = [
            'id' => $id,
            'foto_perfil' => $filename
        ];

        return $this->banco->atualizar('usuario', $dados, 'id = :id');
    }


    public function getId() : string {
        return $this->id;
    }

    public function setId(string $id) {
        $this->id = $id;
    }
    
    public function getEmail() : string {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function getSenha() : string {
        return $this->senha;
    }

    public function setSenha(string $senha) {
        $this->senha = $senha;
    }

    public function getTipoUsuario() : string {
        return $this->tipoUsuario;
    }

    public function setTipoUsuario(string $tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getNome() : string {
        return $this->nome;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function getSexo() : string {
        return $this->sexo;
    }

    public function setSexo(string $sexo) {
        $this->sexo = $sexo;
    }

    public function getDataDeNascimento() : string {
        return $this->dataDeNascimento;
    }

    public function setDataDeNascimento(string $dataDeNascimento) {
        $this->dataDeNascimento = $dataDeNascimento;
    }

    public function getDataDeCadastro() : string {
        return $this->dataDeCadastro;
    }

    public function setDataDeCadastro(string $dataDeCadastro) {
        $this->dataDeCadastro = $dataDeCadastro;
    }

    public function getStatus() : string {
        return $this->status;
    }

    public function setStatus(bool $status) {
        $this->status = $status;
    }

    public function getTelefone() : string {
        return $this->telefone;
    }

    public function setTelefone(string $telefone) {
        $this->telefone = $telefone;
    }
}

?>