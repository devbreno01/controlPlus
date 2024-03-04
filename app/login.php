<?php 
    include("../libary/conexao.php");

    if(isset($_POST['entrar'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $query = $mysqli->query("SELECT * FROM administrador WHERE email = '$email'");
        $verify = $query->fetch_assoc();
        if($senha == $verify['senha']){
            if(!isset($_SESSION)){
                session_start();
                $_SESSION['usuario'] = $verify['id'];
                header("Location: main.php");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <h4>FAZER LOGIN</h4>
    <form action="" method="post">
        <div class="flex">
        <h6>Email</h6>
        <input type="text" name="email" > 
        <h6>Senha</h6>
        <input type="password" name="senha" id="">
        <button name="entrar">Entrar</button>
        </div>
    </form>
</body>
</html>