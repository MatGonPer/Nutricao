<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <!-- O CSS será criado no próximo bloco -->
    <link rel="stylesheet" href="../css/configuracoes.css">
    <link rel="shortcut icon" href="https://placehold.co/32x32/053225/F5E9E2?text=P" type="image/x-icon">
</head>
<body>
   <div class="container">
        <!-- SEÇÃO ESQUERDA (MENU LATERAL) - Consistente com as outras páginas -->
        <section class="left">
            <div class="profile">
                <figure>
                    <img src="https://placehold.co/120x120/F5E9E2/053225?text=FN" alt="Foto de perfil">
                </figure>
                <h2>Francisco do Nascimento</h2>
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
                        <!-- Item ativo -->
                        <li class="active"><a href="#"><img src="../assets/perfil-usuario/configuracao-icon.svg" alt="Ícone Configurações" width="25">Configurações</a></li>
                    </ul>
                </nav>
            </aside>
        </section>

        <!-- SEÇÃO DIREITA (CONTEÚDO PRINCIPAL) -->
        <section class="right">
           <header class="header-main">
               <h1>Configurações</h1>
           </header>

           <div class="settings-content">
               <!-- Card de Configurações de Notificações -->
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

               <!-- Card de Configurações de Aparência -->
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

               <!-- Card de Gerenciamento da Conta -->
               <div class="settings-card">
                   <h2>Gerenciamento da Conta</h2>
                   <div class="account-actions">
                       <button class="btn btn-secondary">Alterar Senha</button>
                       <button class="btn btn-secondary">Exportar meus dados</button>
                       <button class="btn btn-danger">Deletar minha conta</button>
                   </div>
               </div>
           </div>
        </section>
   </div>
</body>
</html>
