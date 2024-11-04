<?php
if (!isset($_SESSION['nome_completo']) || !isset($_SESSION['empresa_id']) || !isset($_SESSION['usuario_id']))  {
    $_SESSION = array();

    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-42000, '/');
    }

    session_destroy();

    header("Location: login/index.php");
    exit;
} else {
    $nome_completo = $_SESSION['nome_completo'];
    $empresa_id = $_SESSION['empresa_id'];
    $usuario_id = $_SESSION['usuario_id'];
}
?>