<?php 
if($_GET['editar']){
    include ('../libary/conexao.php');
    $id = $mysqli->real_escape_string($_GET['editar']);
    $select_all = $mysqli->query("SELECT * FROM produto WHERE id = '$id' ")->fetch_assoc();

    if(isset($_POST['submit'])){
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $preco = $_POST['preco'];
        $data = $_POST['data'];
        $marca = $_POST['marca'];

        $query = "UPDATE produto
        SET codigo = '$codigo', nome = '$nome', quantidade = '$quantidade', preco = '$preco' , dataChegada = '$data', marca = '$marca'
        WHERE id = '$id'";

        $editar_sql = $mysqli->query($query) or die('mysqli erro');
    }
   

   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
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
    </style>
</head>
<body>
<form action="" method="post">
    <div class="all">
        <h1>EDITAR PRODUTOS</h1>
    <div class="forms">
            <div class="three-first">
        
                    <div class="inputs">
                            <label for="">Código:</label>
                            <input type="text" name="codigo" id="" required value="<?php echo $select_all['codigo']?>">
                    </div>

                    <div class="inputs">
                            <label for="">Nome:</label>
                            <input type="text" name="nome" id="" required value="<?php echo $select_all['nome']?>">
                    </div>

                    <div class="inputs">
                            <label for="">Quantidade:</label>
                            <input type="text" name="quantidade" id="" required value="<?php echo $select_all['quantidade']?>">
                    </div>
            </div>
            <div class="three-last">
                    <div class="inputs">
                            <label for="">Preço:</label>
                            <input type="text" name="preco" id="" required value="<?php echo $select_all['preco']?>">
                    </div>

                    <div class="inputs">
                            <label for="">Data:</label>
                            <input type="date" name="data" id="" required value="<?php echo $select_all['dataChegada']?>">
                    </div>

                    <div class="inputs">
                            <label for="">Marca:</label>
                            <input type="text" name="marca" id="" required value="<?php echo $select_all['marca']?>">
                    </div>
            </div>
        </div>
            <input type="submit" value="editar" name="submit">
      </div>

      <?php 
      if(isset($editar_sql)){
         if($editar_sql){
            echo '<p>Produto Cadastrado</p>';
            header('Location: consultar.php');
         }
        }
      ?>
       
    </form>
</body>
</html>

