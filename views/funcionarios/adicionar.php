<?php

include_once('../header.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];


    if (adicionarFuncionario($nome, $cargo, $salario)) {
        echo "<div class='alert alert-success'>Funcionário adicionado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao adicionar funcionário.</div>";
    }
}

?>

<h1>Adicionar Funcionário</h1>

<form method="POST" action="adicionar.php">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="mb-3">
        <label for="cargo" class="form-label">Cargo</label>
        <input type="text" class="form-control" id="cargo" name="cargo" required>
    </div>
    <div class="mb-3">
        <label for="salario" class="form-label">Salário</label>
        <input type="number" class="form-control" id="salario" name="salario" required>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar Funcionário</button>
</form>

<?php
include_once('../footer.php');
?>
