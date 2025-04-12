<?php 
require_once __DIR__ . '/Classes/Autenticador.php';
require_once __DIR__ . '/Classes/Sessao.php';

Sessao::iniciar();

$nome = htmlspecialchars($_POST['nome']);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); 
$senha = $_POST['senha'];

$tem_erro = false;

if (!ctype_alnum($nome))
{
    $tem_erro = true;
    Sessao::set('erro_nome', 'O nome deve ter somente caracteres alfanuméricos');
}
else if (!$email)
{
    $tem_erro = true;
    Sessao::set('erro_email', 'E-mail inválido');
}

if ($tem_erro)
{
    Sessao::set('old_nome', $nome);
    Sessao::set('old_email', $_POST['email']);
    Sessao::set('old_senha', $senha);

    header("Location: cadastro.php");
    exit;
}

$autenticador = new Autenticador();
$autenticador->registrar_usuario($nome, $email, $senha);

Sessao::set('autenticador', serialize($autenticador));

header("Location: login.php");
exit;
?>