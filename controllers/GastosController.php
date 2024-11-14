<?php
require_once 'models/Gasto.php';

class GastosController {

    public function index() {
        $gastos = Gasto::all();  // Obtém todos os gastos
        require_once 'views/gastos/index.php';  // Exibe a lista de gastos
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $gasto = new Gasto($_POST);
            $gasto->salvar();  // Salva o novo gasto
            header('Location: /gastos');
        }

        require_once 'views/gastos/adicionar.php';  // Exibe o formulário para adicionar gasto
    }

    public function editar($id) {
        $gasto = Gasto::find($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $gasto->atualizar($_POST);  // Atualiza o gasto
            header('Location: /gastos');
        }

        require_once 'views/gastos/editar.php';  // Exibe o formulário para editar
    }

    public function excluir($id) {
        $gasto = Gasto::find($id);
        $gasto->deletar();  // Exclui o gasto
        header('Location: /gastos');
    }
}
