v<?php

// Conecta ao banco de dados MySQL
$mysql = new mysqli("localhost", "root", "", "produtos");

// Verifica se houve erro na conexão
if ($mysql->connect_error) {
    // Exibe erro e para o script
    die("Falha na conexão: " . $mysql->connect_error);
}

$id = $_GET['id'];

$stmt = $mysqli->prepare("delete from produtos where id = ?");
$stmt->bind_param("i", $id);

if($stmt->execute()){
    echo "Produto excluido com sucesso!";
} else {
    echo "Erro ", $stmt->error;
}
?>