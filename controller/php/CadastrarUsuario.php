<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../controller/php/CapturarDadosCadastro.php';
require '../../model/BancoDeDados.php';

$dadosFormulario = new CapturarDadosCadastro();
$contaCriadaComSucesso = false;
$erros = '';
$errosLista = [];

//Captura dados do tipo usuario
if($dadosFormulario->capturarDadosDeCadastro("usuario")) {

    // Se chegou aqui, significa que os dados foram validados com sucesso
    $dados = $dadosFormulario->criarArrayDadosDeCadastro();
    
    if(!isset($dados['erro'])) {
        //Cria e tenta se conectar ao banco de dados
        $bancoDeDados = new BancoDeDados();
        $conexao = $bancoDeDados->conectar();
        
        if($conexao) {
            //Tenta inserir os dados na tabela usuario
            $contaCriadaComSucesso = $bancoDeDados->inserir("usuario", $dados);
            if(!$contaCriadaComSucesso) {
                $erros = "Erro ao inserir no banco de dados";
            }
            $bancoDeDados->desconectar();
        } else {
            $erros = "Erro na conexão com o banco de dados";
        }
    } else {
        $erros = 'Erro na array de dados!';
    }
} else {
    // Se houver erros de validação coloca no array $errosLista
    $errosLista = $dadosFormulario->getErros();
}
?>