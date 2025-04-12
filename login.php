<?php
require_once __DIR__ . '/Classes/Sessao.php';

Sessao::iniciar();

$erro_email = isset($_SESSION['erro_email']);
$erro_autenticacao = isset($_SESSION['erro_autenticacao']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar no sistema</title>
</head>

<body>
    <h2>Login</h2>
    <form method="post" action="processa_login.php">
        <label>E-mail</label><br>
        <input type="email" name="email" required>
        <?php if ($erro_email) :?>
            <span><?php echo Sessao::get('erro_email'); ?></span>
        <?php endif;?>
        <br><br>

        <label>Senha</label><br>
        <input type="password" name="senha" required>
        <br><br>

        <?php if ($erro_autenticacao) : ?>
            <span><?php echo Sessao::get('erro_autenticacao') ?></span>
            <br><br>
        <?php endif; ?>

        <label>Lembrar e-mail</label>
        <input type="checkbox" name="lembrar" value="1">
        <br><br>

        <button type="submit">Entrar</button>
    </form>

    <br>
    <a href="cadastro.php">Ir para cadastro</a>
</body>

</html>

<?php
unset($_SESSION['erro_autenticacao']);
unset($_SESSION['erro_email']);
?>