<?php
defined('CONTROL') or die('Acesso negado!');

include("conexao.php");

// verifica se o formulário foi submetido
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // verifica se o usuario e a senha foram submetidas
    $email = mysqli_real_escape_string($conexao, $_POST['email'] ?? '');
    $senha = mysqli_real_escape_string($conexao, $_POST['senha'] ?? '');
    $erro = null;

    if(empty($email) || empty($senha)){
        $erro = "Usuario e senha são obrigatórios!";
    } else {
        
        $sql = "SELECT * FROM usuarios WHERE username = '$email'";
        $resultado = mysqli_query($conexao, $sql);

        if($resultado === false){
            die("Erro na consulta SQL: " . mysqli_error($conexao));
        }

        if(mysqli_num_rows($resultado) > 0){
            $user = mysqli_fetch_assoc($resultado);

            // Verifica se a senha informada corresponde ao hash da senha no banco
            if(password_verify($senha, $user['password'])) {
                //efetua o login
                $_SESSION['usuario'] = $email;

                //redireciona para a página inicial
                header('location: index.php?rota=home');
                exit();
            } else {
                $erro = "Usuário e/ou senha inválidos";
            }       
        } else {
            $erro = "Usuário não encontrado";
        }

        // login inválido
        $erro = "Usuário e/ou senha inválidos";

        mysqli_close($conexao);
    }

    // verifica se o usuario e senha são válidos
    //if(empty($erro)){

    //}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <form action="index.php?rota=login" method="POST">
        <h3>Login</h3>
        <div>
            <label for="usuario">Usuário</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
        </div>
        <div class="div-buttons">
            <button type="submit">Entrar</button>
            <p>Ou não tem um cadastro?</p>
            <button type="button" onclick="window.location.href='index.php?rota=cadastro'">Cadastre-se</button>
        </div>
    </form>

    <?php if(!empty($erro)) : ?>
        <p style="color : red"><?= $erro ?></p>
        <?php endif; ?>

</body>
</html>

