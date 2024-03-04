<?php 
    include '../libary/conexao.php';

    require '../libary/Produto.php';
    require '../libary/Carrinho.php';

    session_start(); 
    $carrinho = new Carrinho(); 

        
   
    $sql_all = $mysqli->query("SELECT * FROM produto");

    if(isset($_GET['submit'])){
        $search = $mysqli->real_escape_string($_GET['search']);

        $search_query = $mysqli->query("SELECT * FROM produto WHERE nome LIKE '%$search%' ");
        $true = true;
    }
    if(isset($_GET['adicionar'])) {
        $id_carrinho = $_GET['adicionar'];
         $produto_sql = $mysqli->query("SELECT * FROM produto WHERE id = '$id_carrinho'")->fetch_assoc();
         
         $produto = new Produto($produto_sql['id'],$produto_sql['codigo'],$produto_sql['nome'],$produto_sql['preco']);
         $carrinho->adicionarcarrinho($produto);
     }

     if(isset($_GET['diminuir'])){
       
         $id_carrinho_diminuir = $_GET['diminuir'];
         $produto_sql_diminuir = $mysqli->query("SELECT * FROM produto WHERE id = '$id_carrinho_diminuir'")->fetch_assoc();
         
         $produto_diminuir = new Produto($produto_sql_diminuir['id'],$produto_sql_diminuir['codigo'],$produto_sql_diminuir['nome'],$produto_sql_diminuir['preco']);
         $carrinho->diminuir($produto_diminuir);
        
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control+</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
          @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            body{
                display: flex;
            }
            
            .content{
                width: 80%;
            }
            .content i{
                color:#D1024E;
            }
            #user{
                font-size: 30px;
                margin-left: 5px;
            }
            .content label{
                font-family: "Poppins", sans-serif;
                font-weight: 700;
                font-size: 30px;
                color: #D1024E;
                margin-left: 30px;
            }
            .content input[type="text"]{
                width: 400px;
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-left: 30px;
                margin-top: 30px;
            }
            .content button[type="submit"]{
                width: 50px;
                background-color: white;
                border: none;
            }

            .form i:hover{
            font-size: 18px;
            }
            .tabela{
                width: 90%;
                border-collapse: collapse;
                border-spacing: 0;
            }

            .tabela th, .tabela td{
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            .tabela th {
            background-color: #f2f2f2;
            }

            .tabela tbody tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .tabela tbody tr:hover {
                background-color: #f2f2f2;
            }
            table{
                margin-top: 20px;
                margin-left: 30px;
            }
            table i{
                margin-left: 5px;
            }
            .btn-avancar{
                background-color: #D1024E; 
                color: white; 
                padding: 10px 20px; 
                margin-top: 20px;
                margin-left: 400px;
                font-size: 14px; 
                border: none; 
                border-radius: 5px; 
                cursor: pointer; 
                transition: background-color 0.3s; 
            }
    </style>
</head>
<body>
    <?php 
        include('../template/menu.php');
    ?>
        <div class="content">
        <label for="">FRENTE DE CAIXA</label> <i class="fa fa-user-circle" aria-hidden="true" id="user"></i>

        <form action="" method="get" class="form">
            <input type="text" name="search" id="" required placeholder="Nome do produto">
            <button type="submit" name="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
        <table class="tabela">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Data</th>
                    <th>Marca</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php 
                if(!isset($_GET['submit'])){
                    while($all = $sql_all->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $all['codigo']?></td>
                <td><?php echo $all['nome']?></td>
                <td><?php echo $all['quantidade'] ?></td>
                <td><?php echo number_format($all['preco'],2,',', '. ');?></td>
                <td><?php echo date('d/m/Y',  strtotime($all['dataChegada']))?></td>
                <td><?php echo $all['marca']?></td>
                <td>
                    <a href="venda.php?adicionar=<?php echo $all['id'] ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    <a href="venda.php?diminuir=<?php echo $all['id'] ?>"> <i class="fa fa-minus" aria-hidden="true"></i></a>
                </td>
                <?php 
                     if(isset($_GET['adicionar'])){
                        if($_GET['adicionar'] == $all['id']){
                            $adicionar = true; 
                            echo '<script>alert("ITEM ADICIONADO AO CARRINHO")</script>';
                    }
                    }
                    if(isset($_GET['diminuir'])){
                        if($_GET['diminuir'] == $all['id']){
                            $diminuir = true;
                    }
                    }
                 
                 ?>   
            </tr>
            <?php 
                    }
                } elseif ($true){
                    while($data = $search_query->fetch_assoc()){
               
            ?>
                <tr>
                    <td><?php echo $data['codigo']?></td>
                    <td><?php echo $data['nome']?></td>
                    <td><?php echo $data['quantidade'] ?></td>
                    <td><?php echo number_format($data['preco'],2,',', '. ');?></td>
                    <td><?php echo date('d/m/Y',  strtotime($data['dataChegada']))?></td>
                    <td><?php echo $data['marca']?></td>
                    <td>
                        <a href="venda.php?search=<?php echo $search ?>&submit=&adicionar=<?php echo $data['id'] ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        <a href="venda.php?search=<?php echo $search ?>&submit=&diminuir=<?php echo $data['id'] ?> "> <i class="fa fa-minus" aria-hidden="true"></i></a>
                    </td>
                 <?php 
                     if(isset($_GET['adicionar'])){
                        if($_GET['adicionar'] == $data['id']){
                            $adicionar = true; 
                            echo '<script>alert("ITEM ADICIONADO AO CARRINHO")</script>';
                    }
                    }
                 
                 ?>   
               
            </tr>
            <?php 
                }
            }
            ?>
        </table>
           <a href="confirmaVenda.php">
                <button class="btn-avancar">
                        Avançar
                </button>
           </a>
        </div>
</body>
</html>
