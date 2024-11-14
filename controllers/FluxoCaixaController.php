<?php
require_once 'models/FluxoCaixa.php';

class FluxoCaixaController {

    public function index() {
        $fluxo = FluxoCaixa::all();  // Obtém todas as transações do fluxo de caixa
        require_once 'views/fluxo-caixa/index.php';  // Exibe o histórico de transações
    }

    public function historico() {
        $fluxo = FluxoCaixa::historico();  // Obtém o histórico de transações específicas
        require_once 'views/fluxo-caixa/historico.php';  // Exibe o histórico detalhado
    }
}
