<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/perfil-usuario.css">
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
                        <li><a href="landing-page.php">Início</a></li>
                        <li><a href="perfil-usuario.php">Usuário</a></li>
                        <li><a href="dashboard-usuario.php">Desempenho</a></li>
                        <li><a href="treinos.php">Treino</a></li>
                        <li><a href="consultas-agendadas.php">Consultas</a></li>
                        <li><a href="parceiros.php">Catálogo</a></li>
                        <li><a href="suporte.php">Suporte</a></li>
                        <li><a href="#">Configurações</a></li>
                    </ul>
                </nav>
            </aside>
        </section>
        <section class="container-right">
            <main class="profile-content">
                <header class="profile-header">
                    <div class="profille-info">
                        <figure>
                            <img class="img" src="../assets/perfil-usuario/user-icon-default-mod.jpeg" alt="Foto de perfil">
                        </figure>
                        <h3>Francisco do Nascimento</h3>
                    </div>
                        <p>Perfil 50% completo</p>
                        <div class="progress-bar">
                            <div class="fill" style="width: 50%;"></div>
                        </div>
                </header>
                <form class="profile-form">
                    <fieldset>
                        <legend>Dados pessoais</legend>
                        <div class="form">
                            <input type="text" placeholder="Nome Completo">
                            <input type="text" placeholder="Idade">
                            <select class="gender" name="gender" id="gender">
                                <option value="Gênero">Gênero</option>
                                <option value="">Masculino</option>
                                <option value="feminino">Feminino</option>
                            </select>
                        </div>
                        <div class="about-me">
                            <textarea class="about" name="" id="" placeholder="Sobre mim"></textarea>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Contato</legend>
                        <div class="form">
                            <input type="email" name="Email" id="" placeholder="Email">
                            <input type="tel" name="Tel" id="" placeholder="Telefone">
                            <input type="text" name="Cidade" id="" placeholder="Cidade">
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Saúde</legend>
                        <div class="form">
                            <input type="text" placeholder="Peso">
                            <input type="text" placeholder="IMC">
                            <input type="text" placeholder="Altura">
                        </div>
                    </fieldset>
                     <fieldset>
                        <legend>Segurança</legend>
                        <div class="form">
                            <input type="password" name="Senha atual" id="senhaatual" placeholder="Senha Atual">
                            <input type="password" name="Nova senha" id="novasenha" placeholder="Nova senha">
                            <input type="password" name="Confirmar senha" id="confirmarsenha" placeholder="Confirmar Senha">
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