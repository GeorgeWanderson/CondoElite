<?php
require_once 'config/database.php';

class Funcionario {
    public $id;
    public $nome;
    public $cargo;
    public $salario;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->nome = $data['nome'];
        $this->cargo = $data['cargo'];
        $this->salario = $data['salario'];
    }

    public static function all() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM funcionarios");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function salvar() {
        global $pdo;
        if ($this->id) {
            $stmt = $pdo->prepare("UPDATE funcionarios SET nome = ?, cargo = ?, salario = ? WHERE id = ?");
            $stmt->execute([$this->nome, $this->cargo, $this->salario, $this->id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO funcionarios (nome, cargo, salario) VALUES (?, ?, ?)");
            $stmt->execute([$this->nome, $this->cargo, $this->salario]);
        }
    }

    public function deletar() {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM funcionarios WHERE id = ?");
        $stmt->execute([$this->id]);
    }
}
