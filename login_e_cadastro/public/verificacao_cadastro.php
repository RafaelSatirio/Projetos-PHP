<?php
defined('CONTROL') or die('Acesso negado!');

    include("conexao.php");

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $sql="INSERT INTO usuarios(username, password) 
    VALUES ('$email', '$senha')";

    if(mysqli_query($conexao, $sql)){
        echo 'Usuário cadastrado com sucesso! <br><a href="index.php?rota=login"><button type="button">Voltar</button></a>';
    } else{
        echo "ERRO!".mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);
?>