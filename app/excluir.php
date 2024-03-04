<?php 


 if($_GET['delete']){
    include ('../libary/conexao.php');
    $id = $mysqli->real_escape_string($_GET['delete']);
    
    $query = "DELETE FROM produto WHERE id = '$id'";
    $delete_sql = $mysqli->query($query) or die('mysqli erro');

    if($delete_sql){
        die('<span>Seu produto foi deletado do banco de dados</span>' . '  <a href="consultar.php">Clique aqui e volte para a consulta</a>');
    }
}