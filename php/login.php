<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PHP</title>
</head>
<body>
    <header>
        <h1>Teste Recebendo dados PHP</h1>
        <?php 
            $email = $_GET["email"];
            $password = $_GET["password"];
            echo "<p>Email: $email</p>";
            echo "<p>Senha: $password</p>";
        ?>
    </header>
</body>
</html>