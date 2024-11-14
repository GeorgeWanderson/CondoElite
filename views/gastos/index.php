<?php
include_once('../header.php');
?>

<h1>Lista de Gastos</h1>

<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $gastos = getTodosGastos(); 
        foreach ($gastos as $gasto) {
            echo "<tr>";
            echo "<td>{$gasto['id']}</td>";
            echo "<td>{$gasto['descricao']}</td>";
            echo "<td>R$ " . number_format($gasto['valor'], 2, ',', '.') . "</td>";
            echo "<td>" . date('d/m/Y', strtotime($gasto['data'])) . "</td>";
            echo "<td>
                    <a href='editar.php?id={$gasto['id']}' class='btn btn-warning btn-sm'>Editar</a>
                    <a href='excluir.php?id={$gasto['id']}' class='btn btn-danger btn-sm'>Excluir</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
include_once('../footer.php');
?>
