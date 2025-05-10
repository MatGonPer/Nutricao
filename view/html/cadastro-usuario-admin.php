<?php 
session_start(); 
require_once '../php/RegisterCaptureData.php';
require_once '../php/Account.php';
require_once '../php/Database.php';

//Inicializa um array de contas registradas na superglobal session
if(!isset($_SESSION['accountList'])) {
    $_SESSION['accountList'] = [];
}

//Verifica se os dados foram inseridos no formulário, e verifica se já existe uma conta na session usando o
//email e senha como comparação, caso não exista insere no array accountList a nova conta registrada.
if(captureRegisterData()) {
    foreach ($_SESSION['accountList'] as $existingAccount) {
        if($existingAccount->getEmail() === $email && $existingAccount->getPassword() === $password) {
            break;
        } else {
            $_SESSION['accountList'] = new Account($name, $email, $password, $cPassword, $date, $gender);
        }
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
                <form class="container" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <h2>Cadastre a sua conta</h2>
                    <section class="input-box">
                        <label>Nome:</label>
                        <br>
                        <div class="input-container">
                            <input type="text" name="name" placeholder="<?php
                            if($submit) {
                                echo $_SESSION['name'];
                            } else {
                                echo 'Digite seu nome';
                            }
                            ?>
                            ">
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
                                    <option value="male">Masculino</option>
                                    <option value="female">Feminino</option>
                                    <option value="gay">Prefiro não informar</option>
                                </select>
                            </div>
                        </section>
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