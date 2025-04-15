<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/perfil-usuario.css">
    <title>Usuário</title>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li class="perfil">
                    <figure>
                        <img src="../assets/perfil-usuario/user-icon.jpg" alt="">
                    </figure>
                    <h3>Joao Macedo Santos</h3>
                </li>
                <li class="usuario">
                    <figure>
                        <img src="" alt="">
                    </figure>
                    <p>Usuário</p>
                </li>
                <li class="catalogo">
                    <figure>
                        <img src="" alt="">
                    </figure>
                    <p>Catálogo</p>
                </li>
                <li class="suporte">
                    <figure>
                        <img src="" alt="">
                    </figure>
                    <p>Suporte</p>
                </li>
                <li class="configuracoes">
                    <figure>
                        <img src="" alt="">
                    </figure>
                    <p>Configurações</p>
                </li>
                <li class="sair">
                    <figure>
                        <img src="" alt="">
                    </figure>
                    <p>Sair</p>
                    </li>
            </ul>
        </aside>
        <main class="user-content">
            <div class="user-photo">
                <figure>
                    <img src="../assets/perfil-usuario/user-icon.jpg" alt="">
                </figure>
                <h2>Joao Macedo Santos</h2>
            </div>
            <section>
                <div class="user-info">
                    <div class="title">
                        <h3>Dados Pessoais</h3>
                    </div>
                    <input type="text" placeholder="Nome Completo" name="nome" id="nome">
                    <input type="number" name="idade" id="idade">
                    <select name="ganero" id="genero">
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                        <option value="outro">Outro</option>
                        <option value="no-info">Prefiro não informar</option>
                    </select>
                </div>
                <div class="about-me">
                    <input type="text" name="about-me" id="about-me" placeholder="Sobre mim">
                </div>
                <div class="user-contact">
                    <div class="title">
                        <h3>Contatos</h3>
                    </div>
                    <input type="email" name="email" id="email">
                    <input type="tel" name="tel" id="tel">
                    <select name="cidade" id="cidade">
                        <option value="juazeiro-do-norte">Juazeiro do Norte</option>
                        <option value="crato">Crato</option>
                        <option value="barbalha">Barbalha</option>
                    </select>
                </div>
                <div class="saude">
                    <div class="title">
                        <h3>Saúde</h3>
                    </div>
                    <input type="number" name="peso" id="peso">
                    <input type="number" name="imc" id="imc">
                    <input type="number" name="altura" id="altura">
                </div>
                <div class="fim">
                    <input type="submit" name="salvar-perfil" id="salvar-perfil">
                    <input type="submit" name="alterar-senha" id="alterar-senha">
                </div>
            </section>
        </main>
    </div>
</body>
</html>