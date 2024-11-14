<?php
require_once 'config/database.php';

class Veiculo {
    public $id;
    public $placa;
    public $modelo;
    public $entrada;
    public $saida;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->placa = $data['placa'];
        $this->modelo = $data['modelo'];
        $this->entrada = $data['entrada'];
        $this->saida = $data['saida'] ?? null;
    }

    public static function todos() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM veiculos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM veiculos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function entrar() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO veiculos (placa, modelo, entrada) VALUES (?, ?, ?)");
        $stmt->execute([$this->placa, $this->modelo, $this->entrada]);
    }

    public function sair() {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE veiculos SET saida = ? WHERE id = ?");
        $stmt->execute([$this->saida, $this->id]);
    }
}
