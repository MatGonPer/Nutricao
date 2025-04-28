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
        //Variáveis com a entrada dos dados email e password
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        //Array que contém os erros de validação de email e password
        //se algum erro de validação ocorrer, mostrar mensagem de erro para usuário
        $errorsEmail = [];
        $errorsPassword = [];

        //Verifica se o usuário clicou no botão Acessar Conta
        $formSubmitted = isset($_POST['submit']);

        //Validação e Sanitização das variáveis email e password
        //Verifica se os dados foram recebidos por método post
        if($formSubmitted) {
            //Validação email
            //Filtra o email para um email válido
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            //Verifica se email está vazio
            if(empty($email)) {
                $errorsEmail[] = "O campo de email é obrigatório."; 
            //Verifica se é um email válido    
            } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorsEmail[] = "O email informado é inválido.";
            }
            //Validação de password
            //Verifica se password está vazio e se atende todos os requisitos de validação para senhas
            if(empty($password)) {
                $errorsPassword[] = "O campo de senha é obrigatório.";
            } else if(strlen($password) < 8) {
                $errorsPassword[] = "A senha deve ter no mínimo 8 caracteres.";
            } else if(!preg_match('/[A-Z]/', $password)) {
                $errorsPassword[] = "A senha deve conter no mínimo uma letra maiúscula.";
            } else if(!preg_match('/[a-z]/', $password)) {
                $errorsPassword[] = "A senha deve conter no mínimo uma letra minúscula.";
            } else if(!preg_match('/[0-9]/', $password)) {
                $errorsPassword[] = "A senha deve conter no mínimo um número.";
            } else if(!preg_match('/[\W_]/', $password)) {
                $errorsPassword[] = "A senha deve conter no mínimo um caractere especial.";
            }
        }
    ?>
    <main>
        <div class="external-container">
            <h1>NUTRIFIT</h1>
            <section>
                <form class="container" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <h2>Acesse a sua conta</h2>
                    <section class="input-box">
                        <label for="email">Email:</label>
                        <br>
                        <div class="input-container">
                            <input placeholder="Digite o seu email" type="email" name="email">
                            <img src="../assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                        <?php 
                            if(!$formSubmitted) {
                                echo "<br>";
                            }
                            if($formSubmitted) {
                                if(!empty($errorsEmail)) {
                                    echo "<p class='invalid'>" . htmlspecialchars($errorsEmail[0]) . "</p>";
                                } else {
                                    echo "<br>";
                                }
                            }
                        ?>
                    </section>
                    <section class="input-box">
                        <label for="password">Senha:</label>
                        <br>
                        <div class="input-container">
                            <input placeholder="Digite a sua senha" type="password" name="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                        <?php
                            if(!$formSubmitted) {
                                echo "<br>";
                            }
                            if($formSubmitted) {
                                if(!empty($errorsPassword)) {
                                    echo "<p class='invalid'>" . htmlspecialchars($errorsPassword[0]) . "</p>";
                                } else {
                                    echo "<br>";
                                }
                            }
                        ?>
                    </section>
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