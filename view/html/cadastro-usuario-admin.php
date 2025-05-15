<?php
require "../../controller/php/CadastroUsuarioAdmin.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre sua conta</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/cadastro-usuario-admin.css">
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
                        if(in_array("Nome não inserido", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Nome não inserido!</p>";
                        }               
                        ?>
                    </div>
                    <section class="input-box">
                        <label>Email:</label>
                        <div class="input-container">
                            <input name="email" placeholder="<?php if(!empty($errosEmail)) { echo 'Email inserido é inválido!'; } else { echo 'Digite seu email'; } ?>" type="email">
                            <img src="../assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="nome-erro">
                        <?php
                        if(in_array("Email não inserido", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Email não inserido!</p>";
                        } else if (in_array("Email não inserido", $errosLista) == false && in_array("Email inválido!", $errosLista) == true) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Email inválido!</p>";
                        }         
                        ?>
                    </div>
                    <section class="input-box">
                        <label>Senha:</label>
                        <div class="input-container">
                            <input name="senha" placeholder="<?php if(!empty($errosSenha)) { echo 'Senha inserida é inválida!'; } else { echo 'Digite a sua senha'; } ?>" type="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="nome-erro">
                        <?php
                        if(in_array("Senha não inserida", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Senha não inserida!</p>";
                        } else if(in_array("No mínimo 8 caracteres!", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">No mínimo 8 caracteres!</p>";
                        } else if(in_array("No mínimo uma letra maiúscula!", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">No mínimo uma letra maiúscula!</p>";
                        } else if(in_array("No mínimo uma letra minúscula!", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">No mínimo uma letra minúscula!</p>";
                        } else if(in_array("No mínimo um número!", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">No mínimo um número!</p>";
                        } else if(in_array("No mínimo um caractere especial!", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">No mínimo um caractere especial!</p>";
                        } else if(in_array("Senhas diferentes", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Senhas diferentes!</p>";
                        }
                        ?>
                    </div>
                    <section class="input-box">
                        <label>Senha:</label>
                        <div class="input-container">
                            <input name="confirmarSenha" class="input-info" placeholder="<?php if(!empty($errosSenha)) { echo $errosSenha[0]; } else { echo 'Digite a sua senha novamente'; } ?>" type="password">
                            <img src="../assets/icons/login-register/password-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="nome-erro">
                        <?php
                        if(in_array("Senha não inserida", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Senha não inserida!</p>";
                        } else if(in_array("No mínimo 8 caracteres!", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">No mínimo 8 caracteres!</p>";
                        } else if(in_array("No mínimo uma letra maiúscula!", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">No mínimo uma letra maiúscula!</p>";
                        } else if(in_array("No mínimo uma letra minúscula!", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">No mínimo uma letra minúscula!</p>";
                        } else if(in_array("No mínimo um número!", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">No mínimo um número!</p>";
                        } else if(in_array("No mínimo um caractere especial!", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">No mínimo um caractere especial!</p>";
                        } else if(in_array("Senhas diferentes", $errosLista)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Senhas diferentes!</p>";
                        }              
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
                    <div class="conta-criada">
                        <?php
                            if(isset($_POST['submit'])) {
                                if($contaCriadaComSucesso) {
                                    echo "<p style=\"color: #0E34A0; font-size: 16px; text-align: center;\">Conta cadastrada com sucesso!</p>";
                                    } else {
                                        echo "<p style=\"color: red; font-size: 16px; text-align: center;\">Não foi possível criar uma conta!</p>";
                                    }
                            }
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