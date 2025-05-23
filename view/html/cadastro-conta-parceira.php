<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre sua conta</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/cadastro-conta-parceira.css">
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
                            <input name="senha" placeholder="'Digite a sua senha'" type="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="nome-erro">
                        <?php
                        
                        ?>
                    </div>
                    <section class="input-box">
                        <label>Senha:</label>
                        <div class="input-container">
                            <input name="confirmarSenha" class="input-info" placeholder="Digite a sua senha novamente" type="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="nome-erro">
                        <?php
                                    
                        ?>
                    </div>
                    <div class="input-pessoal">
                        <section class="input-pessoal-inside">
                            <label>Data de nascimento:</label>
                            <div class="input-div">
                                <input name="dataNascimento" type="date" required>                   
                            </div>
                        </section>
                        <section class="input-pessoal-inside">
                            <label>Gênero:</label>
                            <div class="input-div">
                                <select class="select" name="sexo">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                    <option value="P">Prefiro não informar</option>
                                </select>
                            </div>
                        </section>
                    </div>
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
                        <a href="login-usuario-admin.php">Já tenho uma conta</a>
                    </section>
                </form>  
            </section>
        </div>    
    </main>
</body>
</html>