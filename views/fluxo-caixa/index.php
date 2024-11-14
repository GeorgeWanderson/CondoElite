<?php
// Incluir o cabeçalho do sistema
include_once('../header.php');
?>

<h1>Gestão do Fluxo de Caixa</h1>

<!-- Botão para adicionar nova transação -->
<a href="adicionar.php" class="btn btn-primary">Adicionar Transação</a>

<!-- Tabela do fluxo de caixa -->
<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Exemplo de consulta para listar as transações de fluxo de caixa
        // Substitua pelo seu código para buscar no banco de dados
        $transacoes = getTransacoesFluxoCaixa(); // Função fictícia, substitua pela consulta real ao banco de dados
        foreach ($transacoes as $transacao) {
            echo "<tr>";
            echo "<td>{$transacao['id']}</td>";
            echo "<td>" . date('d/m/Y', strtotime($transacao['data'])) . "</td>";
            echo "<td>{$transacao['descricao']}</td>";
            echo "<td>R$ " . number_format($transacao['valor'], 2, ',', '.') . "</td>";
            echo "<td>{$transacao['tipo']}</td>";
            echo "<td>
                    <a href='detalhes.php?id={$transacao['id']}' class='btn btn-info btn-sm'>Detalhes</a>
                    <a href='editar.php?id={$transacao['id']}' class='btn btn-warning btn-sm'>Editar</a>
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
