<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://placehold.co/32x32/053225/F5E9E2?text=P" type="image/x-icon">
    <title>Meu Perfil</title>
    <!-- Link para o arquivo CSS externo -->
    <link rel="stylesheet" href="../css/perfil-usuario.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <section class="left">
            <div class="profile">
                <figure>
                    <img src="https://placehold.co/200x200/F5E9E2/053225?text=FN" alt="Foto de perfil">
                </figure>
                <h2>Francisco do Nascimento</h2>
            </div>
            <aside>
                <nav>
                    <ul>
                        <li><a href="perfil-usuario.php"><img src="../assets/perfil-usuario/profile-icon.svg" alt="Ícone Usuário" width="25">Usuário</a></li>
                        <li class="active"><a href="dashboard-usuario.php"><img src="../assets/perfil-usuario/desempenho-icon.svg" alt="Ícone Desempenho" width="25">Desempenho</a></li>
                        <li><a href="treinos.php"><img src="../assets/perfil-usuario/treinos-icon.svg" alt="Ícone Treino" width="25">Treino</a></li>
                        <li><a href="consultas-agendadas.php"><img src="../assets/perfil-usuario/consultas-icon.svg" alt="Ícone Consultas" width="25">Consultas</a></li>
                        <li><a href="parceiros.php"><img src="../assets/perfil-usuario/catalogo-icon.svg" alt="Ícone Catálogo" width="25">Catálogo</a></li>
                        <li><a href="suporte.php"><img src="../assets/perfil-usuario/suporte-icon.svg" alt="Ícone Suporte" width="25">Suporte</a></li>
                        <li><a href="#"><img src="../assets/perfil-usuario/configuracao-icon.svg" alt="Ícone Configurações" width="25">Configurações</a></li>
                    </ul>
                </nav>
            </aside>
        </section>
        <section class="container-right">
            <main>
                <header class="profile-header">
                    <figure class="profile-picture-container">
                        <img src="https://placehold.co/200x200/cccccc/333333?text=Sua+Foto" alt="Foto de perfil" id="preview-image">
                        <label for="profile-photo" class="edit-icon">
                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiNGRkZGRkYiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cGF0aCBkPSJNMTIgMjBIMjFNNCAxMy41VjE4YzAgMS4xLjkxIDIgMiAyaDNsOS41LTkuNUwxMy41IDRaIi8+PC9zdmc+" alt="Editar foto">
                        </label>
                        <input type="file" id="profile-photo" name="profile-photo" accept="image/*" style="display: none;">
                    </figure>
                    <h2>Francisco do Nascimento</h2>
                </header>
                <form class="profile-form" action="#" method="POST">
                    <fieldset>
                        <legend>Dados Pessoais</legend>
                        <div class="form">
                            <input type="text" placeholder="Nome Completo" value="Francisco do Nascimento">
                            <input type="date" placeholder="Data de Nascimento">
                            <select class="gender" name="sexo">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                <option value="P">Prefiro não informar</option>
                            </select>
                            <textarea class="about" name="sobreMim" placeholder="Sobre mim..."></textarea>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Contato</legend>
                        <div class="form">
                            <input type="email" name="email" placeholder="E-mail">
                            <input type="tel" name="telefone" placeholder="Telefone">
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Saúde</legend>
                        <div class="form">
                            <input type="text" name="peso" placeholder="Peso (kg)">
                            <input type="text" name="altura" placeholder="Altura (m)">
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
                        <button type="submit" class="save">Salvar Perfil</button>
                        <button type="button" class="change-pass">Alterar Senha</button>
                    </div>
                </form>
            </main>
        </section>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const photoInput = document.getElementById('profile-photo');
            const previewImage = document.getElementById('preview-image');

            photoInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
</body>
</html>
