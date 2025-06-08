<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/ValidarVerificarSenha.php";

//Classe feita para capturar a entrada de dados do formulário de cadastro
class CapturarDadosCadastro {

//Os atributos da classe serão onde ficará armazenado os dados capturas pelo formulário
    private string $nome = '';
    private string $email = '';
    private string $senha = '';
    private string $confirmarSenha = '';
    private string $dataNascimento = '';
    private string $sexo = '';
    private string $tipoUsuario = '';
    private array $erros = [];

//Essa função serve para verificar se o usuário enviou o formulário, verifica se os campos foram enviados vazios
//Se não estão vazios, insere os dados capturados nos atributos da classe e retonar true
//Se estiverem vazios, incorretos, ou o campo de senha e confirmar senha estiverem diferentes retorna false
//O parâmetro tipo_usuario só pode ter esse 4 valores: 'administrador', 'usuario', 'nutricionista', 'personal'
    public function capturarDadosDeCadastro(string $tipoUsuario) : bool {

        //Verifica se o formulário foi submetido e se os campos estão vazios, se estiverem retornar false
        if(!isset($_POST['submit'])) {
            return false;
        }
        if(empty($_POST['nome'])) {
            $this->erros[] = 'Nome não inserido';
        } 
        if(empty($_POST['email'])) {
            $this->erros[] = 'Email não inserido';
        }
        if(empty($_POST['senha'])) {
            $this->erros[] = 'Senha não inserida';
        }
        if(empty($_POST['confirmarSenha'])) {
            $this->erros[] = 'Confirmar senha não inserida';
        }
        if(empty($_POST['dataNascimento'])) {
            $this->erros[] = 'Data de nascimento não inserida';
        }
        if(empty($_POST['sexo'])) {
            $this->erros[] = 'Gênero não inserido';
        } 
        if(!empty($this->erros)) {
            return false;
        }
        
        //Insere os dados capturados via POST nos atributos da classe
        $this->nome = $_POST['nome'];
        $this->email = $_POST['email'];
        $this->senha = $_POST['senha'];
        $this->confirmarSenha = $_POST['confirmarSenha'];
        $this->dataNascimento = $_POST['dataNascimento'];
        $this->sexo= $_POST['sexo'];
        if(isset($_POST['tipoParceiro'])) {
            $this->tipoUsuario = $_POST['tipoParceiro'];
        } else {
            $this->tipoUsuario = $tipoUsuario;
        }
        return true;     
    }

    //Essa função serve para criar um array chave/valor, usando os atributos da classe, utilize apenas quando os dados forem
    //capturados e validados corretamente, esse array serve para inserir os dados em uma tabela no bando de dados usando a classe BancoDados
    public function criarArrayDadosDeCadastro() : array {
        $dados = [
            'nome' => "$this->nome",
            'sexo' => "$this->sexo",
            'data_de_nascimento' => "$this->dataNascimento",
            'email' => "$this->email",
            'senha' => "$this->senha",
            'tipo_usuario' => "$this->tipoUsuario"
        ];

        return $dados;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getConfirmarSenha() {
        return $this->confirmarSenha;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }
    
    public function getErros() : array {
        return $this->erros;
    }

}

?>