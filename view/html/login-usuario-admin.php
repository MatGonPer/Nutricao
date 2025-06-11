<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../../model/LoginUsuario.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesse sua conta</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login-usuario-admin.css">
    <link rel="shortcut icon" href="../assets/icons/favicon/favicon_io/favicon.ico" type="image/x-icon">
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
                        <div class="input-container">
                            <input placeholder="Digite o seu email" type="email" name="email">
                            <img src="../assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <section class="input-box">
                        <label>Senha:</label>
                        <div class="input-container">
                            <input placeholder="Digite a sua senha" type="password" name="senha" autocomplete="new-password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <section class="acess-link">
                        <button type="submit" name="submit">Acessar conta</button>
                    </section>
                    <section class="remember-forgot">
                        <label>
                        <input type="checkbox" name="remember-me">
                        Lembre-me
                        </label>
                        <a href="recuperacao-senha.php">Esqueci minha senha</a>
                    </section>
                    <section class="register-link">
                        <button type="button" id="registerButton">Criar nova conta</button>
                        <a href="landing-page.php">Voltar para página anterior</a>
                    </section>
                    <div class="error">
                        <?php
                        if(isset($_POST['submit']) && $resultado === false) {
                            echo "<p style='text-align: center; color: red; font-size: 20px; font-weight: 500;'>Email e/ou senha incorretos!</p>";
                        }
                        ?>
                    </div>
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