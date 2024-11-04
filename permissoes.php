<?php
$sql_usuario = "SELECT * FROM usuarios WHERE id= :usuario_id";
$stmt_usuario = $conexao->prepare($sql_usuario);
$stmt_usuario->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
$stmt_usuario->execute();
$usuario = $stmt_usuario->fetch(PDO::FETCH_ASSOC);
if ($usuario) {
    $permissao_cadastros = $usuario['cadastros'] == 1;
    $permissao_cadastros_minha_equipe = $usuario['cadastros_minha_equipe'] == 1;
    $permissao_pedidos = $usuario['pedidos'] == 1;
} else {
    $permissao_cadastros = $usuario['cadastros'] = false;
    $permissao_cadastros_minha_equipe = $usuario['cadastros_minha_equipe'] = false;
    $permissao_pedidos = $usuario['pedidos'] = false;
}
?>