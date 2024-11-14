<?php
require_once 'config/database.php';

class Aluguel {
    public $id;
    public $unidade_id;
    public $inquilino;
    public $valor;
    public $data_inicio;
    public $data_fim;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->unidade_id = $data['unidade_id'];
        $this->inquilino = $data['inquilino'];
        $this->valor = $data['valor'];
        $this->data_inicio = $data['data_inicio'];
        $this->data_fim = $data['data_fim'];
    }

    public static function all() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM alugueis");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM alugueis WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function salvar() {
        global $pdo;
        if ($this->id) {
            $stmt = $pdo->prepare("UPDATE alugueis SET unidade_id = ?, inquilino = ?, valor = ?, data_inicio = ?, data_fim = ? WHERE id = ?");
            $stmt->execute([$this->unidade_id, $this->inquilino, $this->valor, $this->data_inicio, $this->data_fim, $this->id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO alugueis (unidade_id, inquilino, valor, data_inicio, data_fim) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$this->unidade_id, $this->inquilino, $this->valor, $this->data_inicio, $this->data_fim]);
        }
    }

    public function atualizar($data) {
        $this->unidade_id = $data['unidade_id'];
        $this->inquilino = $data['inquilino'];
        $this->valor = $data['valor'];
        $this->data_inicio = $data['data_inicio'];
        $this->data_fim = $data['data_fim'];
        $this->salvar();
    }

    public function deletar() {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM alugueis WHERE id = ?");
        $stmt->execute([$this->id]);
    }
}
