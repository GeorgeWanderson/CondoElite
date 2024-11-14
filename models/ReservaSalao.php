<?php
require_once 'config/database.php';

class ReservaSalao {
    public $id;
    public $usuario;
    public $data_reserva;
    public $hora_inicio;
    public $hora_fim;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->usuario = $data['usuario'];
        $this->data_reserva = $data['data_reserva'];
        $this->hora_inicio = $data['hora_inicio'];
        $this->hora_fim = $data['hora_fim'];
    }

    public static function all() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM reservas_salao");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar() {
        global $pdo;
        if ($this->id) {
            $stmt = $pdo->prepare("UPDATE reservas_salao SET usuario = ?, data_reserva = ?, hora_inicio = ?, hora_fim = ? WHERE id = ?");
            $stmt->execute([$this->usuario, $this->data_reserva, $this->hora_inicio, $this->hora_fim, $this->id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO reservas_salao (usuario, data_reserva, hora_inicio, hora_fim) VALUES (?, ?, ?, ?)");
            $stmt->execute([$this->usuario, $this->data_reserva, $this->hora_inicio, $this->hora_fim]);
        }
    }
}
