<?php
session_start();
//Se o usuário quando logou anteriormente clicou no botão lembrar-me, loga-se automaticamente 
if(isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header('Location: landing-page.php');
    exit();
}

require "../../controller/php/CapturarDadosLogin.php";
require "../../model/BancoDados.php";
//Tenta capturar os dados do formulário
$dadosFormulario = new CapturarDadosLogin();
$resultado = false;
//Tenta capturar os dados do formulário
if($dadosFormulario->capturarDados('usuario')) {
    //Cria um objeto do BancoDados e tenta conectar-se a ele
    $banco = new BancoDados;
    if($banco->conectarBanco()) {
        //Verifica se email e senha fornecidos pelo usuario constam no banco da dados.
        if($banco->consultarDados('usuario', $dadosFormulario->getEmail(), $dadosFormulario->getSenha())) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        $banco->fecharConexao();
    }
}
//Se a consulta ao banco foi um sucesso, e o usuário selecionou o botão remember-me, seta logado para true, e loga o usuario
if(isset($_POST['submit']) && $resultado === true && isset($_POST['remember-me'])) {
    $_SESSION['logado'] = true;
    $_SESSION['email'] = $dadosFormulario->getEmail();
    $_SESSION['tipo_usuario'] = 'usuario';
    header('Location: landing-page.php');
    exit();
}
//Se a consulta ao banco foi um sucesso, e o usuario não selecionou o botão remember-me
if(isset($_POST['submit']) === true && $resultado === true) {
    header('Location: landing-page.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesse sua conta</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login-conta-parceira.css">
</head>
<body>
    <main>
        <div class="external-container">
            <h1>NUTRIFIT</h1>
            <section>
                <form class="container" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <h2>Acesse a sua conta</h2>
                    <section class="input-box">
                        <label>Email:</label>
                        <br>
                        <div class="input-container">
                            <input placeholder="Digite o seu email" type="email" name="email">
                            <img src="../assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                        <br>
                    </section>
                    <section class="input-box">
                        <label>Senha:</label>
                        <br>
                        <div class="input-container">
                            <input placeholder="Digite a sua senha" type="password" name="senha">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="error">
                        <?php
                            if(isset($_POST['submit'])) {
                                if(!$resultado) {
                                    echo "<p style='color: red; margin: 25px 0px 0px 0px;'>Email ou senha incorretos!</p>";
                                }         
                            } else {
                                echo "<br style='margin: 20px 0px 0px 0px;'>";
                            }
                        ?>
                    </div>
                    <section class="acess-link">
                        <button type="submit" name="submit">Acessar conta</button>
                    </section>
                    <section class="remember-forgot">
                        <label>
                        <input type="checkbox" name="remember-me">
                        Lembre-me
                        </label>
                        <a href="">Esqueci minha senha</a>
                    </section>
                    <section class="register-link">
                        <button type="button" id="registerButton">Cadastrar-se</button>
                        <a href="login-conta-parceira.php">Sou um parceiro</a>
                    </section>
                </form>  
            </section>
        </div>    
    </main>
    <script>
        document.getElementById('registerButton').addEventListener('click', function() {
            window.location.href = "cadastro-usuario-admin.php";
        });
    </script>
</body>
</html>