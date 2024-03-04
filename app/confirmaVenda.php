

<?php 
    include '../libary/conexao.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    *{
        padding: 0;
        margin: 0;
    }
    body{
        display: flex;
    }
    .lista{
       border: black 2px solid;
       width: 500px;
       height: 460px ;
       margin-left: 250px;
       margin-top: 5%;
        background-color: #D1024E;
    }
    .lista h3{
        font-family: "Poppins", sans-serif;
        color: aliceblue;
    }
    
    .lista li{
        font-family: "Poppins", sans-serif;
        color: white;
        font-size: 15px;
        text-align: center;
        margin-top: 10px;
    }

    #btn{
        background-color: #D1024E; 
        color: white; 
        padding: 10px 20px;
        margin-left: 58%;
        margin-top: 20px;
        font-size: 14px; 
        border: none; 
        border-radius: 5px; 
        cursor: pointer; 
        transition: background-color 0.3s; 
    }
</style>
<body>
    <?php include '../template/menu.php'?>
    <div class="content">
        <div class="lista">
            <h3 style="text-align: center;">LISTA DE COMPRAS</h3>
            <ol>
            <?php 
               if(isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
                $true = true;
                echo '<ol>';
                foreach($_SESSION['carrinho'] as $produto) {
                    echo '<li>';
                    echo "Nome: " . $produto['Nome'] . ", Quantidade: " . $produto['Quantidade'] . ", Preço: " . $produto['Preço'] * $produto['Quantidade'];
                    echo '</li>';
                }
                echo "</ol>";
               }
            ?>
            </ol>
                
        </div>
        <form action="" method="post">
            <input type="submit" value="Confirmar Venda" id="btn" name="btn">
            
        </form>
    </div>
    <?php 
        if(isset($_POST['btn'])){
            
             if(isset($true)){
                if($true){
                    foreach($_SESSION['carrinho'] as $produto){
                            $id = $produto['Id'];
                            $quantidade = $produto['Quantidade'];
                            $query = $mysqli->query("SELECT * FROM produto WHERE id = '$id'");
                            $data = $query->fetch_assoc();
                            $qtd_atual =  $data['quantidade'] - $quantidade;
                            
                            
                            $update = $mysqli->query("UPDATE produto
                            SET quantidade = '$qtd_atual'
                            WHERE id = '$id'");
                            
                    }
                    
                    unset($_SESSION['carrinho']);
                    if($update){
                        header('Location: main.php');
                    }
               }
               
             }
        }
    ?>
</body>
</html>