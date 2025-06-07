<?php
// Determina a URL base dinamicamente para garantir que os caminhos para os assets (CSS, JS) funcionem corretamente.
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
// Pega o caminho do diretório onde o script está sendo executado.
$script_path = dirname($_SERVER['SCRIPT_NAME']);
// Normaliza o caminho para evitar barras duplas ou caminhos incorretos se estiver na raiz.
$base_path = rtrim($script_path, '/\\');
$base_url = $protocol . $host . $base_path . '/';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Desempenho - Interativo</title>
    
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom Stylesheet with dynamic base URL -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>../css/dashboard-usuario.css">
    
    <!-- Chart.js for data visualization -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom JavaScript with dynamic base URL -->
    <script src="<?php echo $base_url; ?>../js/dashboard-usuario.js" defer></script>
</head>
<body>

    <div class="app-container">
        <!-- Left Sidebar -->
        <section class="left">
            <div class="profile">
                <figure>
                    <img src="https://placehold.co/100x100/F5E9E2/053225?text=FN" alt="Foto de perfil">
                </figure>
                <h2>Francisco do Nascimento</h2>
            </div>
            <aside>
                <nav>
                    <ul>
                        <li><a href="#"><img src="https://placehold.co/25x25/ffffff/000000?text=I" alt="Ícone Início" width="25">Início</a></li>
                        <li><a href="#"><img src="https://placehold.co/25x25/ffffff/000000?text=U" alt="Ícone Usuário" width="25">Usuário</a></li>
                        <li class="active"><a href="#"><img src="https://placehold.co/25x25/ffffff/000000?text=D" alt="Ícone Desempenho" width="25">Desempenho</a></li>
                        <li><a href="#"><img src="https://placehold.co/25x25/ffffff/000000?text=T" alt="Ícone Treino" width="25">Treino</a></li>
                        <li><a href="#"><img src="https://placehold.co/25x25/ffffff/000000?text=C" alt="Ícone Consultas" width="25">Consultas</a></li>
                        <li><a href="#"><img src="https://placehold.co/25x25/ffffff/000000?text=C" alt="Ícone Catálogo" width="25">Catálogo</a></li>
                        <li><a href="#"><img src="https://placehold.co/25x25/ffffff/000000?text=S" alt="Ícone Suporte" width="25">Suporte</a></li>
                        <li><a href="#"><img src="https://placehold.co/25x25/ffffff/000000?text=CF" alt="Ícone Configurações" width="25">Configurações</a></li>
                    </ul>
                </nav>
            </aside>
        </section>

        <!-- Main Content -->
        <div class="main-content">
            <header class="main-header">
                <h1>Meu Desempenho</h1>
                <div class="header-actions">
                     <button id="set-monthly-goals-btn" class="btn btn-primary">Metas Mensais</button>
                     <button id="set-daily-goals-btn" class="btn btn-secondary">Metas Diárias</button>
                     <button id="mobile-menu-button" class="mobile-menu-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                    </button>
                </div>
            </header>
            
            <nav id="mobile-menu" class="mobile-menu">
                 <a href="#">Início</a>
                 <a href="#">Usuário</a>
                 <a href="#" class="active">Desempenho</a>
                 <a href="#" id="mobile-set-monthly-goals-btn">Metas Mensais</a>
                 <a href="#" id="mobile-set-daily-goals-btn">Metas Diárias</a>
            </nav>

            <main class="content-area">
                <section class="content-section">
                    <h2>Monitoramento de Hoje</h2>
                    <div class="cards-grid">
                         <div class="card card-water">
                            <div><div class="card-header"><h3 class="card-title">Água</h3><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path></svg></div><p class="card-value"><span id="water-current">0</span><span class="card-unit"> / <span id="water-goal-display">3</span> L</span></p></div>
                            <div class="card-actions"><button onclick="updateMetric('water', -0.25)" class="btn-minus">-</button><button onclick="updateMetric('water', 0.25)" class="btn-plus">+</button></div>
                        </div>
                        <div class="card card-sleep">
                            <div><div class="card-header"><h3 class="card-title">Sono</h3><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21a9 9 0 1 1 0-18Z"></path><path d="M8 11.37A6 6 0 0 1 18 10h-6Z"></path></svg></div><p class="card-value"><span id="sleep-current">0</span><span class="card-unit"> / <span id="sleep-goal-display">8</span> h</span></p></div>
                            <div class="card-actions"><button onclick="updateMetric('sleep', -0.5)" class="btn-minus">-</button><button onclick="updateMetric('sleep', 0.5)" class="btn-plus">+</button></div>
                        </div>
                       <div class="card card-calories">
                            <div><div class="card-header"><h3 class="card-title">Calorias</h3><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 10.5c-2.2.6-4.5.4-6.5-1.5-2.1-2-2.1-5.5 0-7.5 2-2 5.4-2.1 7.5 0 .1.1.2.2.3.3.4.4.7.9.9 1.4.3 1 .2 2.2-.4 3.2l-1.3 1.6"></path><path d="m11 11.5 1.5 1.5c.6.5 1.4.7 2.1.5l3.2-.8c.9-.2 1.8.3 2.2 1.1l.2.5c.5 1.2.3 2.6-.6 3.7C18 19.2 16.1 20 14.5 20c-2.3 0-4.5-1.1-6-3-1.5-1.8-1.5-4.4 0-6.2 1.2-1.5 3-2.3 4.8-2.3"></path></svg></div><p class="card-value"><span id="calories-current">0</span><span class="card-unit"> / <span id="calories-goal-display">2200</span> kcal</span></p></div>
                            <div class="card-actions"><button onclick="updateMetric('calories', -50)" class="btn-minus">-</button><button onclick="updateMetric('calories', 50)" class="btn-plus">+</button></div>
                        </div>
                        <div class="card card-workout">
                            <div><div class="card-header"><h3 class="card-title">Exercício</h3><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13.4 2.6 3 14h9l-1 8 10.4-11.4H11l1-8z"></path></svg></div><p class="card-value"><span id="workout-current">0</span><span class="card-unit"> / <span id="workout-goal-display">45</span> min</span></p></div>
                            <div class="card-actions"><button onclick="updateMetric('workout', -5)" class="btn-minus">-</button><button onclick="updateMetric('workout', 5)" class="btn-plus">+</button></div>
                        </div>
                    </div>
                </section>
                
                <section class="content-section">
                    <h2>Progresso Mensal</h2>
                    <div class="chart-container">
                       <div class="chart-header">
                           <button id="prev-month-btn" class="month-nav-btn">&lt;</button>
                           <h3 id="month-year-title"></h3>
                           <button id="next-month-btn" class="month-nav-btn">&gt;</button>
                       </div>
                       <div class="chart-wrapper"><canvas id="progressChart"></canvas></div>
                    </div>
                </section>

                <section class="content-section">
                    <h2>Médias do Mês</h2>
                    <div id="averages-container" class="cards-grid">
                        <!-- Averages will be populated here by JS -->
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Edit Day Modal -->
    <div id="edit-modal" class="modal-overlay">
        <div class="modal-content">
            <h3 class="modal-title">Editar Dia</h3>
            <p id="modal-date" class="modal-date"></p>
            
            <h4 class="form-subtitle">Valores Registrados</h4>
            <div class="modal-form">
                <div class="form-group"><label for="modal-value-water">Água (L)</label><input type="number" id="modal-value-water" step="0.1"></div>
                <div class="form-group"><label for="modal-value-sleep">Sono (h)</label><input type="number" id="modal-value-sleep" step="0.5"></div>
                <div class="form-group"><label for="modal-value-calories">Calorias (kcal)</label><input type="number" id="modal-value-calories" step="10"></div>
                <div class="form-group"><label for="modal-value-workout">Exercício (min)</label><input type="number" id="modal-value-workout" step="1"></div>
            </div>

            <hr class="form-divider">

            <h4 class="form-subtitle">Metas para este Dia</h4>
            <div class="modal-form">
                <div class="form-group"><label for="modal-goal-water">Meta de Água (L)</label><input type="number" id="modal-goal-water" step="0.1"></div>
                <div class="form-group"><label for="modal-goal-sleep">Meta de Sono (h)</label><input type="number" id="modal-goal-sleep" step="0.5"></div>
                <div class="form-group"><label for="modal-goal-calories">Meta de Calorias (kcal)</label><input type="number" id="modal-goal-calories" step="10"></div>
                <div class="form-group"><label for="modal-goal-workout">Meta de Exercício (min)</label><input type="number" id="modal-goal-workout" step="1"></div>
            </div>

            <div class="modal-actions">
                <button id="modal-cancel-edit" class="btn btn-secondary">Cancelar</button>
                <button id="modal-save-edit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
    
    <!-- Set Monthly Goals Modal -->
    <div id="monthly-goals-modal" class="modal-overlay">
        <div class="modal-content">
            <h3 class="modal-title">Definir Metas Mensais</h3>
            <p class="modal-date">Estes serão os valores padrão para o mês.</p>
            <div class="modal-form">
                <div class="form-group"><label for="monthly-goal-water">Meta de Água (L)</label><input type="number" id="monthly-goal-water" step="0.1"></div>
                <div class="form-group"><label for="monthly-goal-sleep">Meta de Sono (h)</label><input type="number" id="monthly-goal-sleep" step="0.5"></div>
                <div class="form-group"><label for="monthly-goal-calories">Meta de Calorias (kcal)</label><input type="number" id="monthly-goal-calories" step="50"></div>
                <div class="form-group"><label for="monthly-goal-workout">Meta de Exercício (min)</label><input type="number" id="monthly-goal-workout" step="5"></div>
            </div>
            <div class="modal-actions">
                <button id="modal-cancel-monthly-goals" class="btn btn-secondary">Cancelar</button>
                <button id="modal-save-monthly-goals" class="btn btn-primary">Salvar Metas</button>
            </div>
        </div>
    </div>

    <!-- Set Daily Goals Modal -->
    <div id="daily-goals-modal" class="modal-overlay">
        <div class="modal-content">
            <h3 class="modal-title">Definir Metas Diárias</h3>
            <div class="modal-form">
                 <div class="form-group">
                    <label for="daily-goal-date">Selecione o Dia</label>
                    <input type="date" id="daily-goal-date">
                </div>
                <hr class="form-divider">
                <div class="form-group"><label for="daily-goal-water">Meta de Água (L)</label><input type="number" id="daily-goal-water" step="0.1" placeholder="Padrão do mês"></div>
                <div class="form-group"><label for="daily-goal-sleep">Meta de Sono (h)</label><input type="number" id="daily-goal-sleep" step="0.5" placeholder="Padrão do mês"></div>
                <div class="form-group"><label for="daily-goal-calories">Meta de Calorias (kcal)</label><input type="number" id="daily-goal-calories" step="50" placeholder="Padrão do mês"></div>
                <div class="form-group"><label for="daily-goal-workout">Meta de Exercício (min)</label><input type="number" id="daily-goal-workout" step="5" placeholder="Padrão do mês"></div>
            </div>
            <div class="modal-actions">
                <button id="modal-cancel-daily-goals" class="btn btn-secondary">Cancelar</button>
                <button id="modal-save-daily-goals" class="btn btn-primary">Salvar Metas do Dia</button>
            </div>
        </div>
    </div>

</body>
</html>
