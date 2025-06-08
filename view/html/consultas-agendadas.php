<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Agendadas</title>
    
    <!-- Link para o arquivo CSS externo -->
    <link rel="stylesheet" href="../css/consultas-agendadas.css">
    
    <!-- Favicon de exemplo -->
    <link rel="shortcut icon" href="https://placehold.co/32x32/053225/F5E9E2?text=C" type="image/x-icon">
</head>
<body>
    <div class="container">
        <!-- SEÇÃO ESQUERDA (MENU LATERAL) -->
        <section class="left">
            <div class="profile">
                <figure>
                    <!-- Imagem de perfil de exemplo -->
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
                        <li class="active"><a href="consultas-agendadas.php"><img src="../assets/perfil-usuario/consultas-icon.svg" alt="Ícone Consultas" width="25">Consultas</a></li>
                        <li><a href="parceiros.php"><img src="../assets/perfil-usuario/catalogo-icon.svg" alt="Ícone Catálogo" width="25">Catálogo</a></li>
                        <li><a href="suporte.php"><img src="../assets/perfil-usuario/suporte-icon.svg" alt="Ícone Suporte" width="25">Suporte</a></li>
                        <li><a href="configuracoes.php"><img src="../assets/perfil-usuario/configuracao-icon.svg" alt="Ícone Configurações" width="25">Configurações</a></li>
                    </ul>
                </nav>
            </aside>
        </section>
        
        <!-- SEÇÃO DIREITA (CONTEÚDO PRINCIPAL) -->
        <section class="right">
            <main>
                <div class="header-main">
                    <div class="titulo">
                        <h1>AGENDADOS</h1>
                    </div>
                    <div class="header-actions">
                        <button id="solicitarConsultaBtn" class="btn btn-principal">Solicitar Consulta</button>
                    </div>
                </div>

                <div class="profissionais">
                    <!-- Card Nutricionista -->
                    <div class="nutricionista card-consulta">
                        <div class="chat">
                            <h3>Nutricionista</h3>
                            <a href="#" aria-label="Abrir chat com Nutricionista">
                                <figure>
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0xMiAyMHYtNC44Yy41LS4yIDEuNS0uOCAxLjUtMS4ycy0xLjMtMS41LTItMS41LTIgLjUtMiAxLjVzMSAxIDEuNSAxLjJWMjBaIi8+PHBhdGggZD0iTTEyIDJ2NG0wIDBsMi4yNS0yLjI1TTEyIDZsLTIuMjUtMi4yNSIvPjxwYXRoIGQ9Ik0xMiAxM2wyIDIuNSIvPjxwYXRoIGQ9Ik0xMiAxM2wtMiAyLjUiLz48L3N2Zz4=" alt="Ícone de Chat">
                                </figure>
                            </a>
                        </div>
                        <div class="consulta-data">
                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiM1NTUiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cmVjdCB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHg9IjMiIHk9IjQiIHJ4PSIyIiByeT0iMiIvPjxsaW5lIHgxPSIxNiIgeDI9IjE2IiB5MT0iMiIgeTI9IjYiLz48bGluZSB4MT0iOCIgeDI9IjgiIHkxPSIyIiB5Mj0iNiIvPjxsaW5lIHgxPSIzIiB4Mj0iMjEiIHkxPSIxMCIgeTI9IjEwIi8+PC9zdmc+" alt="Ícone de Calendário">
                            <span>Agendado para: <strong>22 de Junho de 2025</strong></span>
                        </div>
                        <div class="info">
                            <p>Avaliação Antropométrica</p>
                            <p>Plano Alimentar Personalizado</p>
                        </div>
                        <div class="card-actions">
                            <button class="btn btn-cancelar">Cancelar Consulta</button>
                        </div>
                    </div>

                    <!-- Card Personal Trainer -->
                    <div class="personal card-consulta">
                        <div class="chat">
                            <h3>Personal</h3>
                            <a href="#" aria-label="Abrir chat com Personal">
                                <figure>
                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0xMiAyMHYtNC44Yy41LS4yIDEuNS0uOCAxLjUtMS4ycy0xLjMtMS41LTItMS41LTIgLjUtMiAxLjVzMSAxIDEuNSAxLjJWMjBaIi8+PHBhdGggZD0iTTEyIDJ2NG0wIDBsMi4yNS0yLjI1TTEyIDZsLTIuMjUtMi4yNSIvPjxwYXRoIGQ9Ik0xMiAxM2wyIDIuNSIvPjxwYXRoIGQ9Ik0xMiAxM2wtMiAyLjUiLz48L3N2Zz4=" alt="Ícone de Chat">
                                </figure>
                            </a>
                        </div>
                         <div class="consulta-data">
                             <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiM1NTUiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cmVjdCB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHg9IjMiIHk9IjQiIHJ4PSIyIiByeT0iMiIvPjxsaW5lIHgxPSIxNiIgeDI9IjE2IiB5MT0iMiIgeTI9IjYiLz48bGluZSB4MT0iOCIgeDI9IjgiIHkxPSIyIiB5Mj0iNiIvPjxsaW5lIHgxPSIzIiB4Mj0iMjEiIHkxPSIxMCIgeTI9IjEwIi8+PC9zdmc+" alt="Ícone de Calendário">
                            <span>Agendado para: <strong>30 de Junho de 2025</strong></span>
                        </div>
                        <div class="info">
                            <p>Definição de plano de treino</p>
                        </div>
                        <div class="card-actions">
                            <button class="btn btn-cancelar">Cancelar Consulta</button>
                        </div>
                    </div>
                </div>
            </main>
        </section>
    </div>

    <!-- Modal para Solicitar Consulta -->
    <div id="solicitarModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Solicitar Nova Consulta</h2>
                <button id="fecharSolicitarModal" class="close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <label for="tipoProfissional">Selecione o profissional:</label>
                <select id="tipoProfissional">
                    <option value="Nutricionista">Nutricionista</option>
                    <option value="Personal">Personal</option>
                </select>
                <label for="novaConsultaData">Selecione a data:</label>
                <input type="date" id="novaConsultaData">
            </div>
            <div class="modal-footer">
                <button id="confirmarSolicitacaoBtn" class="btn btn-principal">Confirmar Agendamento</button>
            </div>
        </div>
    </div>

    <!-- Modal para Confirmar Cancelamento -->
    <div id="cancelarModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Confirmar Cancelamento</h2>
            </div>
            <div class="modal-body">
                <p>Você tem certeza que deseja cancelar esta consulta?</p>
            </div>
            <div class="modal-footer">
                <button id="naoCancelarBtn" class="btn btn-neutro">Não</button>
                <button id="simCancelarBtn" class="btn btn-cancelar">Sim, Cancelar</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Seletores de Elementos ---
            const solicitarModal = document.getElementById('solicitarModal');
            const cancelarModal = document.getElementById('cancelarModal');
            const fecharSolicitarModalBtn = document.getElementById('fecharSolicitarModal');
            const solicitarConsultaBtn = document.getElementById('solicitarConsultaBtn');
            const confirmarSolicitacaoBtn = document.getElementById('confirmarSolicitacaoBtn');
            const naoCancelarBtn = document.getElementById('naoCancelarBtn');
            const simCancelarBtn = document.getElementById('simCancelarBtn');
            const profissionaisContainer = document.querySelector('.profissionais');
            let cardParaCancelar = null;

            // --- FUNÇÕES DO MODAL ---
            
            // Função para fechar qualquer modal
            function fecharModal(modal) {
                if (modal) modal.style.display = 'none';
            }

            // --- LÓGICA PARA SOLICITAR CONSULTA ---

            // Abrir modal de Solicitação
            solicitarConsultaBtn.addEventListener('click', () => {
                // Tratamento de data: impede selecionar datas passadas
                const novaConsultaDataInput = document.getElementById('novaConsultaData');
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0'); // Adiciona 0 à esquerda se necessário
                const day = String(today.getDate()).padStart(2, '0'); // Adiciona 0 à esquerda se necessário
                
                const hojeFormatado = `${year}-${month}-${day}`;
                novaConsultaDataInput.setAttribute('min', hojeFormatado);
                novaConsultaDataInput.value = ''; // Limpa o valor anterior

                solicitarModal.style.display = 'flex';
            });

            // Lógica para confirmar o agendamento de uma nova consulta
            confirmarSolicitacaoBtn.addEventListener('click', () => {
                const tipo = document.getElementById('tipoProfissional').value;
                const dataInput = document.getElementById('novaConsultaData').value;

                if (!dataInput) {
                    alert('Por favor, selecione uma data válida.');
                    return;
                }
                
                // Formata a data para um formato amigável
                const dataObj = new Date(dataInput + 'T00:00:00');
                const opcoesData = { day: 'numeric', month: 'long', year: 'numeric' };
                const dataFormatada = dataObj.toLocaleDateString('pt-BR', opcoesData);

                // Cria um novo card dinamicamente
                const novoCard = document.createElement('div');
                novoCard.classList.add(tipo.toLowerCase(), 'card-consulta');
                
                let infoP = `<p>Definição de plano de treino</p>`;
                if (tipo === 'Nutricionista') {
                    infoP = `<p>Avaliação Antropométrica</p><p>Plano Alimentar Personalizado</p>`;
                }
                
                novoCard.innerHTML = `
                    <div class="chat">
                        <h3>${tipo}</h3>
                        <a href="#" aria-label="Abrir chat com ${tipo}">
                            <figure><img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0xMiAyMHYtNC44Yy41LS4yIDEuNS0uOCAxLjUtMS4ycy0xLjMtMS41LTItMS41LTIgLjUtMiAxLjVzMSAxIDEuNSAxLjJWMjBaIi8+PHBhdGggZD0iTTEyIDJ2NG0wIDBsMi4yNS0yLjI1TTEyIDZsLTIuMjUtMi4yNSIvPjxwYXRoIGQ9Ik0xMiAxM2wyIDIuNSIvPjxwYXRoIGQ9Ik0xMiAxM2wtMiAyLjUiLz48L3N2Zz4=" alt="Ícone de Chat"></figure>
                        </a>
                    </div>
                    <div class="consulta-data">
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiM1NTUiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cmVjdCB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHg9IjMiIHk9IjQiIHJ4PSIyIiByeT0iMiIvPjxsaW5lIHgxPSIxNiIgeDI9IjE2IiB5MT0iMiIgeTI9IjYiLz48bGluZSB4MT0iOCIgeDI9IjgiIHkxPSIyIiB5Mj0iNiIvPjxsaW5lIHgxPSIzIiB4Mj0iMjEiIHkxPSIxMCIgeTI9IjEwIi8+PC9zdmc+" alt="Ícone de Calendário">
                        <span>Agendado para: <strong>${dataFormatada}</strong></span>
                    </div>
                    <div class="info">
                        ${infoP}
                    </div>
                    <div class="card-actions">
                        <button class="btn btn-cancelar">Cancelar Consulta</button>
                    </div>`;
                
                profissionaisContainer.appendChild(novoCard);
                fecharModal(solicitarModal);
            });


            // --- LÓGICA PARA CANCELAR CONSULTA ---

            // Delegação de evento: um único listener para todos os botões de cancelar
            profissionaisContainer.addEventListener('click', function(event) {
                // Verifica se o elemento clicado é um botão de cancelar
                if (event.target.classList.contains('btn-cancelar')) {
                    cardParaCancelar = event.target.closest('.card-consulta'); // Guarda o card a ser removido
                    cancelarModal.style.display = 'flex'; // Mostra o modal de confirmação
                }
            });

            // Ação ao clicar em "Sim, Cancelar" no modal
            simCancelarBtn.addEventListener('click', () => {
                if (cardParaCancelar) {
                    cardParaCancelar.remove(); // Remove o card do HTML
                    cardParaCancelar = null;   // Limpa a variável
                }
                fecharModal(cancelarModal);
            });

            // --- EVENTOS PARA FECHAR MODAIS ---
            fecharSolicitarModalBtn.addEventListener('click', () => fecharModal(solicitarModal));
            naoCancelarBtn.addEventListener('click', () => fecharModal(cancelarModal));
            
            // Fecha o modal se o usuário clicar fora da área de conteúdo
            window.addEventListener('click', (event) => {
                if (event.target === solicitarModal) {
                    fecharModal(solicitarModal);
                }
                if (event.target === cancelarModal) {
                    fecharModal(cancelarModal);
                }
            });
        });
    </script>
</body>
</html>
