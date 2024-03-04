<?php
    $host = "localhost";
    $user = "root";
    $senha = "";
    $db = "controlplus";
    $mysqli = new mysqli($host,$user, $senha,  $db);

    if($mysqli->connect_error){
        echo "Deu erro";
    }
?>

