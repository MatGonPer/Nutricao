<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrifit</title>
    <!-- Links para os seus arquivos CSS originais. -->
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/landing-page.css"> 
    <!-- Favicon (caminho original) -->
    <link rel="shortcut icon" href="../assets/icons/favicon/favicon_io/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <h2>NUTRIFIT</h2>
        <img class="leaf-icon" src="../assets/landing-page/icons/leaf-icon.svg" alt="Ícone de folha">
    </header>

    <main>
        <h1>Selecione a sua área de acesso</h1>
        <div class="container">
            <section class="user-area animate-on-scroll">
                <p>Área do usuário</p>
                <img src="../assets/landing-page/images/user-background-450px-300px.jpg" alt="Homem levantando peso.">
                <a class="acessar-button" href="login-usuario-admin.php">Acessar</a>
            </section>
            <section class="partner-area animate-on-scroll">
                <p>Área do parceiro</p>
                <img src="../assets/landing-page/images/partner-background-450px-300px.jpg" alt="Instrutor auxiliando aluno.">
                <a class="acessar-button" href="login-conta-parceira.php">Acessar</a>
            </section>
        </div>

        <div class="middle-container">
            <div class="middle1 animate-on-scroll">
                <h3>Conheça a Nutrifit</h3>
            </div>
            <div class="middle2">
                <div class="middle2-top animate-on-scroll">
                    <h4>Um jeito simples e intuitivo para você que busca uma vida saudável</h4>
                </div>
                <div class="middle2-bottom animate-on-scroll">
                    <h4>Quem somos</h4>
                    <p> A Nutrifit é uma plataforma completa desenvolvida com o objetivo de transformar a maneira como você cuida da sua saúde. Nosso sistema foi pensado para auxiliar pessoas que desejam alcançar uma vida mais saudável e equilibrada, unindo tecnologia, orientação especializada e ferramentas práticas em um só lugar.
                        Ao utilizar a Nutrifit, você terá acesso a um ecossistema digital totalmente voltado para o seu bem-estar, com múltiplas áreas dedicadas ao acompanhamento e melhoria da sua saúde física e nutricional.
                    </p>
                </div>
            </div>
        </div>
        
        <section class="banner2">
            <h1 class="animate-on-scroll">Na Nutrifit você encontra:</h1>
            <div class="sub-banner2">
                <section class="animate-on-scroll">
                    <h4>Acompanhamento especializado</h4>
                    <svg class="feature-icon" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                    <p>Com os melhores profissionais da área</p>
                </section>
                <section class="animate-on-scroll">
                    <h4>Suplementação</h4>
                    <svg class="feature-icon" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><path d="M21 8v13H3V8M1 3h22v5H1zM10 12h4"></path></svg>
                    <p>Produtos para suplementação</p>
                </section>
                <section class="animate-on-scroll">
                    <h4>Área de desempenho </h4>
                    <svg class="feature-icon" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    <p>Página de dashboard pessoal para acompanhar seu progresso diário</p>
                </section>
                <section class="animate-on-scroll">
                    <h4>Facilidade e praticidade</h4>
                    <svg class="feature-icon" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    <p>Plataforma simplificada e pratica para todos os tipos de usuário</p>
                </section>
            </div>
            <h1 class="animate-on-scroll">Tudo em um só lugar!</h1>
        </section>

        <section class="planos" id="planos">
            <h2 class="animate-on-scroll">Escolha o seu plano</h2>
            <div class="toggle-container animate-on-scroll">
                <input type="radio" name="plan" id="mensal" checked>
                <input type="radio" name="plan" id="anual">
                <div class="toggle-labels">
                    <label for="mensal">Mensal</label>
                    <label for="anual">Anual</label>
                    <div class="toggle-indicator"></div>
                </div>
            </div>

            <div class="planos-conteudo">
                <div class="cards">
                    <!-- Card 1: Básico -->
                    <div class="card" data-plan="basico">
                        <div class="card-content">
                            <h3 class="plan-name">Mensal Básico</h3>
                            <ul>
                                <li>✓ Acesso aos treinos</li>
                                <li>✓ Dieta padrão</li>
                                <li>✓ Suporte por e-mail</li>
                            </ul>
                        </div>
                        <p class="price">R$ 79,90</p>
                    </div>
                    <!-- Card 2: Padrão -->
                    <div class="card" data-plan="padrao">
                        <div class="card-content">
                            <h3 class="plan-name">Mensal Padrão</h3>
                            <ul>
                                <li>✓ Tudo do plano Básico</li>
                                <li>✓ Acompanhamento nutricional</li>
                                <li>✓ Suporte via chat</li>
                            </ul>
                        </div>
                        <p class="price">R$ 99,90</p>
                    </div>
                    <!-- Card 3: Premium -->
                    <div class="card" data-plan="premium">
                        <div class="card-content">
                            <h3 class="plan-name">Mensal Premium</h3>
                            <ul>
                                <li>✓ Tudo do plano Padrão</li>
                                <li>✓ Personal trainer online</li>
                                <li>✓ Acesso a receitas exclusivas</li>
                            </ul>
                        </div>
                        <p class="price">R$ 119,90</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-column">
            <p><strong>Nutrifit</strong></p>
            <p>Sobre Nós</p>
            <p>Contato</p>
            <p>Blog ou Artigos</p>
        </div>
        <div class="footer-column">
             <p><strong>Suporte</strong></p>
            <p>FAQ (Perguntas Frequentes)</p>
            <p>Termos de Uso</p>
            <p>Política de Privacidade</p>
        </div>
        <div class="footer-column">
             <p><strong>Conecte-se</strong></p>
            <p>Parceiros</p>
            <p>Redes Sociais</p>
            <p>Newsletter</p>
        </div>
    </footer>

    <script>
        // Script para animação de scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, {
            threshold: 0.1
        });

        const elementsToAnimate = document.querySelectorAll('.animate-on-scroll');
        elementsToAnimate.forEach(el => observer.observe(el));

        // Script para atualizar os planos
        document.addEventListener('DOMContentLoaded', () => {
            const planData = {
                basico: { mensal: { name: 'Mensal Básico', price: 'R$ 79,90' }, anual: { name: 'Anual Básico', price: '12x de R$ 75,90' } },
                padrao: { mensal: { name: 'Mensal Padrão', price: 'R$ 99,90' }, anual: { name: 'Anual Padrão', price: '12x de R$ 95,90' } },
                premium: { mensal: { name: 'Mensal Premium', price: 'R$ 119,90' }, anual: { name: 'Anual Premium', price: '12x de R$ 115,90' } }
            };

            const toggleInputs = document.querySelectorAll('input[name="plan"]');
            
            function updateCards() {
                const selectedPlanType = document.querySelector('input[name="plan"]:checked').id; // 'mensal' ou 'anual'
                
                document.querySelectorAll('.card').forEach(card => {
                    const planName = card.getAttribute('data-plan');
                    const nameElement = card.querySelector('.plan-name');
                    const priceElement = card.querySelector('.price');

                    nameElement.textContent = planData[planName][selectedPlanType].name;
                    priceElement.textContent = planData[planName][selectedPlanType].price;
                });
            }

            toggleInputs.forEach(input => input.addEventListener('change', updateCards));
            
            // Initial call to set the correct values on page load
            updateCards();
        });
    </script>
</body>
</html>
