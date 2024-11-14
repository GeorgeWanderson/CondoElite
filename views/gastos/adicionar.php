<?php

include_once('../header.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];


    if (adicionarGasto($descricao, $valor, $data)) {
        echo "<div class='alert alert-success'>Gasto adicionado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao adicionar gasto.</div>";
    }
}

?>

<h1>Adicionar Gasto</h1>


<form method="POST" action="adicionar.php">
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" required>
    </div>
    <div class="mb-3">
        <label for="valor" class="form-label">Valor</label>
        <input type="number" class="form-control" id="valor" name="valor" required>
    </div>
    <div class="mb-3">
        <label for="data" class="form-label">Data</label>
        <input type="date" class="form-control" id="data" name="data" required>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar Gasto</button>
</form>

<?php

include_once('../footer.php');
?>
