<?php
require_once 'models/Veiculo.php';

class VeiculosController {

    public function index() {
        $veiculos = Veiculo::todos();  // Obtém todos os veículos
        require_once 'views/veiculos/index.php';  // Exibe a lista de veículos
    }

    public function entrada() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $veiculo = new Veiculo($_POST);
            $veiculo->entrar();  // Registra a entrada de um veículo
            header('Location: /veiculos');
        }

        require_once 'views/veiculos/entrada.php';  // Exibe o formulário para registrar a entrada
    }

    public function saida() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $veiculo = Veiculo::find($_POST['id']);
            $veiculo->sair();  // Registra a saída de um veículo
            header('Location: /veiculos');
        }

        require_once 'views/veiculos/saida.php';  // Exibe o formulário para registrar a saída
    }
}
