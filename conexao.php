<?php
$host = "localhost";
$dbname = "sistema_de_delivery";
$username = "root";
$password = "";

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $conexao->exec("SET NAMES utf8");
    return $conexao;
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    die();
}
?>
