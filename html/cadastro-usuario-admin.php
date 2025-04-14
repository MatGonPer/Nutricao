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
                <form class="container" action="">
                    <h2>Cadastre a sua conta</h2>
                    <section class="input-box">
                        <label for="nome">Nome</label>
                        <br>
                        <div class="input-container">
                            <input type="text" placeholder="Digite seu nome">
                        </div>
                    </section>
                    <section class="input-box">
                        <label for="nome">Sobrenome</label>
                        <br>
                        <div class="input-container">
                            <input type="text" placeholder="Digite seu sobrenome">
                        </div>
                    </section>
                    <section class="input-box">
                        <label for="email">Email:</label>
                        <br>
                        <div class="input-container">
                            <input placeholder="Digite o seu email" type="email">
                            <img src="../assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <section class="input-box">
                        <label for="password">Senha:</label>
                        <br>
                        <div class="input-container">
                            <input placeholder="Digite a sua senha" type="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <section class="input-box">
                        <label for="password">Senha:</label>
                        <br>
                        <div class="input-container">
                            <input placeholder="Digite a sua senha novamente" type="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="input-pessoal">
                        <section class="input-box">
                            <label for="password">Nascimento:</label>
                            <br>
                            <div class="input-container">
                                <input type="date">
                                
                            </div>
                        </section>
                        <section class="input-box">
                            <label for="password">Gênero:</label>
                            <br>
                            <div class="input-container">
                                <select id="genero" name="genero">
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                    <option value="outro">Outro</option>
                                    <option value="no-info">Prefiro não informar</option>
                                </select>
                            </div>
                        </section>
                    </div>

                    <section class="acess-link">
                        <button type="submit">Realizar cadastro</button>
                    </section>
                    <section class="register-link">
                        <a href="login-usr-adm.php">Já tenho uma conta</a>
                    </section>
                </form>  
            </section>
        </div>    
    </main>
</body>
</html>