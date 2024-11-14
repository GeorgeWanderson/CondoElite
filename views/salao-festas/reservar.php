<?php
include_once('../header.php');

$reserva_id = $_GET['id'] ?? null;
$reserva = null;

if ($reserva_id) {
    $reserva = getReservaById($reserva_id); 
    
    if (!$reserva) {
        echo "<div class='alert alert-danger'>Reserva não encontrada.</div>";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $data_reserva = $_POST['data_reserva'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_termino = $_POST['hora_termino'];

    if ($reserva_id) {
        if (editarReserva($reserva_id, $nome, $data_reserva, $hora_inicio, $hora_termino)) {
            echo "<div class='alert alert-success'>Reserva atualizada com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro ao atualizar reserva.</div>";
        }
    } else {
        if (adicionarReserva($nome, $data_reserva, $hora_inicio, $hora_termino)) {
            echo "<div class='alert alert-success'>Reserva realizada com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro ao realizar a reserva.</div>";
        }
    }
}

?>

<h1><?php echo $reserva ? 'Editar Reserva' : 'Reservar Salão de Festas'; ?></h1>

<form method="POST" action="reservar.php<?php echo $reserva_id ? '?id=' . $reserva_id : ''; ?>">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Responsável</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $reserva ? $reserva['nome'] : ''; ?>" required>
    </div>
    <div class="mb-3">
        <label for="data_reserva" class="form-label">Data da Reserva</label>
        <input type="date" class="form-control" id="data_reserva" name="data_reserva" value="<?php echo $reserva ? $reserva['data_reserva'] : ''; ?>" required>
    </div>
    <div class="mb-3">
        <label for="hora_inicio" class="form-label">Hora de Início</label>
        <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="<?php echo $reserva ? $reserva['hora_inicio'] : ''; ?>" required>
    </div>
    <div class="mb-3">
        <label for="hora_termino" class="form-label">Hora de Término</label>
        <input type="time" class="form-control" id="hora_termino" name="hora_termino" value="<?php echo $reserva ? $reserva['hora_termino'] : ''; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary"><?php echo $reserva ? 'Atualizar Reserva' : 'Realizar Reserva'; ?></button>
</form>

<?php
include_once('../footer.php');
?>
