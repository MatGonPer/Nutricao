<?php
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
    private bool $senhasDiferentes = false;
    private array $erros = [];
    private DateTime $hoje;
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
        $this->hoje = new DateTime();
        $this->nome = $_POST['nome'];
        $this->email = $_POST['email'];
        $this->senha = $_POST['senha'];
        $this->confirmarSenha = $_POST['confirmarSenha'];
        $this->dataNascimento = $_POST['dataNascimento'];
        $this->sexo= $_POST['sexo'];
        $this->tipoUsuario = $tipoUsuario;

        //Esse trecho faz parte da validação e sanitização do email, e verificação se o email é real.
        //Remove espaços em branco do email
        $this->email = trim($this->email);
        //Sanitiza o email
        $this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
        //Valida o email
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->erros[] = 'Email inválido!';
        }

        //Verifica as condições para a uma senha forte
        if(strlen($this->senha) < 8) {
            $this->erros[] = "No mínimo 8 caracteres!";
            return false;
        } else if(!preg_match('/[A-Z]/', $this->senha)) {
            $this->erros[] = "No mínimo uma letra maiúscula!";
            return false;
        } else if(!preg_match('/[a-z]/', $this->senha)) {
            $this->erros[] = "No mínimo uma letra minúscula!";
            return false;
        } else if(!preg_match('/[0-9]/', $this->senha)) {
            $this->erros[] = "No mínimo um número!";
            return false;
        } else if(!preg_match('/[\W_]/', $this->senha)) {
            $this->erros[] = "No mínimo um caractere especial!";
            return false;
        }
        //Verifica se a senha e confirmarSenha são iguais
        if($this->senha != $this->confirmarSenha ) {
            $this->erros[] = 'Senhas diferentes';
            $this->senhasDiferentes = true;
            return false;
        }
        $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
        return true;     
    }
    //Essa função serve para criar um array chave/valor, usando os atributos da classe, utilize apenas quando os dados forem
    //capturados e validados corretamente, esse array serve para inserir os dados em uma tabela no bando de dados usando a classe BancoDados
    public function criarArrayDadosDeCadastro() : array {
        if($this->senhasDiferentes === false) {
            $dados = [
                'nome' => "$this->nome",
                'sexo' => "$this->sexo",
                'data_de_nascimento' => "$this->dataNascimento",
                'email' => "$this->email",
                'senha' => "$this->senha",
                'tipo_usuario' => "$this->tipoUsuario"
            ];
            return $dados;
        } else {
            $dados[] = 'erro';
            return $dados;
        }
    }

    public function getErros() : array {
        return $this->erros;
    }

}

?>