// Função para validar e-mail
function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

// Função para validação de campos obrigatórios
function validarCampo(campo) {
    if (campo.value.trim() === "") {
        alert('Este campo é obrigatório!');
        return false;
    }
    return true;
}
