<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once __DIR__ . "/../../model/PerfilUsuario.php";
require_once __DIR__ . "/../../model/AlterarFotoPerfil.php";

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://placehold.co/32x32/053225/F5E9E2?text=P" type="image/x-icon">
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="../css/perfil-usuario.css">
</head>
<body>
    <div class="app-container">
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
                if($sucesso === true && !empty($perfil->getNome())) {
                    echo "<h2>{$perfil->getNome()}</h2>";
                } else {
                    echo "<h2>Usuário</h2>";
                }
                ?>
            </div>
            <aside>
                <nav>
                    <ul>
                        <li class="active"><a href="perfil-usuario.php"><img src="../assets/perfil-usuario/profile-icon.svg" alt="Ícone Usuário" width="25">Usuário</a></li>
                        <li><a href="dashboard-usuario.php"><img src="../assets/perfil-usuario/desempenho-icon.svg" alt="Ícone Desempenho" width="25">Desempenho</a></li>
                        <li><a href="treinos.php"><img src="../assets/perfil-usuario/treinos-icon.svg" alt="Ícone Treino" width="25">Treino</a></li>
                        <li><a href="consultas-agendadas.php"><img src="../assets/perfil-usuario/consultas-icon.svg" alt="Ícone Consultas" width="25">Consultas</a></li>
                        <li><a href="parceiros.php"><img src="../assets/perfil-usuario/catalogo-icon.svg" alt="Ícone Catálogo" width="25">Catálogo</a></li>
                        <li><a href="suporte.php"><img src="../assets/perfil-usuario/suporte-icon.svg" alt="Ícone Suporte" width="25">Suporte</a></li>
                        <li><a href="configuracoes.php"><img src="../assets/perfil-usuario/configuracao-icon.svg" alt="Ícone Configurações" width="25">Configurações</a></li>
                    </ul>
                </nav>
            </aside>
        </section>
        <section class="container-right">
            <main>
                <header class="profile-header">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="profile-form-profile" id="form-principal" enctype="multipart/form-data" method="POST">
                        <figure class="profile-picture-container">
                        <?php
                        $caminho_base_foto = '../assets/perfil-usuario/foto/';
                        $foto_padrao = '../assets/perfil-usuario/user-icon-default-mod.jpeg';

                        if ($sucesso === true && !empty($perfil->getFoto())) {
                            $foto_perfil = $caminho_base_foto . htmlspecialchars($perfil->getFoto());
                        } else {
                            $foto_perfil = $foto_padrao;
                        }
                        ?>
                        <img src="<?php echo $foto_perfil; ?>" alt="Foto de perfil" id="preview-image">
                        <input type="file" name="fotoPerfil" id="fotoPerfil" style="display: none;">
                        <label for="fotoPerfil" id="fotoPerfil" class="edit-icon">
                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiNGRkZGRkYiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cGF0aCBkPSJNMTIgMjBIMjFNNCAxMy41VjE4YzAgMS4xLjkxIDIgMiAyaDNsOS41LTkuNUwxMy41IDRaIi8+PC9zdmc+" alt="Editar foto">
                        </label>
                        </figure>
                        <?php
                        if($sucesso === true && !empty($perfil->getNome())) {
                            echo "<h2>{$perfil->getNome()}</h2>";
                        } else {
                            echo "<h2>Usuário</h2>";
                        }
                        ?>
                    </form>
                </header>
                <form class="profile-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <fieldset>
                        <legend>Dados Pessoais</legend>
                        <div class="form">
                            <input type="text" name="nome" placeholder="Nome completo" 
                            value= "<?php
                                    if($sucesso === true && !empty($perfil->getNome())) {
                                        echo htmlspecialchars($perfil->getNome());
                                    } else {
                                        echo "";
                                    }
                                    ?>">
                            <input type="date" readonly 
                            value= "<?php
                                    if($sucesso === true && !empty($perfil->getDataDeNascimento())) {
                                        echo htmlspecialchars($perfil->getDataDeNascimento());
                                    } else {
                                        echo "";
                                    }
                                   ?>">
                            <select class="gender" name="sexo" disabled>
                                <option>
                                    <?php
                                    if($sucesso === true && !empty($perfil->getSexo())) {
                                        if($perfil->getSexo() === 'M') {
                                            echo "Masculino";
                                        } else if ($perfil->getSexo() === 'F') {
                                            echo "Feminino";
                                        } else {
                                            echo "Prefiro não informar";
                                        }
                                    } else {
                                        echo "";
                                    }
                                    ?>
                                </option>
                            </select>
                            <textarea class="about" name="sobreMim" placeholder="Sobre mim..."><?php echo (!empty($perfil->getSobreMim())) ? htmlspecialchars($perfil->getSobreMim()) : ''; ?></textarea>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Contato</legend>
                        <div class="form">
                            <input type="email" name="email" placeholder="Email"
                                value="<?php echo (!empty($perfil->getEmail())) ? htmlspecialchars($perfil->getEmail()) : ''; ?>">
                            <input type="text" name="telefone" placeholder="Telefone"
                                value="<?php if(!empty($perfil->getTelefone())) { echo htmlspecialchars($perfil->getTelefone()); } ?>">
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Saúde</legend>
                        <div class="form">
                            <input type="text" name="peso" placeholder="Peso (kg)" 
                            value="<?php echo (!empty($perfil->getPeso())) ? htmlspecialchars(number_format($perfil->getPeso(), 2, '.'. '')) : number_format(00.00, 2, '.', ''); ?>">
                            <input type="text" name="altura" placeholder="Altura (m)"
                            value="<?php echo (!empty($perfil->getAltura())) ? htmlspecialchars(number_format($perfil->getAltura(), 2, '.', "")) : number_format(0.00, 2, ".", ""); ?>">
                        </div>
                    </fieldset>
                    <div class="buttons">
                        <button type="submit" class="save" name="submit">Salvar Perfil</button>
                    </div>
                </form>
            </main>
        </section>
    </div>
<script>
document.getElementById('fotoPerfil').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
        setTimeout(function() {
            document.getElementById('form-principal').submit();
        }, 100); 
    }
});
</script>
</body>
</html>