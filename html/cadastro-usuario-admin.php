<?php 
session_start();
if(isset($_POST['submit'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['confirm_password'] = $_POST['confirm_password'];
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['gender'] = $_POST['gender'];
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
                <form class="container" action="" method="post">
                    <h2>Cadastre a sua conta</h2>
                    <section class="input-box">
                        <label>Nome:</label>
                        <br>
                        <div class="input-container">
                            <input type="text" name="name" placeholder="Digite seu nome completo">
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
                            <input name="confirm_password" placeholder="Digite a sua senha novamente" type="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="input-pessoal">
                        <section class="input-box">
                            <label>Nascimento:</label>
                            <br>
                            <div class="input-container">
                                <input name="date" type="date">                   
                            </div>
                        </section>
                        <section class="input-box">
                            <label>Gênero:</label>
                            <br>
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