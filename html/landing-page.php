<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrifit</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/landing-page.css">
</head>
<body>
    <header>
        <h2>NUTRIFIT</h2>
        <img class="leaf-icon" src="../assets/landing-page/icons/leaf-icon.svg" alt="Ícone de folha">
    </header>
    <main>
        <h1>Selecione a sua área de acesso</h1>
            <div class="container">
                <section class="user-area">
                    <p>Área do usuário</p>
                    <img src="../assets/landing-page/images/user-background-450px-300px.jpg" alt="Homem levantando peso.">
                    <br>
                    <button class="acessar-button" id="userAcess">Acessar</button>
                </section>
                <section class="partner-area">
                    <p>Área do parceiro</p>
                    <img src="../assets/landing-page/images/partner-background-450px-300px.jpg" alt="Instrutor auxiliando aluno.">
                    <br>
                    <button class="acessar-button" id="partnerAcess">Acessar</button>
                </section>
                <section class="commercial-partner">
                    <p>Área do parceiro comercial</p>
                    <img src="../assets/landing-page/images/commercial-partner-background-450px-300px.jpg" alt="Duas pessoas apertando as mãos por terem entrado em acordo.">
                    <br>
                    <button class="acessar-button" id="comercialAcess">Acessar</button>
                </section>
            </div>
            <div class="middle-container">
                <div class="middle1">
                    <h3>Conheça a Nutrifit</h3>
                </div>
                <div class="middle2">
                    <div class="middle2-top">
                        <h4>Um jeito simples e intuitivo para você que busca uma vida saudável</h4>
                    </div>
                    <div class="middle2-bottom">
                        <h4>Quem somos</h4>
                        <p> A Nutrifit é uma plataforma completa desenvolvida com o objetivo de transformar a maneira como você cuida da sua saúde. Nosso sistema foi pensado para auxiliar pessoas que desejam alcançar uma vida mais saudável e equilibrada, unindo tecnologia, orientação especializada e ferramentas práticas em um só lugar.
                            Ao utilizar a Nutrifit, você terá acesso a um ecossistema digital totalmente voltado para o seu bem-estar, com múltiplas áreas dedicadas ao acompanhamento e melhoria da sua saúde física e nutricional.
                        </p>
                    </div>
                </div>
            </div>
            
    </main>
    <section class="subscription">
        <h2>Escolha seu plano</h2>
        <div class="sub-div">
            <p>Anual parcelado</p>
            <p id="mensal">Mensal</p>
        </div>
        <div class="sub-container">
            <section class="sub-container-card" id="card1">
                <h3>Plano Bronze</h3>
                <h2>R$00,00</h2>
            </section>
            <section class="sub-container-card" id="card2">
                <h3>Plano Prata</h3>
                <h2>R$00,00</h2>
            </section>
            <section class="sub-container-card" id="card3">
                <h3>Plano Ouro</h3>
                <h2>R$00,00</h2>
            </section>
        </div>
    </section>
    <footer>
        <section>
            <p>lorem</p>
            <p>lorem</p>
            <p>lorem</p>
        </section>
        <section>
            <p>lorem</p>
            <p>lorem</p>
            <p>lorem</p>
        </section>
        <section>
            <p>lorem</p>
            <p>lorem</p>
            <p>lorem</p>
        </section>
    </footer>
    <script>
        const userAcess = document.getElementById("userAcess");
        userAcess.addEventListener("click", function() {
            window.location.href = "login-usuario-admin.php";
        })
        
        const partnerAcess = document.getElementById("partnerAcess");
        partnerAcess.addEventListener("click", function() {
            window.location.href = "login-conta-parceira.php";
        })

        const comercialAcess = document.getElementById("comercialAcess");
        comercialAcess.addEventListener("click", function() {
            window.location.href = "login-comercial.php";
        })
    </script>
</body>
</html>