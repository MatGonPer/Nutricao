<?php
//Você precisar ter instalado a extensão PHP para pg_* , e habilitar no seu php.ini, quando configurar reinicie seu Apache
//Olhe no ChatGPT como instalar e o configurar PostgreSQL para PHP
//Não modifiquem nem mexam nessa classe, só troquem as variáveis pra voces conectarem seus bancos
class BancoDeDados {
    //Olhe as configurações do seu banco de dados e altere os atributos da classe para a conexão ser bem sucedida
    private $servidor = '127.0.0.1';
    private $porta = '5432';
    //Troque pelo usuário do seu banco, a senha pra acessar o seu banco, e o nome do seu banco
    private $usuario = 'postgres';
    private $senha = '88548582';
    private $banco = 'nutrifit';
    private $conexao;

    //Usem essa função para realizar a conexão com o banco
    public function conectar() : bool {
        $this->conexao = pg_connect("host={$this->servidor} port={$this->porta} dbname={$this->banco} user={$this->usuario} password={$this->senha}");
        if (!$this->conexao) {
            error_log("Erro na conexão: " . pg_last_error());
            return false;
        } else {
            return true;
        }   
    }
    //Usem essa função para fechar a conexão, se não estiver mais precisando do banco feche para economizar recursos
    public function desconectar() {
        if($this->conexao) {
            pg_close($this->conexao);
        }
    }

    //Função para inserirDados em uma tabela, array $dados tem que ser do tipo chave e valor
    //chave será as colunas, e o valor será valor inserido no banco
    public function inserir(string $tabela, array $dados) : bool {
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
    
    public function consultar(string $tabela, array $dados) : array {
        
        $sql = "SELECT * FROM {$tabela}";
        $valores = [];

        if(!empty($dados)) {
            $condicoes = [];
            $i = 1;

            foreach($dados as $campo => $valor) {
                $condicoes[] = "$campo = $" . $i;
                $valores[] = $valor;
                $i++;
            }

            $sql .= " WHERE " . implode(" AND ", $condicoes);
        }

        $resultado = pg_query_params($this->conexao, $sql, $valores);

        if($resultado === false) {
            error_log('Erro na consulta: ' . pg_last_error($this->conexao));
            return [];
        }

        $dados = pg_fetch_all($resultado);
        pg_free_result($resultado);

        return $dados ?: [];
    }

    public function getConexao() {
        return $this->conexao;
    }
}
/*Remova os comentários do código abaixo para testar se a conexão com o banco de dados foi bem sucedida
//E testa a função de inserir dados na tabela usuario com campos e valores definidos no array $reg
$bd = new BancoDados();
$bd->conectarBanco();
*/
?>