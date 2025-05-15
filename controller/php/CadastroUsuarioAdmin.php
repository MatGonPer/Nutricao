<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../controller/php/CapturarDadosCadastro.php';
require '../../model/BancoDados.php';

$dadosFormulario = new CapturarDadosCadastro();
$contaCriadaComSucesso = false;
$erros = '';
$errosLista = [];
$nomeVazio = false;
//Captura dados do tipo usuario
if($dadosFormulario->capturarDadosDeCadastro("usuario")) {
    // Se chegou aqui, significa que os dados foram validados com sucesso
    $dados = $dadosFormulario->criarArrayDadosDeCadastro();
    
    if(!isset($dados['erro'])) {
        //Cria e tenta se conectar ao banco de dados
        $banco_dados = new BancoDados();
        $conexao = $banco_dados->conectarBanco();
        
        if($conexao) {
            //Tenta inserir os dados na tabela usuario
            $contaCriadaComSucesso = $banco_dados->inserirDados("usuario", $dados);
            if(!$contaCriadaComSucesso) {
                $erros = "Erro ao salvar no banco de dados";
            }
            $banco_dados->fecharConexao();
        } else {
            $erros = "Erro na conexão com o banco de dados";
        }
    } else {
        $erros = 'Array de dados errada!';
    }
} else {
    // Se houver erros de validação coloca no array $errosLista
    $errosLista = $dadosFormulario->getErros();
}
?>