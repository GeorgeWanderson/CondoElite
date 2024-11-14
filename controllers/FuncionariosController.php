<?php
require_once 'models/Funcionario.php';

class FuncionariosController {

    public function index() {
        $funcionarios = Funcionario::all();  // Obtém todos os funcionários
        require_once 'views/funcionarios/index.php';  // Exibe a lista de funcionários
    }

    public function adicionar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $funcionario = new Funcionario($_POST);
            $funcionario->salvar();  // Adiciona um novo funcionário
            header('Location: /funcionarios');
        }

        require_once 'views/funcionarios/adicionar.php';  // Exibe o formulário para adicionar funcionário
    }

    public function editar($id) {
        $funcionario = Funcionario::find($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $funcionario->atualizar($_POST);  // Atualiza o funcionário
            header('Location: /funcionarios');
        }

        require_once 'views/funcionarios/editar.php';  // Exibe o formulário para editar
    }

    public function excluir($id) {
        $funcionario = Funcionario::find($id);
        $funcionario->deletar();  // Exclui o funcionário
        header('Location: /funcionarios');
    }
}
