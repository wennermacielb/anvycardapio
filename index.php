<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['nome_completo']) || !isset($_SESSION['empresa_id']) || !isset($_SESSION['usuario_id']))  {
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-42000, '/');
    }
    session_destroy();
    header("Location: catalogo/inicio.php");
    exit;
} else {
    $nome_completo = $_SESSION['nome_completo'];
    $empresa_id = $_SESSION['empresa_id'];
    $usuario_id = $_SESSION['usuario_id'];
}

require_once 'permissoes.php';

// Supondo que você já tenha a conexão com o banco de dados em $conexao
 // Substitua com o ID real da empresa ou o método que você usa para identificar a empresa

$stmt = $conexao->prepare("SELECT * FROM empresa");
$stmt->execute();
$empresa = $stmt->fetch(PDO::FETCH_ASSOC);

// Carrega a logomarca e o nome fantasia em variáveis
$logomarca = $empresa['logomarca'];
$nome_fantasia = $empresa['nome_fantasia'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Delivery</title>
    <link rel="stylesheet" href="estilo_index.css">
    <link rel="shortcut icon" href="../imagens/favicon.png" type="image/x-icon">
</head>
<body>
<header class="cabecalho">
    <div class="img-perfil">
        <?php if ($logomarca): ?>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($logomarca); ?>" alt="Logo da Empresa">
        <?php else: ?>
            <img src="imagens/logo.png" alt="Logo Padrão">
        <?php endif; ?>
    </div>
    <div class="usuario-logado">
        <h1><?php echo htmlspecialchars($nome_fantasia); ?></h1>
        <h3><?php echo htmlspecialchars($nome_completo); ?></h3>
    </div>
    <div class="sair">
        <a href="sair.php"><img src="imagens/sair.png" alt="Sair"></a>
    </div>
</header>

    <div class="menu">
        <?php if ($permissao_cadastros): ?>
            <a href="cadastros/index.php" target="conteudo"><img src="imagens/cadastros.png" alt="Cadastros"><span>Cadastros</span></a>
        <?php endif; ?>
        <?php if ($permissao_pedidos): ?>
            <a href="pedidos/index.php" target="conteudo"><img src="imagens/pedidos.png" alt="Pedidos"><span>Pedidos</span></a>
        <?php endif; ?>
    </div>
    <iframe name="conteudo"></iframe>
</body>
</html>