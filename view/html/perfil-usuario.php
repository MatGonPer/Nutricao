<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/perfil-usuario.css">
    <link rel="shortcut icon" href="../assets/icons/favicon/favicon_io/favicon.ico" type="image/x-icon">
    <title>Meu perfil</title>
</head>
<body>
    <div class="container">
        <section class="left">
            <div class="profile">
                <figure>
                    <img src="../assets/perfil-usuario/user-icon-default-mod.jpeg" alt="Foto de perfil">
                </figure>
                <h2>Francisco do Nascimento</h2>
            </div>
            <aside>
                <nav>
                    <ul>
                        <li><a href="landing-page.php"> <img src="../assets/perfil-usuario/incio-icon.svg" width="25px">Início</a></li>
                        <li><a href="perfil-usuario.php"> <img src="../assets/perfil-usuario/profile-icon.svg" width="25px">Usuário</a></li>
                        <li><a href="dashboard-usuario.php"> <img src="../assets/perfil-usuario/desempenho-icon.svg" width="25px">Desempenho</a></li>
                        <li><a href="treinos.php"> <img src="../assets/perfil-usuario/treinos-icon.svg" width="25px">Treino</a></li>
                        <li><a href="consultas-agendadas.php"> <img src="../assets/perfil-usuario/consultas-icon.svg" width="25px">Consultas</a></li>
                        <li><a href="parceiros.php"> <img src="../assets/perfil-usuario/catalogo-icon.svg" width="25px">Catálogo</a></li>
                        <li><a href="suporte.php"> <img src="../assets/perfil-usuario/suporte-icon.svg" width="25px">Suporte</a></li>
                        <li><a href="#"> <img src="../assets/perfil-usuario/configuracao-icon.svg" width="25px">Configurações</a></li>
                    </ul>
                </nav>
            </aside>
        </section>
        <section class="container-right">
            <main>
                <header class="profile-header">
                    <div class="profile">
                        <figure class="profile-picture-container">
                            <img src="../assets/perfil-usuario/user-icon-default-mod.jpeg" alt="Foto de perfil" id="preview-image">
                            <label for="profile-photo" class="edit-icon">
                                <img src="../assets/perfil-usuario/edit-icon.svg" alt="Editar foto" width="200px" height="200px">
                            </label>
                            <input type="file" id="profile-photo" name="profile-photo" accept="image/*" style="display: none;">
                        </figure>
                        <h2>Francisco do Nascimento</h2>
                    </div>                  
                </header>
                <form class="profile-form">
                    <fieldset>
                        <legend>Dados pessoais</legend>
                        <div class="form">
                            <input type="nome" placeholder="Nome Completo">
                            <input type="dataNascimento" placeholder="Data de Nascimento">
                            <select class="gender" name="sexo">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                <option value="P">Prefiro não informar</option>
                            </select>
                        </div>
                        <div class="about-me">
                            <textarea class="about" name="sobreMim" placeholder="Sobre mim"></textarea>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Contato</legend>
                        <div class="form">
                            <input type="email" name="email" id="" placeholder="E-mail">
                            <input type="tel" name="telefone" id="" placeholder="Telefone">
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Saúde</legend>
                        <div class="form">
                            <input type="text" name="peso" placeholder="Peso">
                            <input type="text" name="altura" placeholder="Altura">
                        </div>
                    </fieldset>
                     <fieldset>
                        <legend>Segurança</legend>
                        <div class="form">
                            <input type="password" name="novaSenha" placeholder="Nova senha">
                            <input type="password" name="confirmarNovaSenha" placeholder="Confirmar nova senha">
                        </div>
                    </fieldset>
                    <div class="buttons">
                        <button type="submit" class="save">Salvar perfil</button>
                        <button type="button" class="change-pass">Alterar Senha</button>
                    </div>
                </form>
            </main>
        </section>
    </div>
</body>
</html>