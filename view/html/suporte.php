<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

require_once __DIR__ . "/../../model/PerfilUsuario.php";
require_once __DIR__ . "/../../model/Usuario.php";
require_once __DIR__ . "/../../model/Suporte.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href= "../css/suporte.css">
    <link rel="shortcut icon" href="../assets/icons/favicon/favicon_io/favicon.ico" type="image/x-icon">
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
                        <li><a href="dashboard-usuario.php"> <img src="../assets/perfil-usuario/desempenho-icon.svg" width="25px">Desempenho</a></li>
                        <li><a href="treinos.php"> <img src="../assets/perfil-usuario/treinos-icon.svg" width="25px">Treino</a></li>
                        <li><a href="consultas-agendadas.php"> <img src="../assets/perfil-usuario/consultas-icon.svg" width="25px">Consultas</a></li>
                        <li><a href="parceiros.php"> <img src="../assets/perfil-usuario/catalogo-icon.svg" width="25px">Catálogo</a></li>
                        <li class="active"><a href="suporte.php"> <img src="../assets/perfil-usuario/suporte-icon.svg" width="25px">Suporte</a></li>
                        <li><a href="configuracoes.php"> <img src="../assets/perfil-usuario/configuracao-icon.svg" width="25px">Configurações</a></li>
                    </ul>
                </nav>
            </aside>
        </section>
        <section class="right">
            <div class="contato">
                <h1>SUPORTE</h1>
                <div class="email">
                    <a href="">
                        <h2>Fale conosco:</h2>
                        <p>nutrifit@gmail.com</p>
                    </a>
                </div>
            </div>
            <div class="principais-perguntas">
                <h3>Principais Dúvidas</h3>
                <div class="duvidas">
                    <a href="">
                        <div class="pergunta">
                            <p>É normal o sistema demorar para carregar?</p>
                            <p>></p>
                        </div>
                    </a>
                    <a href="">
                        <div class="pergunta">
                            <p>Como posso redefinir minha senha?</p>
                            <p>></p>
                        </div>
                    </a>
                    <a href="">
                        <div class="pergunta">
                            <p>Existe um manual ou guia de uso disponível?</p>
                            <p>></p>
                        </div>
                    </a>
                    <a href="">
                        <div class="pergunta">
                            <p>O sistema possui integração com outras ferramentas?</p>
                            <p>></p>
                        </div>
                    </a>
                    <a href="">
                        <div class="pergunta">
                            <p>Como o sistema protege os meus dados pessoais?</p>
                            <p>></p>
                        </div>
                    </a>
                </div>
            </div>
        </section>