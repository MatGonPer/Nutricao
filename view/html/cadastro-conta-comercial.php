<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre sua conta comercial</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/cadastro-conta-comercial.css">
    <link rel="shortcut icon" href="../assets/icons/favicon/favicon_io/favicon.ico" type="image/x-icon">
</head>
<body>
    <main>
        <div class="external-container">
            <h1>NUTRIFIT</h1>
            <section>
                <form class="container" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <h2>Cadastre a sua conta</h2>
                    <section class="input-box">
                        <label>Nome da empresa:</label>
                        <div class="input-container">
                            <input type="text" name="nome" placeholder="Digite seu nome completo">
                            <img src="../assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="nome-erro">
                        <?php
                         
                        ?>
                    </div>
                    <section class="input-box">
                        <label>CNPJ:</label>
                        <div class="input-container">
                            <input type="text" name="cnpj" placeholder="Digite seu CNPJ">
                            <img src="../assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="nome-erro">
                        <?php
                         
                        ?>
                    </div>
                    <section class="input-box">
                        <label>Email:</label>
                        <div class="input-container">
                            <input name="email" placeholder="Digite seu email" type="email">
                            <img src="../assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="nome-erro">
                        <?php
                           
                        ?>
                    </div>
                    <section class="input-box">
                        <label>Senha:</label>
                        <div class="input-container">
                            <input name="senha" placeholder="Digite a sua senha" type="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="nome-erro">
                        <?php
                        
                        ?>
                    </div>
                    <section class="input-box">
                        <label>Confirmar senha:</label>
                        <div class="input-container">
                            <input name="confirmarSenha" class="input-info" placeholder="Digite a sua senha novamente" type="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="nome-erro">
                        <?php
                                   
                        ?>
                    </div>
                    <section class="input-box">
                        <label>Tipo de parceria</label>
                        <div class="input-container">
                            <select name="tipoParceiro" id="">
                                <option value="venda">Vendas</option>
                            </select>
                        </div>
                    </section>
                    <div class="nome-erro">
                        <?php
                                   
                        ?>
                    </div>
                    <div class="conta-criada">
                        <?php
                        
                        ?>
                    </div>
                    <section class="acess-link">
                        <button name="submit" type="submit">Realizar cadastro</button>
                    </section>
                    <section class="register-link">
                        <a href="login-comercial.php">Já tenho uma conta</a>
                    </section>
                </form>  
            </section>
        </div>    
    </main>
</body>
</html>