<?php 
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $base = '/blympme/API';

    $url = str_replace($base, '', $url);

    // echo $url."<br>";
    
    switch($url){
        case '/':
            echo "VocÊ esta no index";
            break;
        case '/tasks':
            echo "Aqui você pode listar as task";
            break;
        case '/cadastrartask':
            echo "Aqui você pode cadastrar tasks";
            break;
        default: echo 'not Found';
    }
?>