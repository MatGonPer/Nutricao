<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../../controller/php/CapturarDadosCadastro.php';
require_once '../../model/BancoDados.php';

$dadosFormulario = new CapturarDadosCadastro();
$contaCriadaComSucesso = false;
$error = '';

if($dadosFormulario->capturarDadosDeCadastro("usuario")) {
    $dados = $dadosFormulario->criarArrayDadosDeCadastro();

    if(isset($dados['error'])) {
        $error = $dados['error'];
    } else {
        $banco_dados = new BancoDados();
        $conexao = $banco_dados->conectarBanco();
        }
        if($conexao) {
            $contaCriadaComSucesso = $banco_dados->inserirDados("usuario", $dados);
            if(!$contaCriadaComSucesso) {
                $error = "Erro ao salvar no banco de dados";
            }
            $banco_dados->fecharConexao();
        } else {
            $erro = "Erro na conexão com o banco de dados";
    }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesse sua conta</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/cadastro-usuario-admin.css">
</head>
<body>
    <main>
        <div class="external-container">
            <h1>NUTRIFIT</h1>
            <section>
                <form class="container" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <h2>Cadastre a sua conta</h2>
                    <section class="input-box">
                        <label>Nome:</label>
                        <br>
                        <div class="input-container">
                            <input type="text" name="name" placeholder="Digite seu nome completo">
                            <img src="../assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <section class="input-box">
                        <label>Email:</label>
                        <br>
                        <div class="input-container">
                            <input name="email" placeholder="Digite o seu email" type="email">
                            <img src="../assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <section class="input-box">
                        <label>Senha:</label>
                        <br>
                        <div class="input-container">
                            <input name="password" placeholder="Digite a sua senha" type="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <section class="input-box">
                        <label>Senha:</label>
                        <br>
                        <div class="input-container">
                            <input name="confirm_password" class="input-info" placeholder="Digite a sua senha novamente" type="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="input-pessoal">
                        <section class="input-pbox">
                            <label>Data de nascimento:</label>
                            <div class="input-div">
                                <input name="date" type="date" required>                   
                            </div>
                        </section>
                        <section class="input-pbox">
                            <label>Gênero:</label>
                            <div class="input-container-gender">
                                <select class="select" name="gender">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                    <option value="P">Prefiro não informar</option>
                                </select>
                            </div>
                        </section>
                    </div>
                    <div>
                        <?php
                            if($contaCriadaComSucesso) {
                                echo "<p>Conta criada com sucesso!</p>";
                            }else if (!empty($erro)) {
                                echo "<p>Erro: {$error}</p>";
                            }
                        ?>
                    </div>
                    <section class="acess-link">
                        <button name="submit" type="submit">Realizar cadastro</button>
                    </section>
                    <section class="register-link">
                        <a href="login-usuario-admin.php">Já tenho uma conta</a>
                    </section>
                </form>  
            </section>
        </div>    
    </main>
</body>
</html>