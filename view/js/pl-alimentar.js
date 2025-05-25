document.getElementById('add-refeicao').addEventListener('click', () => {
  const container = document.getElementById('refeicoes-container');
  const novaRefeicao = document.createElement('div');
  novaRefeicao.classList.add('refeicao');
  novaRefeicao.innerHTML = `
    <input type="text" name="nome-refeicao[]" placeholder="Nome da refeição" required />
    <input type="time" name="horario[]" required />
    <textarea name="descricao[]" placeholder="Descrição dos alimentos" required></textarea>
  `;
  container.appendChild(novaRefeicao);
});
