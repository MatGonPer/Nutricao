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

    //Usem essa função para realizar a conexão com o banco de dados
    public function conectar() : bool {
        $this->conexao = pg_connect("host={$this->servidor} port={$this->porta} dbname={$this->banco} user={$this->usuario} password={$this->senha}");
        if (!$this->conexao) {
            error_log("Erro na conexão: " . pg_last_error());
            return false;
        } else {
            return true;
        }   
    }
    //Usem essa função para fechar a conexão, quando você usar o banco e conectar(), lembre de fechar a conexão
    //depois de utilizar o banco no seu código, TEM QUE FECHAR A CONEXÃO para economizar recursos
    public function desconectar() {
        if($this->conexao) {
            pg_close($this->conexao);
        }
    }

    //Função para inserir em uma $tabela do banco de dados, $dados tem que ser do tipo CHAVE/VALOR
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
    
    //Função para fazer uma consulta de $dados numa $tabela, array de dados tem que ser do tipo CHAVE/VALOR
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

    //Função para atualizar $dados de uma $tabela, array com os $novosDados que serão inserido tem de ser CHAVE/VALOR
    public function atualizar(string $tabela, array $novosDados, $id) : bool {
        try {
            //Separa as colunas de $novosDados, exp: 'nome' e insere no array $colunas
            $colunas = array_keys($novosDados);
            //Separa os valores de $novosDados, exp: 'Jorge' e insere no array $valores
            $valores = array_values($novosDados);
            //Armazena várias strings que serão usada na consulta, exp: 'nome = $1', 'idade = $2';
            $atualizacoes = [];
            $total = count($colunas);

            //Constroi as string para o array $atualizacoes
            for($i = 0; $i < $total; $i++) {
                $posicao = $i + 1;
                $atualizacoes[] = "{$colunas[$i]} = \${$posicao}";
            }

            //Guarda o id na ultima posicao do array $valores
            $valores[] = $id;
            //Guarda a última posicao parametrizada, exp: se for duas colunas, nome = $1 e idade = $2, o ultimo parametro sera $3 posicao para WHERE id = $3
            $posicaoId = $total + 1;

            //Comando sql
            $sql = "UPDATE {$tabela} SET " . implode(", ", $atualizacoes) . " WHERE id = \${$posicaoId}";
        
            error_log("SQL: " . $sql);
            error_log("Valores: " . print_r($valores, true));

            $resultado = pg_query_params($this->conexao, $sql, $valores);
        
            //Consulta deu errado
            if($resultado === false) {
                error_log('Erro ao atualizar: ' . pg_last_error($this->conexao));
                return false;
            }
            
            //Libera o recurso após pg_query_params()
            pg_free_result($resultado);
            return true;
        } catch(Exception $e) {
            error_log('Erro na atualização: ' . $e->getMessage());
            return false;
        }
    }

    //Função que deleta todos os dados de uma $tabela pelo id
    public function deletar(string $tabela, string $id) : bool {
        $sql = "DELETE FROM {$tabela} WHERE id = \$1";

        $resultado = pg_query_params($this->conexao, $sql, array($id));

        if($resultado) {
            pg_free_result($resultado);
            return true;
        } else {
            return false;
        }
    }

    public function getConexao() {
        return $this->conexao;
    }
}
?>
