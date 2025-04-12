<?php 
require_once __DIR__ . '/Classes/Sessao.php';

Sessao::iniciar();

$erro_nome = isset($_SESSION['erro_nome']);
$erro_email = isset($_SESSION['erro_email']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar novo usuário</title>
</head>

<body>
    <h2>Novo usuário</h2>
    <form method="post" action="processa_cadastro.php">
        <label>Nome</label><br>
        <input type="text" name="nome" value="<?php echo isset($_SESSION['old_nome']) ? Sessao::get('old_nome') : ''; ?>" required>
        <?php if ($erro_nome) :?>
            <span><?php echo Sessao::get('erro_nome'); ?></span>
        <?php endif;?>
        <br><br>

        <label>E-mail</label><br>
        <input type="email" name="email" value="<?php echo isset($_SESSION['old_email']) ? Sessao::get('old_email') : ''; ?>" required>
        <?php if ($erro_email) :?>
            <span><?php echo Sessao::get('erro_email'); ?></span>
        <?php endif;?>
        <br><br>

        <label>Senha</label><br>
        <input type="password" name="senha" value="<?php echo isset($_SESSION['old_senha']) ? Sessao::get('old_senha') : ''; ?>" required>
        <br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>

<br>
<a href="login.php">Ir para login</a>

</html>

<?php 
unset($_SESSION['erro_nome']);
unset($_SESSION['erro_email']);
unset($_SESSION['old_nome']);
unset($_SESSION['old_email']);
unset($_SESSION['old_senha']);
?>