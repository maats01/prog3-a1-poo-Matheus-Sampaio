<?php 
require_once __DIR__ . '/Classes/Sessao.php';

Sessao::iniciar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
</head>
<body>
    <h1>Sistema de cadastro e autenticação de usuários</h1>
    <a href="cadastro.php">Cadastrar novo usuário</a>
    <br><br>
    <a href="login.php">Fazer login</a>
</body>
</html>