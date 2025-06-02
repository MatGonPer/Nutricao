document.getElementById('add-refeicao').addEventListener('click', () => {
  const container = document.getElementById('refeicoes-container');
  const novaRefeicao = document.createElement('div');
  novaRefeicao.classList.add('refeicao');
  novaRefeicao.innerHTML = `
    <input type="text" name="nome-refeicao[]" placeholder="Nome da refeição" required />
    <input type="time" name="horario[]" required />
    <textarea name="descricao[]" placeholder="Descrição dos alimentos" required></textarea>
  `;

  const nutrientes = document.createElement("div");
  nutrientes.classList.add("nutrientes-edicao")
  nutrientes.innerHTML = `
    <input type="number"  name="quantidade[]"placeholder="Quantidade total (g)" />
    <input type="number"  name="proteinas[]" placeholder="Proteínas (g)" />
    <input type="number"  name="carboidratos[]" placeholder="Carboidratos (g)" />
    <input type="number"  name="gorduras[]" placeholder="Gorduras (g)" />
    <input type="number"  name="calorias[]" placeholder="Calorias (kcal)" />
  `;
  novaRefeicao.appendChild(nutrientes);
  container.appendChild(novaRefeicao);
});
