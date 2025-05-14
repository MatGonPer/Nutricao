<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desempenho do Usuário</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href= "../css/dashboard-usuario.css">
</head>
<body>
   <div class="container">
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
        </section>
 
            <section class="right">
                <div class="background-content">
                <header>
                    <h1>Meu Desempenho</h1>
                    <form action="#" method="get">
                        <img src="../assets/icons/dashboard-usuario/search.svg" alt="Buscar">
                        <input type="search" id="search" name="search" placeholder="Buscar">
                    </form>
                </header>
                <main>   
                    <section class="desempenho">
                        <article class="treino">
                            <figure>
                                <img src="../assets/icons/dashboard-usuario/dummbell-icon.svg" width="60px" alt="consultar peso">
                            </figure>
                            <h3>Treino</h3>
                        </article>
                        <article class="calorias">
                            <figure>
                                <img src="../assets/icons/dashboard-usuario/caloria-icon.svg" width="60px" alt="">
                            </figure>
                            <h3>Calorias</h3>
                        </article>
                        <article class="peso">
                            <figure><img src="../assets/icons/dashboard-usuario/balanca-icon.svg" width="60px" alt=""></figure>
                            <h3>Peso</h3>
                        </article>
                    </section>
                    
                        <section class="treinos">
                            
                            <section class="grafico">
                                <div class="col-all">
                                    <div class="c-1 col c-b"></div>
                                    <div class="c-2 col c-g"></div>
                                    <div class="c-3 col c-o"></div>
                                    <div class="c-4 col c-b"></div>
                                    <div class="c-5 col c-g"></div>
                                    <div class="c-6 col c-o"></div>
                                    <div class="c-7 col c-b"></div>
                                    <div class="c-8 col c-g"></div>
                                    <div class="c-9 col c-o"></div>
                                    <div class="c-10 col c-b"></div>
                                    <div class="c-11 col c-g"></div>
                                    <div class="c-12 col c-o"></div>
                                    <div class="c-13 col c-b"></div>
                                    <div class="c-14 col c-g"></div>
                                    <div class="c-15 col c-o"></div>
                                    <div class="c-16 col c-b"></div>
                                </div>
                                <div class="line-col"></div>
                            </section> 

                            <section class="sec-treinos-semanais">
                                <article>
                                    <h3>Segunda-feira</h3>
                                    <div>
                                        <img src="../assets/icons/dashboard-usuario/Peso.svg" alt="peso">
                                        .
                                        <p>Treino de peito e bíceps</p>
                                    </div>
                                    visualizar
                                </article>
                                <article>
                                    <h3>Terça-feira</h3>
                                    <div>
                                        <img src="../assets/icons/dashboard-usuario/Peso.svg" alt="peso">
                                        .
                                        <p>Treino de costas</p>
                                    </div>
                                    visualizar
                                </article>
                                <article>
                                    <h3>Quarta-feira</h3>
                                    <div>
                                        <img src="../assets/icons/dashboard-usuario/correndo.svg" alt="corrida">
                                        .
                                        <p>Cardio (30 min)</p>
                                    </div>
                                    visualizar
                                </article>
                            </section>

                        </section>
                </main>
                </div>
            </section>
   </div>
</body>
</html
