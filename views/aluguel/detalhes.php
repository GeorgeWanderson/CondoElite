<?php

include_once('../header.php');


$aluguel_id = $_GET['id'];


$aluguel = getAluguelById($aluguel_id); 


if (!$aluguel) {
    echo "Aluguel não encontrado!";
    exit;
}
?>

<h1>Detalhes do Aluguel</h1>

<div class="mb-3">
    <strong>Proprietário:</strong> <?php echo $aluguel['proprietario']; ?>
</div>

<div class="mb-3">
    <strong>Início:</strong> <?php echo date('d/m/Y', strtotime($aluguel['inicio'])); ?>
</div>

<div class="mb-3">
    <strong>Fim:</strong> <?php echo date('d/m/Y', strtotime($aluguel['fim'])); ?>
</div>

<div class="mb-3">
    <strong>Valor:</strong> R$ <?php echo number_format($aluguel['valor'], 2, ',', '.'); ?>
</div>

<div class="mb-3">
    <a href="index.php" class="btn btn-secondary">Voltar</a>
</div>

<?php

include_once('../footer.php');
?>
