<?php
include_once('../header.php');
?>

<h1>Reservas do Salão de Festas</h1>

<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Data da Reserva</th>
            <th>Hora de Início</th>
            <th>Hora de Término</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $reservas = getTodasReservas(); 
        foreach ($reservas as $reserva) {
            echo "<tr>";
            echo "<td>{$reserva['id']}</td>";
            echo "<td>{$reserva['nome']}</td>";
            echo "<td>" . date('d/m/Y', strtotime($reserva['data_reserva'])) . "</td>";
            echo "<td>" . date('H:i', strtotime($reserva['hora_inicio'])) . "</td>";
            echo "<td>" . date('H:i', strtotime($reserva['hora_termino'])) . "</td>";
            echo "<td>
                    <a href='reservar.php?id={$reserva['id']}' class='btn btn-warning btn-sm'>Editar</a>
                    <a href='excluir.php?id={$reserva['id']}' class='btn btn-danger btn-sm'>Excluir</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
include_once('../footer.php');
?>
