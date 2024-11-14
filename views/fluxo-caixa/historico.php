<?php

include_once('../header.php');
?>

<h1>Histórico de Transações do Fluxo de Caixa</h1>


<form action="historico.php" method="GET" class="mb-4">
    <div class="row">
        <div class="col-md-3">
            <label for="data_inicio" class="form-label">Data Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="<?php echo $_GET['data_inicio'] ?? ''; ?>">
        </div>
        <div class="col-md-3">
            <label for="data_fim" class="form-label">Data Fim</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" value="<?php echo $_GET['data_fim'] ?? ''; ?>">
        </div>
        <div class="col-md-2">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-control">
                <option value="">Todos</option>
                <option value="entrada" <?php echo isset($_GET['tipo']) && $_GET['tipo'] == 'entrada' ? 'selected' : ''; ?>>Entrada</option>
                <option value="saida" <?php echo isset($_GET['tipo']) && $_GET['tipo'] == 'saida' ? 'selected' : ''; ?>>Saída</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="filtrar" class="form-label">&nbsp;</label>
            <button type="submit" class="btn btn-primary form-control">Filtrar</button>
        </div>
    </div>
</form>


<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $data_inicio = $_GET['data_inicio'] ?? null;
        $data_fim = $_GET['data_fim'] ?? null;
        $tipo = $_GET['tipo'] ?? null;


        $transacoes = getHistoricoFluxoCaixa($data_inicio, $data_fim, $tipo); 

        foreach ($transacoes as $transacao) {
            echo "<tr>";
            echo "<td>{$transacao['id']}</td>";
            echo "<td>" . date('d/m/Y', strtotime($transacao['data'])) . "</td>";
            echo "<td>{$transacao['descricao']}</td>";
            echo "<td>R$ " . number_format($transacao['valor'], 2, ',', '.') . "</td>";
            echo "<td>{$transacao['tipo']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
include_once('../footer.php');
?>
