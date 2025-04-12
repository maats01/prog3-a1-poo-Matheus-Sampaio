<?php
require_once __DIR__ . '/Classes/Sessao.php';
Sessao::iniciar();

if (!isset($_SESSION['usuario_logado']))
{
    header('Location: login.php');
    exit;
}

$nome_usuario = Sessao::get('usuario_logado');
$email = $_COOKIE['email_usuario'] ?? null;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Olá <?php echo $nome_usuario; ?></h1>

    <?php if (isset($email)) : ?>
        <p>E-mail salvo no cookie: <?php echo $email; ?></p>
    <?php endif; ?>

    <a href="logout.php">Fazer logout</a>
</body>

</html>