
<?php
    if(!isset($_SESSION)){
        session_start();

        if(isset($_SESSION['usuario'])){

        } else{
            die('Você não está logado. <a href="login.php">Clique aqui para logar</a>');
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control+</title>
    <link rel="stylesheet"  href="css/main.css">
</head>
<body>
   
   <aside class="aside-menu">
        <div id="img-logo"></div>
        <nav class="menu-items">
            <a href="cadastrar.php">Cadastrar Produto</a>
            <a href="consultar.php">Consultar Produto</a>
            <a href="venda.php">Realizar Venda</a>
        </nav>
   </aside>
  <div class="infos">
    <h1 class="titulo">CONTROL+</h1>
  
    <div class="containers">
        <a href="cadastrar.php">
            <div id="itemOne" id="first">
            <h6>CADASTRAR PRODUTOS</h6>
            </div>
      </a>

      <a href="consultar.php">
        <div id="itemOne">
            <h6>CONSULTAR PRODUTOS</h6>
        </div>
      </a>
       <a href="venda.php">
        <div id="itemOne">
            <h6>REALIZAR VENDAS</h6>
        </div>
       </a>

        
    </div>
  </div>
</body>
</html>