<?php
include("../libary/conexao.php");
 if(!isset($_SESSION)){
    session_start();

    if(isset($_SESSION['usuario'])){

        $sqlAll_code = $mysqli->query("SELECT * FROM produto");
       
        if(isset($_GET['submit'])){
            $search = $_GET['search'];

          $sql_search = $mysqli->query("SELECT * FROM produto WHERE nome LIKE '%$search%'");

          $true = true;

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

    <!--BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
        .content h1{
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            color: #D1024E;
            margin-left: 30px;
            margin-top: 50px;
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
      
    </style>
</head>
<body>
    <?php 
        include('../template/menu.php');
    ?>
    <div class="content">
        <h1>CONSULTAR PRODUTO</h1>
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
      

              
        <tbody>
        <?php  
            if(isset($true)){
               
                if($true){ 
                   $sql_num = $sql_search->num_rows;
                   if($sql_num == 0){
                     echo '
                     <tr>
                        <td>Produto não encontrado</td>
                        <td>Produto não encontrado</td>
                        <td>Produto não encontrado</td>
                        <td>Produto não encontrado</td>
                        <td>Produto não encontrado</td>
                        <td>Produto não encontrado</td>
                        <td>
                            Produto não encontrado
                        </td>
                   </tr> ';
                       
                   }

                   
                    while($data = $sql_search->fetch_assoc()){
         ?>           
                       
                        <tr>
                             <td><?php echo $data['codigo']?></td>
                             <td><?php echo $data['nome']?></td>
                             <td><?php echo $data['quantidade']?></td>
                             <td><?php echo number_format( $data['preco'],2, ',', '. ');?></td>
                             <td><?php echo date('d/m/Y',  strtotime($data['dataChegada']));;?></td>
                             <td><?php echo $data['marca']?></td>
                            <td>
                            <a href="excluir.php?delete=<?php echo $data['id']?>"><i class="fa fa-trash" aria-hidden="true" style="font: size 10px;"></i></a>
                                <a href="editar.php?editar=<?php echo $data['id']?>"><i class="fa fa-edit" style="font-size:1opx;"></i></a>
                            </td>
                        </tr>

        <?php 
                       
                }
              } 
        ?> 
                    

        <?php 
                 }else {
                    $i =0;
                    while($all = $sqlAll_code->fetch_assoc()){
          ?> 
                        <tr>
                            <td><?php echo $all['codigo']?></td>
                            <td><?php echo $all['nome']?></td>
                            <td><?php echo $all['quantidade']?></td>
                            <td><?php echo number_format($all['preco'],2,',', '. ');?></td>
                            <td><?php echo date('d/m/Y',  strtotime($all['dataChegada']));;?></td>
                            <td><?php echo $all['marca']?></td>
                          
                            <td>
                            <a href="excluir.php?delete=<?php echo $all['id']?>"><i class="fa fa-trash" aria-hidden="true" style="font: size 10px;"></i></a>
                                <a href="editar.php?editar=<?php echo $all['id']?>"><i class="fa fa-edit" style="font-size:1opx;"></i></a>
                            </td>
                        </tr>
                <?php 
                    $i++;
                    if($i==20){
                        break;
                    }
                    }
                 }
                 ?>
                
        </tbody>
    </table>
    </div>
</body>
</html>