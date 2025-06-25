<?php
    require_once"./autoload.php";
    require_once"./config/conexao.php";
    include_once"./HELP/functions.php";

    use Controller\TaskController;

    header("Content-Type: application/json; cahrset=utf-8");

    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $base = '/blympme/API';
    $url = str_replace($base, '', $url);

    verifyKey();
    
    switch($url){
        case '/':
            echo "INDEX \n";
            echo json_encode(TaskController::index(), JSON_UNESCAPED_UNICODE);
            break;
            
        case '/get':
            echo "GET \n";

            if(!isset($_GET['id']) || empty($_GET['id'])){
                die(json_encode(['status' => 'erro', 'descricao' => 'voce precisa de um id']));
            }

            typeId($_GET['id']);

            $result = TaskController::getTask( (int) $_GET['id']);

            if( $result ){
                echo json_encode($result, JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode(['status' => 'erro', 'descricao' => 'task nao encontrada']);
            }
            
            break;
            
        case '/post':
            echo "INSERT \n";
            
            if(!isset($_GET['id_usuario']) || empty($_GET['id_usuario'])){
                die(json_encode(['status' => 'erro', 'descricao' => 'voce precisa de um id de usuario']));
            }

            typeId($_GET['id_usuario']);

            if(!isset($_GET['titulo']) || empty($_GET['titulo'])){
                die(json_encode(['status' => 'erro', 'descricao' => 'voce precisa de um titulo']));
            }

            if(!isset($_GET['descricao']) || empty($_GET['descricao'])){
                die(json_encode(['status' => 'erro', 'descricao' => 'voce precisa de uma descricao']));
            }
            
            varLenght( $_GET['titulo'], 100, 'titulo deve possuir no maximo 100 caracteres');
            varLenght( $_GET['descricao'], 300, 'descricao deve possuir no maximo 300 caracteres');

            $response = TaskController::insertTask($_GET['id_usuario'], $_GET['titulo'], $_GET['descricao']);

            if($response){
                echo json_encode(['status' => 'sucesso', 'descricao' => 'cadastrado']);
            }else{
                die(json_encode(['status' => 'erro', 'descricao' => 'erro ao cadastrar']));
            }
            
            break;
            
        case '/put':
            echo "UPDATE \n";

            if(!isset($_GET['id']) || empty($_GET['id'])){
                die(json_encode(['status' => 'erro', 'descricao' => 'voce precisa de um id']));
            }

            typeId($_GET['id']);

            if(!isset($_GET['titulo']) || empty($_GET['titulo'])){
                die(json_encode(['status' => 'erro', 'descricao' => 'voce precisa de um titulo']));
            }

            if(!isset($_GET['descricao']) || empty($_GET['descricao'])){
                die(json_encode(['status' => 'erro', 'descricao' => 'voce precisa de uma descricao']));
            }

            varLenght( $_GET['titulo'], 100, 'titulo deve possuir no maximo 100 caracteres');
            varLenght( $_GET['descricao'], 300, 'descricao deve possuir no maximo 300 caracteres');

            $response = TaskController::updateTask($_GET['id'], $_GET['titulo'], $_GET['descricao']);
            
            if($response){
                echo json_encode(['status' => 'sucesso', 'descricao' => 'alteracoes salvas com sucesso']);
            }else{
                echo json_encode(['status' => 'erro', 'descricao' => 'alteracoes nao salvas, id nao encontrado']);
            }
            
            break;
            
        case '/delete':
            echo "DELETE \n";

            if(!isset($_GET['id']) || empty($_GET['id'])){
                die(json_encode(['status' => 'erro', 'descricao' => 'voce precisa de um id']));
            }

            typeId($_GET['id']);

            $response = TaskController::deleteTask($_GET['id']);

            if($response){
                echo json_encode(['status' => 'sucesso', 'descricao' => 'task excluida']);    
            }else{
                echo json_encode(['status' => 'erro', 'descricao' => 'nao foi possivel excluir a task, id nao encontrado']);    
            }

            break;
            
        default: echo 'Esta página não foi encontrada';
    }
?>