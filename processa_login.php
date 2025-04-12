<?php 
require_once __DIR__ . '/Classes/Autenticador.php';
require_once __DIR__ . '/Classes/Sessao.php';

Sessao::iniciar();

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); 
$senha = $_POST['senha'];
$lembrar = isset($_POST['lembrar']);

$tem_erro = false;

$autenticador = unserialize(Sessao::get('autenticador'));
if (!$autenticador)
{
    $autenticador = new Autenticador();
}

$usuario_existe = $autenticador->autenticar_login($email, $senha);

if (!$email)
{
    $tem_erro = true;
    Sessao::set('erro_email', 'E-mail inválido');
}
else if (!$usuario_existe)
{
    $tem_erro = true;
    Sessao::set('erro_autenticacao', 'E-mail e/ou senha incorreto(s)');
}

if ($tem_erro)
{
    header("Location: login.php");
    exit;
}

if ($lembrar)
{
    setcookie('email_usuario', $email, time() + 3600);
}

Sessao::set('usuario_logado', $autenticador->buscar_nome_por_email($email));

header("Location: dashboard.php");
exit;
?>