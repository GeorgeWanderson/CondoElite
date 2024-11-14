<?php
include_once('../header.php');
?>

<h1>Controle de Veículos</h1>

<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Cor</th>
            <th>Entrada</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $veiculos = getTodosVeiculos();
        foreach ($veiculos as $veiculo) {
            echo "<tr>";
            echo "<td>{$veiculo['id']}</td>";
            echo "<td>{$veiculo['placa']}</td>";
            echo "<td>{$veiculo['modelo']}</td>";
            echo "<td>{$veiculo['cor']}</td>";
            echo "<td>" . date('d/m/Y H:i', strtotime($veiculo['entrada'])) . "</td>";
            echo "<td>
                    <a href='editar.php?id={$veiculo['id']}' class='btn btn-warning btn-sm'>Editar</a>
                    <a href='excluir.php?id={$veiculo['id']}' class='btn btn-danger btn-sm'>Excluir</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
include_once('../footer.php');
?>
