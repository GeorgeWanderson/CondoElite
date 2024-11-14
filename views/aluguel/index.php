<?php
// Incluir o cabeçalho do sistema
include_once('../header.php');
?>

<h1>Gestão de Aluguéis</h1>

<a href="adicionar.php" class="btn btn-primary">Adicionar Novo Aluguel</a>

<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Proprietário</th>
            <th>Início</th>
            <th>Fim</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Exemplo de consulta para listar os aluguéis
        // Substitua pelo seu código para buscar no banco de dados
        $alugueis = getAlugueis(); // Função fictícia, substitua pela consulta real ao banco de dados
        foreach ($alugueis as $aluguel) {
            echo "<tr>";
            echo "<td>{$aluguel['id']}</td>";
            echo "<td>{$aluguel['proprietario']}</td>";
            echo "<td>" . date('d/m/Y', strtotime($aluguel['inicio'])) . "</td>";
            echo "<td>" . date('d/m/Y', strtotime($aluguel['fim'])) . "</td>";
            echo "<td>R$ " . number_format($aluguel['valor'], 2, ',', '.') . "</td>";
            echo "<td>
                    <a href='detalhes.php?id={$aluguel['id']}' class='btn btn-info btn-sm'>Detalhes</a>
                    <a href='editar.php?id={$aluguel['id']}' class='btn btn-warning btn-sm'>Editar</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Incluir o rodapé do sistema
include_once('../footer.php');
?>
