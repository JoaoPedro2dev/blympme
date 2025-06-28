<?php 
    header("Content-Type: application/json; cahrset=utf-8");

    use Controller\TaskController;
    use Help\Functions;

    Functions::verifyKey();
    
    switch(Functions::formatUrl()){
        case '/':
            echo "INDEX \n";
            echo json_encode(TaskController::index(), JSON_UNESCAPED_UNICODE);
        break;
            
        case '/get':
            echo "GET \n";

            if(!isset($_GET['id']) || empty($_GET['id'])){
                die(json_encode(['status' => 'erro', 'descricao' => 'voce precisa de um id']));
            }

            Functions::typeId($_GET['id']);

            $result = TaskController::getTask( (int) $_GET['id']);

            if( $result ){
                echo json_encode($result, JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode(['status' => 'erro', 'descricao' => 'task nao encontrada']);
            }    
        break;
            
        case '/post':
            echo "INSERT \n";
            
            $array = [
                ['var' => 'id_usuario', 'descricao' => 'id usuario'],
                ['var' => 'titulo', 'descricao' => 'titulo'],
                ['var' => 'descricao', 'descricao' => 'descricao'],
                ['var' => 'tipo', 'descricao' => 'tipo'],
                ['var' => 'delay', 'descricao' => 'delay'],
                ['var' => 'horario', 'descricao' => 'horario'],
                ['var' => 'inicio', 'descricao' => 'inicio'],

            ];

            foreach($array as $var){
                Functions::verificarVariaveis($var['var'], $var['descricao']);
            }

            Functions::typeId($_GET['id_usuario']);

            $response = TaskController::insertTask($_GET['id_usuario'], $_GET['titulo'], $_GET['descricao'], $_GET['tipo'], $_GET['delay'], $_GET['horario'], $_GET['inicio']);

            if($response){
                echo json_encode(['status' => 'sucesso', 'descricao' => 'cadastrado']);
            }else{
                die(json_encode(['status' => 'erro', 'descricao' => 'erro ao cadastrar']));
            }
            
        break;
            
        case '/put':
            echo "UPDATE \n";

            $array = [
                ['var' => 'id', 'descricao' => 'id'],
                ['var' => 'titulo', 'descricao' => 'titulo'],
                ['var' => 'descricao', 'descricao' => 'descricao'],
                ['var' => 'tipo', 'descricao' => 'tipo'],
                ['var' => 'delay', 'descricao' => 'delay'],
                ['var' => 'horario', 'descricao' => 'horario'],
                ['var' => 'inicio', 'descricao' => 'inicio'],

            ];

            foreach($array as $var){
                Functions::verificarVariaveis($var['var'], $var['descricao']);
            }

            Functions::typeId($_GET['id']);

            $response = TaskController::updateTask($_GET['id'], $_GET['titulo'], $_GET['descricao'], $_GET['tipo'], $_GET['delay'], $_GET['horario'], $_GET['inicio']);
            
            if($response){
                echo json_encode(['status' => 'sucesso', 'descricao' => 'Alterações salvas com sucesso']);
            }else{
                echo json_encode(['status' => 'erro', 'descricao' => 'Alterações não salvas, id não encontrado']);
            }
        break;
            
        case '/delete':
            echo "DELETE \n";

            if(!isset($_GET['id']) || empty($_GET['id'])){
                die(json_encode(['status' => 'erro', 'descricao' => 'voce precisa de um id']));
            }

            Functions::typeId($_GET['id']);

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