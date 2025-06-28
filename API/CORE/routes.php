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

            Functions::verificarVariaveis('id', 'Você precisa de um id');

            Functions::typeId($_GET['id']);

            $result = TaskController::getTask( (int) $_GET['id']);

            if( $result ){
                echo json_encode($result, JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode(['status' => 'erro', 'descricao' => 'Task não encontrada'], JSON_UNESCAPED_UNICODE);
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

            $funcParams = array_map(function($campo){
                return ($_GET[$campo['var']]);
            }, $array);
            
            $response = TaskController::insertTask(...$funcParams);

            if($response){
                echo json_encode(['status' => 'sucesso', 'descricao' => 'cadastrado'], JSON_UNESCAPED_UNICODE);
            }else{
                die(json_encode(['status' => 'erro', 'descricao' => 'erro ao cadastrar'], JSON_UNESCAPED_UNICODE));
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

            $funcParams = array_map(function($campo){
                return ($_GET[$campo['var']]);
            }, $array);

            $response = TaskController::updateTask(...$funcParams);
            
            if($response){
                echo json_encode(['status' => 'sucesso', 'descricao' => 'Alterações salvas com sucesso'], JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode(['status' => 'erro', 'descricao' => 'Alterações não salvas, id não encontrado'], JSON_UNESCAPED_UNICODE);
            }
        break;
            
        case '/delete':
            echo "DELETE \n";

            Functions::verificarVariaveis('id', 'Você precisa de um id');

            Functions::typeId($_GET['id']);

            $response = TaskController::deleteTask($_GET['id']);

            if($response){
                echo json_encode(['status' => 'sucesso', 'descricao' => 'task excluida'], JSON_UNESCAPED_UNICODE);    
            }else{
                echo json_encode(['status' => 'erro', 'descricao' => 'nao foi possivel excluir a task, id nao encontrado'], JSON_UNESCAPED_UNICODE);    
            }
        break;
            
        default: echo 'Esta página não foi encontrada';
    }
?>