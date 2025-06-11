<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

require_once __DIR__ . "/../../model/PerfilUsuario.php";
require_once __DIR__ . "/../../model/Usuario.php";
require_once __DIR__ . "/../../model/Configuracoes.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link rel="stylesheet" href="../css/configuracoes.css">
    <link rel="shortcut icon" href="https://placehold.co/32x32/053225/F5E9E2?text=P" type="image/x-icon">
</head>
<body>
   <div class="container">
        <section class="left">
            <div class="profile">
                <figure>
                    <?php
                    $caminho_base_foto = '../assets/perfil-usuario/foto/';
                    $foto_padrao = '../assets/perfil-usuario/user-icon-default-mod.jpeg';

                    if ($sucesso === true && !empty($perfil->getFoto())) {
                        $foto_perfil = $caminho_base_foto . htmlspecialchars($perfil->getFoto());
                    } else {
                        $foto_perfil = $foto_padrao;
                    }
                    ?>
                    <img src="<?php echo $foto_perfil; ?>" alt="Foto de perfil">
                </figure>
                <?php
                    if(!empty($usuario->getNome())) {
                        echo "<h2>{$usuario->getNome()}</h2>";
                    } else {
                        echo "<h2>Usuário</h2>";
                    }
                ?>
            </div>
            <aside>
                <nav>
                    <ul>
                        <li><a href="perfil-usuario.php"><img src="../assets/perfil-usuario/profile-icon.svg" alt="Ícone Usuário" width="25">Usuário</a></li>
                        <li><a href="dashboard-usuario.php"><img src="../assets/perfil-usuario/desempenho-icon.svg" alt="Ícone Desempenho" width="25">Desempenho</a></li>
                        <li><a href="treinos.php"><img src="../assets/perfil-usuario/treinos-icon.svg" alt="Ícone Treino" width="25">Treino</a></li>
                        <li><a href="consultas-agendadas.php"><img src="../assets/perfil-usuario/consultas-icon.svg" alt="Ícone Consultas" width="25">Consultas</a></li>
                        <li><a href="parceiros.php"><img src="../assets/perfil-usuario/catalogo-icon.svg" alt="Ícone Catálogo" width="25">Catálogo</a></li>
                        <li><a href="suporte.php"><img src="../assets/perfil-usuario/suporte-icon.svg" alt="Ícone Suporte" width="25">Suporte</a></li>
                        <li class="active"><a href="#"><img src="../assets/perfil-usuario/configuracao-icon.svg" alt="Ícone Configurações" width="25">Configurações</a></li>
                    </ul>
                </nav>
            </aside>
        </section>
        <section class="right">
           <header class="header-main">
               <h1>Configurações</h1>
           </header>
           <div class="settings-content">
               <div class="settings-card">
                   <h2>Notificações</h2>
                   <div class="setting-item">
                       <p>Lembretes de hidratação</p>
                       <label class="toggle-switch">
                           <input type="checkbox" checked>
                           <span class="slider"></span>
                       </label>
                   </div>
                   <div class="setting-item">
                       <p>Avisos de treino</p>
                       <label class="toggle-switch">
                           <input type="checkbox" checked>
                           <span class="slider"></span>
                       </label>
                   </div>
                   <div class="setting-item">
                       <p>Novidades e promoções</p>
                       <label class="toggle-switch">
                           <input type="checkbox">
                           <span class="slider"></span>
                       </label>
                   </div>
               </div>
               <div class="settings-card">
                   <h2>Aparência</h2>
                   <div class="setting-item">
                       <p>Tema</p>
                       <div class="theme-options">
                           <label class="theme-btn active">
                               <input type="radio" name="theme" value="light" checked> Claro
                           </label>
                           <label class="theme-btn">
                               <input type="radio" name="theme" value="dark"> Escuro
                           </label>
                       </div>
                   </div>
               </div>
               <div class="settings-card">
                   <h2>Gerenciamento da Conta</h2>
                   <div class="account-actions">
                       <button class="btn btn-secondary" id="botaoAlterarSenha">Alterar Senha</button>
                        <dialog class="dialogAlterarSenha" id="dialogAlterarSenha">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="dialogDiv">
                                <h1>Alterar senha</h1>
                                <p>Digite a sua nova senha</p>
                                <input type="password" name="alterarSenha" id="alterarSenha" autocomplete="new-password">
                            </div>
                            <div class="dialogDivB">
                                <button type="submit" id="botaoConfirmar" name="botaoConfirmar">Confirmar</button>
                                <button type="button" id="botaoCancelar">Cancelar</button>
                            </div>
                            </form>
                        </dialog>
                       <button class="btn btn-danger" id="botaoDeletarConta">Deletar minha conta</button>
                       <dialog class="dialogDeletarConta" id="dialogDeletarConta">
                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                <div class="deletarContaDiv">
                                    <h1>DELETAR CONTA</h1>
                                    <p>Tem certeza que deseja <strong>DELETAR SUA CONTA?</strong></p>
                                    <div class="dialogDivC">
                                        <button type="submit" name="deletarConta" id="deletarConta">SIM</button>
                                        <button type="button" name="cancelarDeletarConta" id="cancelarDeletarConta">CANCELAR</button>
                                    </div>
                                </div>
                            </form>
                       </dialog>
                   </div>
               </div>
           </div>
        </section>
   </div>
<script>
    //Modal Alterar Senha
    const dialogAlterarSenha = document.getElementById('dialogAlterarSenha');
    const botaoAlterarSenha = document.getElementById("botaoAlterarSenha");
    const botaoConfirmar = document.getElementById("botaoConfirmar");
    const botaoCancelar = document.getElementById("botaoCancelar");

    //Modal Deletar Conta
    const dialogDeletarConta = document.getElementById("dialogDeletarConta");
    const botaoDeletarConta = document.getElementById("botaoDeletarConta");
    const cancelarDeletarConta = document.getElementById("cancelarDeletarConta");

    botaoAlterarSenha.onclick = function() {
        dialogAlterarSenha.showModal();
    };

    botaoCancelar.onclick = function() {
        dialogAlterarSenha.close();
    };

    botaoConfirmar.onclick = function() {

    };

    botaoDeletarConta.onclick = function() {
        dialogDeletarConta.showModal();
    };

    cancelarDeletarConta.onclick = function() {
        dialogDeletarConta.close();
    }
</script>
</body>
</html>
