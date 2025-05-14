<?php
//Você precisar ter instalado a extensão PHP para pg_* , e habilitar no seu php.ini, quando configurar reinicie seu Apache
//Olhe no ChatGPT como instalar e o configurar PostgreSQL para PHP
class BancoDados {
    //Olhe as configurações do seu banco de dados e altere os atributos da classe para a conexão ser bem sucedida
    private $servidor = '127.0.0.1';
    private $porta = '5432';
    //Troque pelo usuário do seu banco, a senha pra acessar o seu banco, e o nome do seu banco
    private $usuario = 'postgres';
    private $senha = '123';
    private $banco = 'nutrifit';
    private $conexao;

    //Não modifiquem nem mexam nessa porra de classe, só troque as variáveis pra voces conectarem seus bancos
    //Usem essa função para realizar a conexão com o banco
    public function conectarBanco() : bool {
        $this->conexao = pg_connect("host={$this->servidor} port={$this->porta} dbname={$this->banco} user={$this->usuario} password={$this->senha}");
        if (!$this->conexao) {
            error_log("Erro na conexão: " . pg_last_error());
            return false;
        } else {
            return true;
        }   
    }
    //Usem essa função para fechar a conexão, se não estiver mais precisando do banco feche para economizar recursos
    public function fecharConexao() {
        if($this->conexao) {
            pg_close($this->conexao);
        }
    }

    public function getConexao() {
        return $this->conexao;
    }
    //Função para inserirDados em uma tabela, array $dados tem que ser do tipo chave e valor
    //chave será as colunas, e o valor será valor inserido no banco
    public function inserirDados(string $tabela, array $dados) : bool {
        $colunas = array_keys($dados);
        $valores = array_values($dados);
        $placeholders = [];

        for($i = 1; $i <= count($colunas); $i++) {
            $placeholders[] = '$' . $i;
        }

        $sql = "INSERT INTO {$tabela} (" . implode(',', $colunas) . ") VALUES (" . implode(', ', $placeholders) . ")";
        $resultado = pg_query_params($this->conexao, $sql, $valores);
        
        if($resultado === false) {
            error_log('Erro ao inserir: ' . pg_last_error($this->conexao));
            return false;
        } else {
            pg_free_result($resultado);
            return true;
        }
        
    }
    
    public function consultarDados(string $tabela, string $email, string $senha) : bool {
        if(empty($tabela) || empty($email) || empty($senha)) {
            error_log('Parâmetros inválidos!');
            return false;
        }
        
        $query = "SELECT * FROM {$tabela} WHERE email = $1";
        $resultado = pg_query_params($this->conexao, $query, array($email));

        if($resultado === false) {
            error_log('Erro na consulta: ' . pg_last_error($this->conexao));
            return false;
        }

        $usuario = pg_fetch_assoc($resultado);
        pg_free_result($resultado);

        if($usuario && password_verify($senha, $usuario['senha'])) {
            return true;
        }
        
        return false;
    }
}
/*Remova os comentários do código abaixo para testar se a conexão com o banco de dados foi bem sucedida
E testa a função de inserir dados na tabela usuario com campos e valores definidos no array $reg
*/
$bd = new Database();
$bd->conectarBanco();
/*
//O array $reg tem o nome dos campos a esquerda e o seu valor a direita, certifique-se de estar idêntico aos campos do seu banco
$reg = [
    'nome' => 'Márcio José da Silva',
    'sexo' => 'M',
    'data_de_nascimento' => '2001-07-21',
    'email' => 'marciojs12@gmail.com',
    'senha' => password_hash('marcio123marcio', PASSWORD_DEFAULT),
    'tipo_usuario' => 'usuario'
];
if ($bd->inserirDados('usuario', $reg)) {
    echo "Dados inseridos com sucesso.";
} else {
    echo "Erro ao inserir os dados: " . pg_last_error($bd->getConexao());
}
*/
?>