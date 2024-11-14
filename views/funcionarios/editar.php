<?php
/
include_once('../header.php');


$funcionario_id = $_GET['id'] ?? null;
if (!$funcionario_id) {
    echo "<div class='alert alert-danger'>Funcionário não encontrado.</div>";
    exit;
}


$funcionario = getFuncionarioById($funcionario_id); 

if (!$funcionario) {
    echo "<div class='alert alert-danger'>Funcionário não encontrado.</div>";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];


    if (editarFuncionario($funcionario_id, $nome, $cargo, $salario)) {
        echo "<div class='alert alert-success'>Funcionário atualizado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar funcionário.</div>";
    }
}

?>

<h1>Editar Funcionário</h1>


<form method="POST" action="editar.php?id=<?php echo $funcionario_id; ?>">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $funcionario['nome']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="cargo" class="form-label">Cargo</label>
        <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $funcionario['cargo']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="salario" class="form-label">Salário</label>
        <input type="number" class="form-control" id="salario" name="salario" value="<?php echo $funcionario['salario']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar Funcionário</button>
</form>

<?php

include_once('../footer.php');
?>
