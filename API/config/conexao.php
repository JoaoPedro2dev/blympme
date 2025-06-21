<?php 
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $bd = 'blympme';

    $conexao = new mysqli($host, $user, $pass, $bd);

    if($conexao -> connect_error){
        die("Falah de conexão");
    }

    echo "Conectado";
?>