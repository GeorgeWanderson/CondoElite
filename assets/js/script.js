// Função para alterar o tema (exemplo de interatividade)
function toggleTheme() {
    let body = document.body;
    body.classList.toggle('dark-theme');
}

// Exemplo de evento de clique para o botão
document.getElementById('toggle-theme-btn').addEventListener('click', toggleTheme);
