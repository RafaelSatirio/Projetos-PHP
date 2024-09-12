<?php

// iniciar a sessão
session_start();

// definir uma constante de controle
define('CONTROL', true);

// verifica se existe um usuario logado 
$usuario_logado = $_SESSION['usuario'] ?? null;

// verifica qual é a rota na URL
if (empty($usuario_logado) && !in_array($_GET['rota'], ['cadastro', 'verificacao'])) {
    $rota = 'login'; 
} else {
    $rota = $_GET['rota'] ?? 'home';
}

// se o usuário está logado, mas a rota é login, vai redirecionar para o home
if(!empty($usuario_logado) && $rota == 'login'){
    $rota = 'home';
}

// analisa a rota
$rotas = [
    'login' => 'login.php',
    'home' => 'home.php',
    'page1' => 'page1.php',
    'page2' => 'page2.php',
    'page3' => 'page3.php',
    'logout' => 'logout.php',
    'cadastro' => 'cadastro.php',
    'verificacao' => 'verificacao_cadastro.php'
];

if(!key_exists($rota, $rotas)){
    die('Acesso negado!');
} else {
    require_once $rotas[$rota];
}
?>