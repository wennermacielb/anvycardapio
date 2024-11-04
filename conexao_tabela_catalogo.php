<?php
$sqlCatalogo = "SELECT * FROM catalogo";
$stmtCatalogo = $conexao->prepare($sqlCatalogo);
$stmtCatalogo->execute();
while ($row = $stmtCatalogo->fetch(PDO::FETCH_ASSOC)) {
    $valores[$row['configuracao']] = $row['valor'];
    $imagens[$row['configuracao']] = $row['imagem'];
}
$cor_das_letras = $valores['Cor Das Letras'];
$cor_do_catalogo = $valores['Cor Do Catalogo'];
$subtitulo = $valores['Subtitulo'];
$titulo = $valores['Titulo'];
$fechar_abas= $imagens['Fechar Abas'];
?>