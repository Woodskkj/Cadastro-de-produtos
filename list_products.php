<?php

// Conecta ao banco de dados MySQL
$mysql = new mysqli("localhost", "root", "", "produtos");

// Verifica se houve erro na conexão
if ($mysql->connect_error) {
    // Exibe erro e para o script
    die("Falha na conexão: " . $mysql->connect_error);
}


?>