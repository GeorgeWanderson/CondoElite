<?php
require_once 'config/database.php';

class FluxoCaixa {
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
        $stmt = $pdo->prepare("SELECT * FROM fluxo_caixa");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function historico() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM fluxo_caixa ORDER BY data DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
