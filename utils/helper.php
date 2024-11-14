<?php


function exibirErro($mensagem) {
    echo "<div class='alert alert-danger'>$mensagem</div>";
}


function exibirSucesso($mensagem) {
    echo "<div class='alert alert-success'>$mensagem</div>";
}


function redirecionar($url) {
    header("Location: $url");
    exit();
}


function gerarTokenCSRF() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}


function validarTokenCSRF($token) {
    return isset($_SESSION['csrf_token']) && $token === $_SESSION['csrf_token'];
}


function limparEntrada($dados) {
    return htmlspecialchars(strip_tags($dados));
}
