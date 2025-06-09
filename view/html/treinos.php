<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

require_once __DIR__ . "/../../model/PerfilUsuario.php";
require_once __DIR__ . "/../../model/Usuario.php";
require_once __DIR__ . "/../../model/Treinos.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treinos</title>
    <link rel="stylesheet" href="../css/treinos.css">
    <link rel="shortcut icon" href="https://placehold.co/32x32/053225/F5E9E2?text=T" type="image/x-icon">
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
                        <li class="active"><a href="treinos.php"><img src="../assets/perfil-usuario/treinos-icon.svg" alt="Ícone Treino" width="25">Treino</a></li>
                        <li><a href="consultas-agendadas.php"><img src="../assets/perfil-usuario/consultas-icon.svg" alt="Ícone Consultas" width="25">Consultas</a></li>
                        <li><a href="parceiros.php"><img src="../assets/perfil-usuario/catalogo-icon.svg" alt="Ícone Catálogo" width="25">Catálogo</a></li>
                        <li><a href="suporte.php"><img src="../assets/perfil-usuario/suporte-icon.svg" alt="Ícone Suporte" width="25">Suporte</a></li>
                        <li><a href="configuracoes.php"><img src="../assets/perfil-usuario/configuracao-icon.svg" alt="Ícone Configurações" width="25">Configurações</a></li>
                    </ul>
                </nav>
            </aside>
        </section>
        <section class="right">
            <main>
                <div class="main-header">
                    <h1>MEUS TREINOS</h1>
                    <button class="add-workout-btn" id="addWorkoutBtn">+ Adicionar Treino</button>
                </div>
                <article class="treinos" id="workoutsContainer">
                    <div class="treino">
                        <button class="remove-workout-btn" aria-label="Remover treino">&times;</button>
                        <a href="#">
                            <figure>
                                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=500&auto=format&fit=crop" alt="Silhueta de pessoa se exercitando">
                            </figure>
                        </a>
                        <div class="info">
                            <h2>Supino reto</h2>
                            <h3>(Barra ou halteres) - 4x12</h3>
                            <p>Descanso: 2,5 minutos</p>
                        </div>
                    </div>
                    <div class="treino">
                        <button class="remove-workout-btn" aria-label="Remover treino">&times;</button>
                        <a href="#">
                            <figure>
                                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=500&auto=format&fit=crop" alt="Silhueta de pessoa se exercitando">
                            </figure>
                        </a>
                        <div class="info">
                            <h2>Agachamento Livre</h2>
                            <h3>4x10</h3>
                            <p>Descanso: 3 minutos</p>
                        </div>
                    </div>
                </article>
            </main>
        </section>
   </div>
   <div id="addWorkoutModal" class="modal-overlay">
       <div class="modal-content">
           <button class="close-btn" aria-label="Fechar">&times;</button>
           <h2>Selecione um Exercício</h2>
           <div id="exerciseList" class="modal-exercise-list">
           </div>
       </div>
   </div>
   <div id="confirmModal" class="modal-overlay">
       <div class="modal-content">
            <h2>Confirmar Ação</h2>
            <p>Tem a certeza de que deseja remover este treino?</p>
            <div class="modal-buttons">
                <button id="confirmDeleteBtn" class="btn-danger">Remover</button>
                <button id="cancelDeleteBtn" class="btn-secondary">Cancelar</button>
            </div>
       </div>
   </div>

   <script>
    document.addEventListener('DOMContentLoaded', () => {
        const addWorkoutBtn = document.getElementById('addWorkoutBtn');
        const workoutsContainer = document.getElementById('workoutsContainer');
        
        const addModal = document.getElementById('addWorkoutModal');
        const exerciseListContainer = document.getElementById('exerciseList');
        const closeModalBtn = addModal.querySelector('.close-btn');

        const confirmModal = document.getElementById('confirmModal');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
        let cardToRemove = null;

        const silhouetteImageUrl = 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=500&auto=format&fit=crop';
        
        const predefinedExercises = [
            { name: 'Supino Reto', details: '4x10', rest: '2 min' },
            { name: 'Supino Inclinado com Halteres', details: '4x12', rest: '1.5 min' },
            { name: 'Agachamento Livre com Barra', details: '4x10', rest: '3 min' },
            { name: 'Levantamento Terra', details: '3x8', rest: '3 min' },
            { name: 'Puxada Frontal (Pulley)', details: '4x12', rest: '1.5 min' },
            { name: 'Remada Curvada com Barra', details: '4x10', rest: '2 min' },
            { name: 'Desenvolvimento Militar com Barra', details: '4x10', rest: '2 min' },
            { name: 'Elevação Lateral com Halteres', details: '4x15', rest: '1 min' },
            { name: 'Rosca Direta com Barra', details: '4x12', rest: '1.5 min' },
            { name: 'Rosca Scott', details: '4x12', rest: '1.5 min' },
            { name: 'Tríceps na Polia Alta', details: '4x15', rest: '1 min' },
            { name: 'Tríceps Francês', details: '4x12', rest: '1.5 min' },
            { name: 'Leg Press 45º', details: '4x12', rest: '2 min' },
            { name: 'Mesa Flexora', details: '4x15', rest: '1 min' },
            { name: 'Panturrilha em Pé', details: '5x20', rest: '1 min' }
        ];

        const createWorkoutCard = (title, details, rest) => {
            const card = document.createElement('div');
            card.className = 'treino';
            card.innerHTML = `
                <button class="remove-workout-btn" aria-label="Remover treino">&times;</button>
                <a href="#">
                    <figure>
                        <img src="${silhouetteImageUrl}" alt="Silhueta de pessoa se exercitando">
                    </figure>
                </a>
                <div class="info">
                    <h2>${title}</h2>
                    <h3>${details}</h3>
                    <p>Descanso: ${rest}</p>
                </div>
            `;
            return card;
        };
        
        const populateExerciseList = () => {
            predefinedExercises.forEach(exercise => {
                const item = document.createElement('div');
                item.className = 'exercise-item';
                item.innerHTML = `
                    <span class="exercise-name">${exercise.name}</span>
                    <span class="exercise-details">${exercise.details}</span>
                `;
                item.addEventListener('click', () => {
                    const newCard = createWorkoutCard(exercise.name, exercise.details, exercise.rest);
                    workoutsContainer.appendChild(newCard);
                    hideModal(addModal);
                });
                exerciseListContainer.appendChild(item);
            });
        };

        const showModal = (modal) => modal.style.display = 'flex';
        const hideModal = (modal) => modal.style.display = 'none';

        addWorkoutBtn.addEventListener('click', () => showModal(addModal));

        closeModalBtn.addEventListener('click', () => hideModal(addModal));
        cancelDeleteBtn.addEventListener('click', () => hideModal(confirmModal));
        window.addEventListener('click', (e) => {
            if (e.target === addModal) hideModal(addModal);
            if (e.target === confirmModal) hideModal(confirmModal);
        });

        workoutsContainer.addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-workout-btn')) {
                cardToRemove = e.target.closest('.treino');
                showModal(confirmModal);
            }
        });

        confirmDeleteBtn.addEventListener('click', () => {
            if (cardToRemove) {
                cardToRemove.remove();
                cardToRemove = null;
            }
            hideModal(confirmModal);
        });
        
        populateExerciseList();
    });
   </script>
</body>
</html>
