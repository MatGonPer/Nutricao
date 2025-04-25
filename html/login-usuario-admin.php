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
    <?php 
        $email = $_POST['email'] ?? "0";
        $password = $_POST['password'] ?? "0";
        $rememberMe = $_POST['remember-me'] ?? "0";
    ?>
    <main>
        <div class="external-container">
            <h1>NUTRIFIT</h1>
            <section>
                <form class="container" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <h2>Acesse a sua conta</h1>
                    <section class="input-box">
                        <label for="email">Email:</label>
                        <br>
                        <div class="input-container">
                            <input placeholder="Digite o seu email" type="email" name="email">
                            <img src="../assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                        <?php if(strlen($email) == 0) {
                            echo "<p class='invalid'>Email inválido!</p>";
                            }else {
                                echo "<br>";
                            } ?>
                    </section>
                    <section class="input-box">
                        <label for="password">Senha:</label>
                        <br>
                        <div class="input-container">
                            <input placeholder="Digite a sua senha" type="password" name="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                        <?php if(strlen($password) == 0) {
                            echo "<p class='invalid'>Senha inválida!</p>";
                            }else {
                                echo "<br>";
                            } ?>
                    </section>
                    <section class="acess-link">
                        <button type="submit">Acessar conta</button>
                    </section>
                    <section class="remember-forgot">
                        <label for="checkbox">
                        <input type="checkbox" name="remember-me">
                        Lembre-me
                        </label>
                        <a href="">Esqueci minha senha</a>
                    </section>
                    <section class="register-link">
                        <button type="button" onclick="window.location.href='cadastro-usuario-admin.php';">Cadastrar-se</button>
                        <a href="login-conta-parceira.php">Sou um parceiro</a>
                    </section>
                </form>  
            </section>
        </div>    
    </main>
</body>
</html>