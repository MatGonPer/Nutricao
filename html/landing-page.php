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
                    <br>
                    <a class="acessar-button" href="login-usuario-admin.php">Acessar</a>
                </section>
                <section class="partner-area">
                    <p>Área do parceiro</p>
                    <img src="../assets/landing-page/images/partner-background-450px-300px.jpg" alt="Instrutor auxiliando aluno.">
                    <br>
                    <br>
                    <a class="acessar-button" href="login-conta-parceira.php">Acessar</a>
                </section>
                <section class="commercial-partner">
                    <p>Área do parceiro comercial</p>
                    <img src="../assets/landing-page/images/commercial-partner-background-450px-300px.jpg" alt="Duas pessoas apertando as mãos por terem entrado em acordo.">
                    <br>
                    <br>
                    <a class="acessar-button" href="login-comercial.php">Acessar</a>
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
            
            <section class="banner2">
                <h1>Na Nutrifit você encontra:</h1>
                <div class="sub-banner2">
                    <section>
                        <h4>Acompanhamento especializado</h4>
                        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="100" height="100" fill="url(#pattern0_42_113)"/>
                        <defs>
                        <pattern id="pattern0_42_113" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_42_113" transform="scale(0.01)"/>
                        </pattern>
                        <image id="image0_42_113" width="100" height="100" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
                        </defs>
                        </svg>
                        <p>Com os melhores profissionais da área</p>
                    </section>
                    <section>
                        <h4>Suplementação</h4>
                        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="100" height="100" fill="url(#pattern0_42_114)"/>
                        <defs>
                        <pattern id="pattern0_42_114" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_42_114" transform="scale(0.015625)"/>
                        </pattern>
                        <image id="image0_42_114" width="64" height="64" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAAsTAAALEwEAmpwYAAACS0lEQVR4nO2bv24TQRCHt6IJdEABz4FoQEFUJIgG8S4gKkSEcrwNQpSJkHxQ8ucZAqYOgYYCPnTJODjWxd713syO8X5N5NOe5zffjtcpziFkAtwHvmLPF2ArlIaTIKU48CDgGA/XikChZqsAIZSGniBAC4yUr/kVYEEVIJjYnkf9GoStQhIOgHvBIww8nm7GPZYqQPAqVB3WQQBwFdgBPgE/saer+VEyXLFu/hFwhB++Aw8tm/8jhV8Bm8CGSfGzOTaAO8BryfJbXQInYz/Z+cfBCcBTyXQIXNYstDPZ+eAM4I1ke6ZZ5LMU2QzOAO5Ktg+aRX5IkYvBGcAlyXakWeSY4BT1fKwIVYAWaBvOxGwCglPcCQDe9XxE26HW5+azEJB0SOUeasUF0L+Dp+tjBcy+Tpig4gJ6Sb0/9v1S82VDTwHgAvAS+Lao4fMaihU2tWQMNF1tDwKaJRrIFTCh8SBgLJdvxDYQ+/5zBNySv+NF+SwF3DQUcNuTgGZ2LiMamEvC/bteDsFmahLW6xCcJrWhWWKFxd4/OCwO0K71P0KzLLuDsevPuz9oQXqgNnEHk9bn5ktGvUAmVYBgahh4TzlaDwLaYu1bPzmGdoFMqgDhfzgD2qHyreoZMBoq36CgXSCTKkBYhTOgtcrn9QwYWeVbrQKZVAGCumHvVAFaoG04E7MJCE6pAgSLx+SuBWcA1yXboWaRt94ek50APJFse5pFHkiRX50ED5PQZZAsXaaObe2CL/DLc9Xmwz8J3U/m9538ZqDLsLfszv8FXcP7POP6yzcAAAAASUVORK5CYII="/>
                        </defs>
                        </svg>
                        <p>produtos para suplementação</p>
                    </section>                        
                    <section>
                        <h4>Área de desempenho </h4>
                        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="100" height="100" fill="url(#pattern0_42_115)"/>
                        <defs>
                        <pattern id="pattern0_42_115" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_42_115" transform="scale(0.015625)"/>
                        </pattern>
                        <image id="image0_42_115" width="64" height="64" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAAsTAAALEwEAmpwYAAACzklEQVR4nO2bTW7UMBSAvRh1ATsKEbuuYQ0SokVdwsBRukUcgEWnwCE4AgvEHg2DBJquQIL90OGnElyASh/y9I0UZULiOI7tpP6kqpXjZ/t98eRlqkQpzwB3gGfAW+CL/Oi/j/QxNVSA28BH6vkA3FJDARgBT4EzSfCn7ID7wA3gJjAGXgC/pM+ZxIxUnwF2gFkuKZ34pYr+l6XPWpaO3fG7agHYksV8pz3fgP3C+I+AEzk2Lhzbl/a2LOXasqWawnmgC14B2yXj5xNclBzfllgXTGwELCX4bsO4XYn7CxxU9KsUkOt3IGNpdhuuZU/ilk3iVqxXphoCvJHQxzX9xiJhATyo6ftExnztKw/VQoC+ylO27W0BrsqYP/ogwG7C2NbDfwKBhyZX6MYTGq6ngo1qUpWH8YRqs920PO21yLc45z3DORc+BKyoiNP3Dl1x5Hq9yvWAcuv7HDh1mPipjDmKXkAokgDBVIwzo8B7/aWl0Md7W0gBK+piu24r61PVXguGA4ZI1nQdVe0uBbwDpoU+3tuCCYiFJEAwFePfaMckAYKpGP9GL4oAIAOO9VVaXSQBnP8Lew58li7zkjs3V8xiFHCcW6CWkJXUbVdMYxSQyQ6YF5P3QXABoUkCBFMxnRklVQG6qAKzrk5YX6rA1PV6uxCQpSoQkOA7IDTRCCBVAbr8LjCLdgfg57vANGYBWaoCAQm+A0ITjQBSFcCmCtTe63d1wmKpArX3+n0QkHVZBQyfTfptul7/Rlti+GzSyyELWFGy69bXHP37ikmc9YStBmxJcV7gGvBJmr8C103irCeMSYBp8sU46wljEtAk+Xyc9YTK1YDuBOQ/87XVZogCjM58Mc56QrXZ7uJNjjYYnfkuBYzlGX/f/NF1vqzUeRXQN5IAwZ+5AQlYun7u3ze59wxObIInDIdD2xcnJ7md0Ef0i5mHVi9OJtTF4B/xL+RdDHU16QAAAABJRU5ErkJggg=="/>
                        </defs>
                        </svg>
                        <p>Página de dashboard pessoal para acompanhar seu progresso diário</p>
                    </section>
                    <section>
                        <h4>Facilidade e praticidade</h4>
                        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect width="100" height="100" fill="url(#pattern0_42_116)"/>
                        <defs>
                        <pattern id="pattern0_42_116" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_42_116" transform="scale(0.01)"/>
                        </pattern>
                        <image id="image0_42_116" width="100" height="100" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFPklEQVR4nO2dS6xdUxiAl/ejpYSSeLXqdU1oiwkqFQMGgpQmLWYIJpQmXokgMcBEYiLxiojk9paBiEQkStIgkajHoA/FwCvxpm5RVT75nSVWl3XuPffsf++z9tr/N2zv+dfa/5e991n/WQ/nDMMwDMMwDMMwWgiwGLgPeB3YDGynfLb7a33NX/viUUvYA7gC2DLqzGSECLpcctO0jOOBt0Z99RnzJjC/KRnnAF+P+opbwHfA+XXLOA/4PdH4DmAcWAGcAsxyhQPM8tcq17ymT17k35bU+Zj6NtHoRGO3Z8b4/KxN5Ocb9fz4F3j8ztgF3KzaUAEAq3xuQt7QbmR5wrzJ6ANwayJfy5zi3RF/tZ1QCV4wwHNRzjZpBT4j8aJaoBK8YID5/stOyEKNwDIKDRlX6XEHoPeFJ+QejaBSDglZodLbDgBcGeVunUbQrVHQE1V62wHojVNCtmgEnYyCzlbpbQcAZke5m9QIuhsqPe0QaOfPhFTDhGSGCckME5IZJiQzTEhmmJDMMCGZYUKUAY6t+HkbGCrPIZAS+r0VYpgQxcLgD0E2nwL2HSKOCakKcBjwUZTLP4ELhohlQqoA7OOnh8bcMWQ8E1IF4LGEjKcrxDMhwwLclZCxHtivQkwTMgx+krS8J0I+AeZWjGtChlxOES+h+F6+aSnENiEzATgK+DzK285hvlH1iW9CZvib9/uJ98b1im2YkEEA9gReSMh40CliQgYEeDgh4yVgL+V27A6ZDuCahIx361jXYkKmAViaWFzzJXCMqwETMgXAGPBjlKRfgbNcTbRCSOOrVN0/bc71A70QGQheWnO7eQsBjgDelsWjlTs3IFI2T0waF1a7mslaCDAHeM+H+gW4qHIHB1tw9ExCxpOuAbIVIgW6xDpFebkur9zJKQDuTsh4VcrsrstCfKzbE8mRBZLXVe5oAr/TxF9Re7I871DXEFkL8fFuTFRVJWm3Ve7s7u2c6R+L8WL+kzTbab2QYGWRFPBiHlCKPw/4Koq9s/adFdoqxMe92I8BYh6VOlOFuAcBHyTi1vJYLEZIMM1mWyJ548O8dKUOBbyYiHe/Zr+LFRIsu5btJ1KFvgNmGOuR/0WB56vccVWJO5NfwP4ljc/6/J49Z8AY1yY+/w5woBshrRQSvIi3JpK6QUb303z2QuCP6HNfAEe7EdNaIb6tI4ORfDx2SM6xBU5NFAx/Bk53GdBqIQJwiOyek5DyaTzpADgc+Dj6OxnjXOIyofVCBHnuAy8npMhOdov83+zfZ5vBm1xGFCEkqNDGe4UIP8kubcCzif973GVGMUKCccUTicTHG4QJrwB7u8woSkhQPn+Iqdkk7x6XIcUJmaZSjN8HMtsNcYoVIgA3RJXi34CzXcYULUQAVvrKrZTsr3aZU7yQoFJ8p2sBnRDSJkxIZpiQzDAhmWFCMsOEZIYJyQwTkhkmpANC5OfQENtIeUCAg6PcbdMI+mEU9OTKQTsCvdk0IZs1gsYbsaxU6W0HAK6qYzP++LiKNSq97QDUdFzFosSajhNUelz+IWE7otydpvUTqpxgGbJWpdcFQ28Ka8hG7Z1yYlapNVAYwOpEvvQWl/q7RI4TjWd+3KLWSFkntO2KcrW+rkOuUrPU5TSyzh8SBixIPKb+ndw3T12Il7JkiiNGJ/zKqLEuDB7p7SQ05q95Yoojac9t4nDieLmYkZ6etLRWGdHjKzUh2vhvXctxjciIxCzzswaNHhuByxoXkRCzUEahUhrwY5b4ZLcSmfTXus5fe/VTPA3DMAzDMAzDMFzz/A2BkdQiettWtQAAAABJRU5ErkJggg=="/>
                        </defs>
                        </svg>
                        <p>Plataforma simplificada e pratica para todos os tipos de usuário</p>
                    </section>                    
                </div>
                <h1>Tudo em um só lugar!</h1>
            </section>
  <section class="planos">
  <h2 class="escolha">Escolha o seu plano</h2>

  <div class="toggle-container">
    <input type="radio" name="plan" id="mensal" checked>
    <input type="radio" name="plan" id="anual">

    <div class="toggle-labels">
      <label for="mensal">Mensal</label>
      <label for="anual">Anual</label>
      <div class="toggle-indicator"></div>
    </div>

    <div class="planos-conteudo">
      <div class="mensal-cards cards">
        <div class="card">
          <h3>Mensal Básico</h3>
          <p>R$ 79,90</p>
        </div>
        <div class="card">
          <h3>Mensal Padrão</h3>
          <p>R$ 99,90</p>
        </div>
        <div class="card">
          <h3>Mensal Premium</h3>
          <p>R$ 119,90</p>
        </div>
      </div>

      <div class="anual-cards cards">
        <div class="card">
          <h3>Anual Básico</h3>
          <p>12x de R$ 75,90</p>
        </div>
        <div class="card">
          <h3>Anual Padrão</h3>
          <p>12x de R$ 95,90</p>
        </div>
        <div class="card">
          <h3>Anual Premium</h3>
          <p>12x de R$ 115,90</p>
        </div>
      </div>
    </div>
  </div>
</section>

    </main>

    <footer class="footer">
        <div class="footer-column">
            <p>Sobre Nós</p>
            <p>Contato</p>
            <p>Política de Privacidade</p>
            <p>Blog ou Artigos</p>
        </div>
        <div class="footer-column">
            <p>Planos e Serviços</p>
            <p>FAQ (Perguntas Frequentes)</p>
            <p>Newsletter</p>
            <p>Termos de Uso</p>
        </div>
        <div class="footer-column">
            <p>Parceiros</p>
            <p>Redes Sociais</p>
            <p>Créditos e Copyright</p>
            <p>Mapa do Site</p>
        </div>
    </footer>

</body>
</html>