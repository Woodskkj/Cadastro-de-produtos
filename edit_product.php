<?php

// Conecta ao banco de dados MySQL
$mysql = new mysqli("localhost", "root", "", "produtos");

// Verifica se houve erro na conexão
if ($mysql->connect_error) {
    // Exibe erro e para o script
    die("Falha na conexão: " . $mysql->connect_error);
}

$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$description = $_POST["description"];

$stmt = $mysqli->prepare("UPDATE produtos SET name = ?, price = ?, description = ? WHERE id = ?");
$stmt->bind_param("sdsi", $name, $price, $description, $id);

if($stmt->execute()){

}

?>