<?php
defined('CONTROL') or die('Acesso negado!');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    //$confirmarsenha = $_POST['confirmarsenha'] ?? '';
    //$erro = null;

    //if($senha != $confirmarsenha){
    //    $erro = "as senhas devem ser identicas";
    //}

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div>
        <a href="index.php?rota=login"><button type="button">Voltar</button></a>
    </div>
    <form action="index.php?rota=verificacao" method="post">
    <h3>Cadastro</h3>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Digite um email" required>
    </div>
    <div>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" placeholder="Digite uma senha" required>
    </div>
    <!--<div>
        <label for="senha">Repita a senha:</label>
        <input type="password" name="confirmarsenha" id="confirmarsenha" placeholder="Digite a mesma senha" required>
    </div> -->
    <div>
        <button type="submit">Cadastrar</button>
    </div>
    </form>

</body>
</html>