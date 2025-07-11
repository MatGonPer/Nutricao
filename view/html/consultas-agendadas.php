<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

require_once __DIR__ . "/../../model/PerfilUsuario.php";
require_once __DIR__ . "/../../model/Usuario.php";
require_once __DIR__ . "/../../model/ConsultasAgendadas.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Agendadas</title>
    <link rel="stylesheet" href="../css/consultas-agendadas.css">
    <link rel="shortcut icon" href="https://placehold.co/32x32/053225/F5E9E2?text=C" type="image/x-icon">
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
                        <li class="active"><a href="consultas-agendadas.php"><img src="../assets/perfil-usuario/consultas-icon.svg" alt="Ícone Consultas" width="25">Consultas</a></li>
                        <li><a href="parceiros.php"><img src="../assets/perfil-usuario/catalogo-icon.svg" alt="Ícone Catálogo" width="25">Catálogo</a></li>
                        <li><a href="suporte.php"><img src="../assets/perfil-usuario/suporte-icon.svg" alt="Ícone Suporte" width="25">Suporte</a></li>
                        <li><a href="configuracoes.php"><img src="../assets/perfil-usuario/configuracao-icon.svg" alt="Ícone Configurações" width="25">Configurações</a></li>
                    </ul>
                </nav>
            </aside>
        </section>
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
            const solicitarModal = document.getElementById('solicitarModal');
            const cancelarModal = document.getElementById('cancelarModal');
            const fecharSolicitarModalBtn = document.getElementById('fecharSolicitarModal');
            const solicitarConsultaBtn = document.getElementById('solicitarConsultaBtn');
            const confirmarSolicitacaoBtn = document.getElementById('confirmarSolicitacaoBtn');
            const naoCancelarBtn = document.getElementById('naoCancelarBtn');
            const simCancelarBtn = document.getElementById('simCancelarBtn');
            const profissionaisContainer = document.querySelector('.profissionais');
            let cardParaCancelar = null;

            function fecharModal(modal) {
                if (modal) modal.style.display = 'none';
            }

            solicitarConsultaBtn.addEventListener('click', () => {
                const novaConsultaDataInput = document.getElementById('novaConsultaData');
                const today = new Date();
                const year = today.getFullYear();
                const month = String(today.getMonth() + 1).padStart(2, '0');
                const day = String(today.getDate()).padStart(2, '0');
                
                const hojeFormatado = `${year}-${month}-${day}`;
                novaConsultaDataInput.setAttribute('min', hojeFormatado);
                novaConsultaDataInput.value = '';

                solicitarModal.style.display = 'flex';
            });

            confirmarSolicitacaoBtn.addEventListener('click', () => {
                const tipo = document.getElementById('tipoProfissional').value;
                const dataInput = document.getElementById('novaConsultaData').value;

                if (!dataInput) {
                    alert('Por favor, selecione uma data válida.');
                    return;
                }
                
                const dataObj = new Date(dataInput + 'T00:00:00');
                const opcoesData = { day: 'numeric', month: 'long', year: 'numeric' };
                const dataFormatada = dataObj.toLocaleDateString('pt-BR', opcoesData);

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

            profissionaisContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('btn-cancelar')) {
                    cardParaCancelar = event.target.closest('.card-consulta');
                    cancelarModal.style.display = 'flex';
                }
            });

            simCancelarBtn.addEventListener('click', () => {
                if (cardParaCancelar) {
                    cardParaCancelar.remove();
                    cardParaCancelar = null;
                }
                fecharModal(cancelarModal);
            });

            fecharSolicitarModalBtn.addEventListener('click', () => fecharModal(solicitarModal));
            naoCancelarBtn.addEventListener('click', () => fecharModal(cancelarModal));
            
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
