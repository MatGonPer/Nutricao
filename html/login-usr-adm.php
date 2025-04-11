<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesse sua conta</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/login-usr-adm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yrsa:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
</head>

<body>
    <main class="container">
        <form action="">
            <h1>Acesse sua conta</h1>
            <div class="input-box">
                <label for="email">Email:</label>
                <input placeholder="Digite o seu email" type="email">
                <img src="/assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
            </div>
            <div class="input-box">
                <label for="password">Senha:</label>
                <input placeholder="Digite a sua senha" type="password">
                <img src="/assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
            </div>
            <div class="remember-forgot">
                <label for="checkbox">
                    <input type="checkbox">
                    Lembre-me
                </label>
                <a href="">Esqueci minha senha</a>
            </div>
                <button type="submit">Acessar conta</button>
            <div class="register-link">
                <p>Não tem uma conta? <a href="">Cadastre-se</a></p>
            </div>
        </form>
    </main>
</body>
</html>