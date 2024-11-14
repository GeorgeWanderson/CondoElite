<?php
include_once('../header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $cor = $_POST['cor'];
    $entrada = $_POST['entrada'];

    if (adicionarVeiculo($placa, $modelo, $cor, $entrada)) {
        echo "<div class='alert alert-success'>Veículo adicionado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao adicionar veículo.</div>";
    }
}

?>

<h1>Adicionar Veículo</h1>

<form method="POST" action="adicionar.php">
    <div class="mb-3">
        <label for="placa" class="form-label">Placa</label>
        <input type="text" class="form-control" id="placa" name="placa" required>
    </div>
    <div class="mb-3">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo" required>
    </div>
    <div class="mb-3">
        <label for="cor" class="form-label">Cor</label>
        <input type="text" class="form-control" id="cor" name="cor" required>
    </div>
    <div class="mb-3">
        <label for="entrada" class="form-label">Entrada</label>
        <input type="datetime-local" class="form-control" id="entrada" name="entrada" required>
    </div>
    <button type="submit" class="btn btn-primary">Adicionar Veículo</button>
</form>

<?php
include_once('../footer.php');
?>
