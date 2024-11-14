<?php
include_once('../header.php');

$veiculo_id = $_GET['id'] ?? null;
if (!$veiculo_id) {
    echo "<div class='alert alert-danger'>Veículo não encontrado.</div>";
    exit;
}

$veiculo = getVeiculoById($veiculo_id); 

if (!$veiculo) {
    echo "<div class='alert alert-danger'>Veículo não encontrado.</div>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $cor = $_POST['cor'];
    $entrada = $_POST['entrada'];

    if (editarVeiculo($veiculo_id, $placa, $modelo, $cor, $entrada)) {
        echo "<div class='alert alert-success'>Veículo atualizado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar veículo.</div>";
    }
}

?>

<h1>Editar Veículo</h1>

<form method="POST" action="editar.php?id=<?php echo $veiculo_id; ?>">
    <div class="mb-3">
        <label for="placa" class="form-label">Placa</label>
        <input type="text" class="form-control" id="placa" name="placa" value="<?php echo $veiculo['placa']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="modelo" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $veiculo['modelo']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="cor" class="form-label">Cor</label>
        <input type="text" class="form-control" id="cor" name="cor" value="<?php echo $veiculo['cor']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="entrada" class="form-label">Entrada</label>
        <input type="datetime-local" class="form-control" id="entrada" name="entrada" value="<?php echo date('Y-m-d\TH:i', strtotime($veiculo['entrada'])); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar Veículo</button>
</form>

<?php
include_once('../footer.php');
?>
