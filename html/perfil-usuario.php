<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/perfil-usuario.css">
</head>
<body>
    <div class="container">
<<<<<<< HEAD
        <section class="left">
            <div  class="user-picture">
                <picture>
                    <img width="100" height="100" src="../assets/perfil-usuario/user-icon.jpg" alt="" >
                </picture>
            </div>
            <h1>Martin Braithwaite</h1>
            <nav>
                <ul class="menu-lateral">
                    <li><a href="#"> <img src="../assets/icons/dashboard-usuario/inicio-icon.svg" alt=""> Início</a></li>
                    <li><a href="#"> <img src="../assets/icons/dashboard-usuario/user-icon.svg" alt=""> Usuário</a></li>
                    <li><a href="#"> <img src="../assets/icons/dashboard-usuario/desempenho-icon.svg" alt=""> Desempenho</a></li>
                    <li><a href="#"> <img src="../assets/icons/dashboard-usuario/treino-icon.svg" alt=""> Treino</a></li>
                    <li><a href="#"> <img src="../assets/icons/dashboard-usuario/consulta-icon.svg" alt=""> Consultas</a></li>
                    <li><a href="#"> <img src="../assets/icons/dashboard-usuario/market-icon.svg" alt=""> Catálogo</a></li>                        <li><a href="#"> <img src="../assets/icons/dashboard-usuario/suport-icon.svg" alt=""> Suporte</a></li>
                    <li><a href="#"> <img src="../assets/icons/dashboard-usuario/config-icon.svg" alt=""> Configurações</a></li>
                </ul>
            </nav>


=======
        <section class="left"> 
            <div class="profile">
                <figure>
                    <img src="../assets/perfil-usuario/user-icon.jpg" alt="">
                </figure>
                <h2>Francisco do Nascimento</h2>
            </div>
            <aside>
                <nav>
                    <ul>
                        <li><a  href="landing-page.php"> <img src="../assets/icons/dashboard-usuario/inicio-icon.svg" alt=""> Início</a></li>
                        <li><a href="perfil-usuario.php"> <img src="../assets/icons/dashboard-usuario/user-icon.svg" alt=""> Usuário</a></li>
                        <li><a href="dashboard-usuario.php"> <img src="../assets/icons/dashboard-usuario/desempenho-icon.svg" alt=""> Desempenho</a></li>
                        <li><a href="treinos.php"> <img src="../assets/icons/dashboard-usuario/treino-icon.svg" alt=""> Treino</a></li>
                        <li><a href="consultas-agendadas.php"> <img src="../assets/icons/dashboard-usuario/consulta-icon.svg" alt=""> Consultas</a></li>
                        <li><a href="parceiros.php"> <img src="../assets/icons/dashboard-usuario/market-icon.svg" alt=""> Catálogo</a></li>
                        <li><a href="suporte.php"> <img src="../assets/icons/dashboard-usuario/suport-icon.svg" alt=""> Suporte</a></li>
                        <li><a href="#"> <img src="../assets/icons/dashboard-usuario/config-icon.svg" alt=""> Configurações</a></li>
                    </ul>
                </nav>
            </aside>
>>>>>>> 48eeef955ce1e51b4482a8910f2704639a854030
        </section>
        <section class="right">
            <div class="user-picture">
                <picture>
                    <img width="200" height="200" src="../assets/perfil-usuario/user-icon.jpg" alt="">
                </picture>
            </div>
            <h4>Atualize os seus dados pessoais</h4>
            <div class="form">
                <form action="" method="post"></form>
                        <div class="form-top">
                            <section>
                                <label for="name">Nome:</label>
                                <input type="text" name="name" id="">
                            </section>
                            <section>
                                <label for="date_of_birth">Data de nascimento:</label>
                                <input type="datetime" name="date_of_birth" id="">
                            </section>
                            <section>
                                <label for="gender">Gênero:</label>
                                <div class="gender">
                                    <select name="gender" id="">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Prefiro não informar">Prefiro não informar</option>
                                    </select>
                                </div>
                            </section>
                        </div>
                        <div class="form-bottom">
                            <section>
                                <label for="height">Altura:</label>
                                <input type="text" name="height" id="">
                            </section>
                            <section>
                                <label for="weight">Peso atual:</label>
                                <input type="text" name="weight" id="">
                            </section>
                            <section>
                                <label for="phone">Contato:</label>
                                <input type="text" name="" id="">
                            </section>
                        </div>
                        <section class="about-me">
                        <h3>Sobre mim:</h3>
                        <textarea name="sobre-mim" id=""></textarea>
                        </section>
                        <div class="submit-button">
                            <input class="button1" type="button" value="Resetar dados">
                            <input class="button2" type="button" value="Atualizar dados">
                        </div>
                </form>
            </div>
        </section>
    </div>
</body>
</html>