<?php
require_once 'models/ReservaSalao.php';

class SalaoFestasController {

    public function index() {
        $reservas = ReservaSalao::all();  // Obtém todas as reservas
        require_once 'views/salao-festas/index.php';  // Exibe a lista de reservas
    }

    public function reservar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reserva = new ReservaSalao($_POST);
            $reserva->salvar();  // Registra a nova reserva
            header('Location: /salao-festas');
        }

        require_once 'views/salao-festas/reservar.php';  // Exibe o formulário para fazer a reserva
    }
}
