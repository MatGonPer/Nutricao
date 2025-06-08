<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../../model/CadastrarUsuario.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre sua conta</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/cadastro-usuario-admin.css">
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
                        <label>Nome:</label>
                        <div class="input-container">
                            <input type="text" name="nome" placeholder="Digite seu nome completo">
                            <img src="../assets/icons/login-register/user-icon.svg" alt="Ícone de usuário" width="22" height="22">
                        </div>
                    </section>
                    <div class="nome-erro">
                        <?php
                        if(in_array("Nome não inserido", $camposVazios)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Nome não inserido!</p>";
                        } else if(in_array("Nome inválido", $erros)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Nome inválido!</p>";
                        }           
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
                        if(in_array("Email não inserido", $camposVazios)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Email não inserido!</p>";
                        } else if (in_array("Email inválido", $erros)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Email inválido!</p>";
                        }         
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
                        if(in_array("Senha não inserida", $camposVazios)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Senha não inserida!</p>";
                        } else if(in_array("Senhas diferentes", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Senhas diferentes!</p>";
                        } else if(in_array("A senha deve ter no minimo 8 caracteres", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">A senha deve ter no minimo 8 caracteres!</p>";
                        } else if(in_array("A senha deve ter no máximo 72 caracteres", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">A senha deve ter no máximo 72 caracteres!</p>";
                        } else if(in_array("A senha deve conter pelo menos uma letra maiúscula", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">A senha deve conter uma letra maiúscula!</p>";
                        } else if(in_array("A senha deve conter pelo menos uma letra minúscula", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">A senha deve conter uma letra minúscula!</p>";
                        } else if(in_array("A senha deve conter pelo menos um número", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">A senha deve conter um número!</p>";
                        } else if(in_array("A senha deve conter pelo menos um caractere especial", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">A senha deve conter um caractere especial!</p>";
                        }
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
                        if(in_array("Senha não inserida", $camposVazios)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Senha não inserida!</p>";
                        } else if(in_array("Senhas diferentes", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Senhas diferentes!</p>";
                        } else if(in_array("A senha deve ter no minimo 8 caracteres", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">A senha deve ter no minimo 8 caracteres!</p>";
                        } else if(in_array("A senha deve ter no máximo 72 caracteres", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">A senha deve ter no máximo 72 caracteres!</p>";
                        } else if(in_array("A senha deve conter pelo menos uma letra maiúscula", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">A senha deve conter uma letra maiúscula!</p>";
                        } else if(in_array("A senha deve conter pelo menos uma letra minúscula", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">A senha deve conter uma letra minúscula!</p>";
                        } else if(in_array("A senha deve conter pelo menos um número", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">A senha deve conter um número!</p>";
                        } else if(in_array("A senha deve conter pelo menos um caractere especial", $errosSenha)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">A senha deve conter um caractere especial!</p>";
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
                    <div class="nome-erro">
                        <?php
                        if(in_array("Data de nascimento inválida", $erros)) {
                            echo "<p style=\"color: red; font-size: 15px; margin-left: 12px;\">Data de nascimento inválida!</p>";
                        }
                        ?>
                    </div>
                    <div class="conta-criada">
                        <?php
                        if(isset($_POST['submit'])) {
                            if($contaCriadaComSucesso) {
                                echo "<p style=\"color: #0E34A0; font-size: 16px; text-align: center;\">Conta cadastrada com sucesso!</p>";
                            }
                            if($contaJaExiste) {
                                echo "<p style=\"color: red; font-size: 16px; text-align: center;\">Email inserido já está cadastrado!</p>";
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