<?php 
    include("../libary/conexao.php");
    if(!isset($_SESSION)){
        session_start();

        if($_SESSION['usuario']){
           
            if(isset($_POST['submit'])){
                $codigo = $_POST['codigo'];
                $nome = $_POST['nome'];
                $quantidade = $_POST['quantidade'];
                $preco = $_POST['preco'];
                $data = $_POST['data'];
                $marca = $_POST['marca'];

                $code = "INSERT INTO produto(codigo,nome,quantidade,preco,dataChegada,marca) VALUES('$codigo',
                '$nome', '$quantidade', '$preco', '$data', '$marca')";

                $query = $mysqli->query($code);
               $flash = "";
               
            }
        } else{
            die('Você não está logado. <a href="login.php">Clique aqui para logar</a>');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control+</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body{
            display: flex;
        }
        form{
           width: 80%;
        }
        .forms{
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }
        .all h1{
            text-align: center;
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            font-size: 40px;
            color: #D1024E ;
            margin-top: 40px;
        }
        .all input[type="submit"]{
            background-color:#D1024E;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            cursor: pointer;
            margin-left: 46%;
        }
       
        .inputs{
            margin-bottom: 20px;
        }
        .inputs label{
            font-family: "Poppins", sans-serif;
        }
        .inputs input{
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .three-last{
            margin-left: 45px;
        }
        .massage{
            color: #D1024E; font-size: 20px; 
            text-align: center;
            font-family: "Poppins", sans-serif;
            margin-top:30px;
        }
    </style>
</head>
<body>
    <?php 
        include('../template/menu.php');
    ?>
    <form action="" method="post">
    <div class="all">
        <h1>CADASTRAR PRODUTOS</h1>
    <div class="forms">
            <div class="three-first">
        
                    <div class="inputs">
                            <label for="">Código:</label>
                            <input type="text" name="codigo" id="" required>
                    </div>

                    <div class="inputs">
                            <label for="">Nome:</label>
                            <input type="text" name="nome" id="" required>
                    </div>

                    <div class="inputs">
                            <label for="">Quantidade:</label>
                            <input type="text" name="quantidade" id="" required>
                    </div>
            </div>
            <div class="three-last">
                    <div class="inputs">
                            <label for="">Preço:</label>
                            <input type="number" name="preco" id="" required>
                    </div>

                    <div class="inputs">
                            <label for="">Data:</label>
                            <input type="date" name="data" id="" required>
                    </div>

                    <div class="inputs">
                            <label for="">Marca:</label>
                            <input type="text" name="marca" id="" required>
                    </div>
            </div>
        </div>
            <input type="submit" value="Cadastrar" name="submit">
      </div>
      <?php 
        if(isset($query)){
            if($query){
                $flash = '<script>alert("Porduto cadastrado com sucesso")</script>';
                echo $flash;
                
            } else{
                $flash = '<p class="massage">ERRO AO CADASTRAR PRODUTO</p>';
                echo $flash;
            }
            unset($flash);
     }
      ?>
    </form>
   
</body>
</html>