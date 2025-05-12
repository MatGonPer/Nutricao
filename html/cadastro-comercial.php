<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre sua conta</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/cadastro-comercial.css">
</head>
<body>
    <main>
        <div class="external-container">
            <h1>NUTRIFIT</h1>
            <section>
                <form class="container" action="" method="post">
                    <h2>Cadastre a sua conta comercial</h2>
                    <section class="input-box">
                        <label>Nome da empresa:</label>
                        <br>
                        <div class="input-container">
                            <input type="text" name="name" placeholder="Digite seu nome completo">
                        </div>
                    </section>
                     <section class="input-box">
                        <label>CNPJ:</label>
                        <br>
                        <div class="input-container">
                            <input type="text" name="cnpj" placeholder="CNPJ da empresa">
                            <img src="../assets/icons/cadastro-comercial/empresa-icon.svg" alt="cnpj" width="22" height="22">
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
                    <section class="input-box">
                        <label>Parceria</label>
                        <br>
                        <div class="input-container">
                           <select name="parceria" id="parceria">
                            <option value="vendas">Vendas</option>
                            <option value="indicacao">Indicação</option>
                           </select>
                        </div>
                    </section>
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