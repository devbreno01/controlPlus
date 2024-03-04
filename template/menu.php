<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
       *{
        margin: 0;
        padding: 0;
       
        }
       body{
        height: 100%;
        padding: 0;
        margin: 0;
       }
        .aside-menu{
            border: #242124 solid 2px;
            background-color: #242124;
            width: 230px;
            height: 120vh;
        }

        .aside-menu nav{
            margin-top: 80px;
        }
        .aside-menu a {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 14px;
            font-family: "Poppins", sans-serif;
            font-size: 17px;
            text-align: center;
            font-weight: 700;
            color: #D1024E ;
            text-decoration: none;

        }

        .aside-menu a:hover{
            text-decoration: underline;
        }
        #img-logo{
            width: 115.2px;
            height: 115.2px;
            border-radius: 50%;
            margin-top: 62.4px;
            margin-left:48.1px ;
            background-image: url(../app/img/logo.png);
            background-size: cover;
        }
    </style>
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
</body>
</html>