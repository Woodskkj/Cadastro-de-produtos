<?php

// Conecta ao banco de dados MySQL
$mysql = new mysqli("localhost", "root", "", "produtos");

// Verifica se houve erro na conexão
if ($mysql->connect_error) {
    // Exibe erro e para o script
    die("Falha na conexão: " . $mysql->connect_error);
}

// Pega os dados do formulário
$name = $_POST["name"];
$price = $_POST["price"];
$description = $_POST["description"];

// Prepara a consulta para inserir um produto
$stmt = $mysql->prepare("INSERT INTO produtos (name, price, description) VALUES (?, ?, ?)");

// Liga os dados aos parâmetros da consulta
$stmt->bind_param("sds", $name, $price, $description);

// Executa a consulta
if ($stmt->execute()) {
    // Mostra mensagem de sucesso
    echo "Produto adicionado com sucesso";
} else {
    // Mostra erro se a execução falhar
    echo "Erro: " . $stmt->error;
}

// Redireciona para a página index.html
header("Location: index.html");

// Fecha a declaração e a conexão (opcional, mas bom fazer)
$stmt->close();
$mysql->close();

?>
