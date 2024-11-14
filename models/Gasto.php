<?php
require_once 'config/database.php';

class Gasto {
    public $id;
    public $descricao;
    public $valor;
    public $data;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->descricao = $data['descricao'];
        $this->valor = $data['valor'];
        $this->data = $data['data'];
    }

    public static function all() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM gastos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM gastos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function salvar() {
        global $pdo;
        if ($this->id) {
            $stmt = $pdo->prepare("UPDATE gastos SET descricao = ?, valor = ?, data = ? WHERE id = ?");
            $stmt->execute([$this->descricao, $this->valor, $this->data, $this->id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO gastos (descricao, valor, data) VALUES (?, ?, ?)");
            $stmt->execute([$this->descricao, $this->valor, $this->data]);
        }
    }

    public function atualizar($data) {
        $this->descricao = $data['descricao'];
        $this->valor = $data['valor'];
        $this->data = $data['data'];
        $this->salvar();
    }

    public function deletar() {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM gastos WHERE id = ?");
        $stmt->execute([$this->id]);
    }
}
