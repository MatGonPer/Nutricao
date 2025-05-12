<?php
session_start();

if(isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header('Location: landing-page.php');
    exit();
}
require_once "../../controller/php/CapturarDadosLogin.php";
require_once "../../model/BancoDados.php";
//Tenta capturar os dados do formulário
$dadosFormulario = new CapturarDadosLogin();
$resultado = false;

if($dadosFormulario->capturarDados('usuario')) {
    //Cria um banco e tenta conectar-se a ele
    $banco = new BancoDados;
    if($banco->conectarBanco()) {
        //Verifica se email e senha fornecidos pelo usuario constam no banco da dodos.
        if($banco->consultarDados('usuario', $dadosFormulario->getEmail(), $dadosFormulario->getSenha())) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        $banco->fecharConexao();
    }
}

if($resultado === true) {
    $_SESSION['logado'] = true;
    $_SESSION['email'] = $dadosFormulario->getEmail();
    $_SESSION['tipo_usuario'] = 'usuario';
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
    <link rel="stylesheet" href="../css/login-usuario-admin.css">
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
                        <br>
                    </section>
                    <div class="error">
                        <?php
                            if(isset($_POST['submit'])) {
                                if(!$resultado) {
                                    echo "<p style='color: red;'>Email ou senha incorretos!</p>";
                                } else {
                                    echo "<br>";
                                }
                            }
                        ?>
                    </div>
                    <section class="acess-link">
                        <button type="submit" name="submit">Acessar conta</button>
                    </section>
                    <section class="remember-forgot">
                        <label for="checkbox">
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