<?php
require_once 'models/Aluguel.php';

class AluguelController {

    public function index() {
        $alugueis = Aluguel::all();  // Obtém todos os aluguéis
        require_once 'views/aluguel/index.php';  // Exibe a lista de aluguéis
    }

    public function detalhes($id) {
        $aluguel = Aluguel::find($id);  // Encontra um aluguel pelo ID
        require_once 'views/aluguel/detalhes.php';  // Exibe os detalhes do aluguel
    }

    public function editar($id) {
        $aluguel = Aluguel::find($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $aluguel->atualizar($_POST);  // Atualiza os dados do aluguel
            header('Location: /aluguel');
        }
        
        require_once 'views/aluguel/editar.php';  // Exibe o formulário para editar
    }

    public function excluir($id) {
        $aluguel = Aluguel::find($id);
        $aluguel->deletar();  // Exclui o aluguel
        header('Location: /aluguel');
    }
}
