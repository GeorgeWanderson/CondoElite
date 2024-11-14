<?php

include_once('../header.php');


$gasto_id = $_GET['id'] ?? null;
if (!$gasto_id) {
    echo "<div class='alert alert-danger'>Gasto não encontrado.</div>";
    exit;
}


$gasto = getGastoById($gasto_id); 

if (!$gasto) {
    echo "<div class='alert alert-danger'>Gasto não encontrado.</div>";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];

    if (editarGasto($gasto_id, $descricao, $valor, $data)) {
        echo "<div class='alert alert-success'>Gasto atualizado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar gasto.</div>";
    }
}

?>

<h1>Editar Gasto</h1>

<form method="POST" action="editar.php?id=<?php echo $gasto_id; ?>">
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $gasto['descricao']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="valor" class="form-label">Valor</label>
        <input type="number" class="form-control" id="valor" name="valor" value="<?php echo $gasto['valor']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="data" class="form-label">Data</label>
        <input type="date" class="form-control" id="data" name="data" value="<?php echo $gasto['data']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar Gasto</button>
</form>

<?php
include_once('../footer.php');
?>
