<?php
require_once __DIR__ . '/Classes/Sessao.php';

Sessao::iniciar();
Sessao::destruir();
header("Location: login.php");
exit;
?>