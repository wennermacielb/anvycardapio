<?php
$sqlEmpresa= "SELECT * FROM empresa";
$stmtEmpresa = $conexao->prepare($sqlEmpresa);
$stmtEmpresa->execute();
$row = $stmtEmpresa->fetch(PDO::FETCH_ASSOC);
$logomarca = $row['logomarca'];
$nome_fantasia = $row['nome_fantasia'];
?>