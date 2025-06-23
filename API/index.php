<?php
    require_once"./autoload.php";
    require_once"./config/conexao.php";

    use Controller\TaskController;


    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $base = '/blympme/API';

    $url = str_replace($base, '', $url);
    
    switch($url){
        case '/':
            echo "Você esta no index, aqui seram listadas todas as Tasks";
            var_dump(TaskController::index());
            break;
        case '/getTask':
            echo "Aqui você pode listar uma task de acordo com o id";
            var_dump(TaskController::getTask($_GET['id']));
            break;
        case '/cadastrartask':
            echo "Aqui você pode cadastrar tasks";
            var_dump(TaskController::insertTask($_GET['id_usuario'], $_GET['titulo'], $_GET['descricao']));
            break;
        case '/alterartask':
            echo "Aqui você pode alterar tasks";
            var_dump(TaskController::updateTask($_GET['id'], $_GET['titulo'], $_GET['descricao']));
            break;
        case '/deletartask':
            echo "Aqui você pode deletar uma task";
            var_dump(TaskController::deleteTask($_GET['id']));
            break;
        default: echo 'not Found';
    }
?>