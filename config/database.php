<?php
// Configurações de banco de dados
$host = 'localhost';       // Endereço do servidor de banco de dados
$dbname = 'condominio';    // Nome do banco de dados
$username = 'root';        // Usuário do banco de dados
$password = '';            // Senha do banco de dados

try {
    // Cria a conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Configura o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Define o charset para UTF-8 (importante para evitar problemas com caracteres especiais)
    $pdo->exec("SET NAMES 'utf8'");

} catch (PDOException $e) {
    // Caso ocorra algum erro, exibe a mensagem de erro
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    die();  // Encerra a execução do script
}
?>
