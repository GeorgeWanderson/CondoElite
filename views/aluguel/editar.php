<?php

include_once('../header.php');


$aluguel_id = $_GET['id'];


$aluguel = getAluguelById($aluguel_id); 


if (!$aluguel) {
    echo "Aluguel não encontrado!";
    exit;
}
?>

<h1>Editar Aluguel</h1>

<form action="salvar.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $aluguel['id']; ?>">

    <div class="mb-3">
        <label for="proprietario" class="form-label">Proprietário</label>
        <input type="text" class="form-control" id="proprietario" name="proprietario" value="<?php echo $aluguel['proprietario']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="inicio" class="form-label">Início</label>
        <input type="date" class="form-control" id="inicio" name="inicio" value="<?php echo $aluguel['inicio']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="fim" class="form-label">Fim</label>
        <input type="date" class="form-control" id="fim" name="fim" value="<?php echo $aluguel['fim']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="valor" class="form-label">Valor</label>
        <input type="number" class="form-control" id="valor" name="valor" value="<?php echo $aluguel['valor']; ?>" required step="0.01">
    </div>

    <button type="submit" class="btn btn-success">Salvar Alterações</button>
</form>

<?php

include_once('../footer.php');
?>
