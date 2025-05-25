<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "../../model/BancoDeDados.php";
require_once __DIR__ . "../../model/ValidarVerificarSenha.php";
require_once __DIR__ . "../../model/ValidarDataDeNascimento.php";
require_once __DIR__ . "../../model/ValidarEmail.php";
require_once __DIR__ . "../../model/ValidarNome.php";

class ParceiroDAO {

    private array $erros = [];
    private BancoDeDados $banco;

    public function __construct(BancoDeDados $banco) {
        $this->banco = $banco;
    }

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
            'tipo_usuario' => 'parceiro'
        ];

        if(!$this->banco->conectar()) {
            $this->erros[] = "Erro de conexão com banco";
            return false;
        }

        if(!$this->banco->inserir('parceiro', $dados)) {
            $this->erros[] = "Erro ao  inserir usuário";
            return false;
        }

        $this->banco->desconectar();
        return true;
    }

    public function consultarDados(array $dados) : bool {
        if(!$this->banco->conectar()) {
            return false;
        }
        if(!$this->banco->consultar('parceiro', $dados)) {
            return false;
        }
        $this->banco->desconectar();
        return true;
    }

    public function consultarId(string $id) : bool {
        $dados = [
            'id' => $id
        ];

        if(!$this->banco->conectar()) {
            return false;
        }
        if(!$this->banco->consultar('parceiro', $dados)) {
            return false;
        }
        $this->banco->desconectar();
        return true;
    }

    public function consultarHash(string $email) : string {
        $dados = [
        'email' => $email
        ];

        if(!$this->banco->conectar()) {
            return '';
        }

        $resultado = $this->banco->consultar('parceiro', $dados);

        if(empty($resultado)) {
            $this->banco->desconectar();
            return '';
        }

        $hash = $resultado[0]['senha'];
        $this->banco->desconectar();

        return $hash;
    }

    public function recuperarId(string $email) : string {
            $dados = [
            'email' => $email
        ];
    
        if(!$this->banco->conectar()) {
            return '';
        }

        $resultado = $this->banco->consultar('parceiro', $dados);
    
        if(empty($resultado)) {
            $this->banco->desconectar();
            return '';
        }

        $id = $resultado[0]['id'];
        $this->banco->desconectar();
    
        return $id;
    }

    public function atualizar() {

    }

    public function deletar() {

    }
}
?>