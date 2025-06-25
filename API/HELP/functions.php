<?php 
    function verifyKey(){
        if(!isset($_GET['key']) || empty($_GET['key'])){
            die(json_encode(['status' => 'error', 'descricao' => 'voce precisa de uma cave de acesso']));
        }

        if($_GET['key'] !== $_ENV['key']){
            die(json_encode(['status' => 'error', 'descricao' => 'chave de acesso nao reconhecida']));
        }
    }

    function varLenght($var, int $max, string $descricao){
        if(mb_strlen($var) > $max){
                die(json_encode(['status' => 'erro', 'descricao' => $descricao]));
        }
    }

    function typeId($id){
        if(!filter_var($id, FILTER_VALIDATE_INT)){
            die(json_encode(['status' => 'erro', 'descricao' => 'digite um id valido']));
        }
    }
?>