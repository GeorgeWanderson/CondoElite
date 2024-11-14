<?php
// Incluir o cabeçalho do sistema
include_once('../header.php');
?>

<h1>Lista de Funcionários</h1>

<!-- Tabela de Funcionários -->
<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Salário</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Exemplo de consulta para listar os funcionários
        // Substitua pelo seu código para buscar no banco de dados
        $funcionarios = getTodosFuncionarios(); // Função fictícia, substitua pela consulta real ao banco
        foreach ($funcionarios as $funcionario) {
            echo "<tr>";
            echo "<td>{$funcionario['id']}</td>";
            echo "<td>{$funcionario['nome']}</td>";
            echo "<td>{$funcionario['cargo']}</td>";
            echo "<td>R$ " . number_format($funcionario['salario'], 2, ',', '.') . "</td>";
            echo "<td>
                    <a href='editar.php?id={$funcionario['id']}' class='btn btn-warning btn-sm'>Editar</a>
                    <a href='excluir.php?id={$funcionario['id']}' class='btn btn-danger btn-sm'>Excluir</a>
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
