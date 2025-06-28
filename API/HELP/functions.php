<?php 
    namespace Help;

    abstract class Functions{
        public static function verifyKey(){
            if(!isset($_GET['key']) || empty($_GET['key'])){
                die(json_encode(['status' => 'error', 'descricao' => 'voce precisa de uma chave de acesso']));
            }

            if($_GET['key'] !== $_ENV['key']){
                die(json_encode(['status' => 'error', 'descricao' => 'chave de acesso nao reconhecida']));
            }
        }

        public static function varLenght($var, int $max, string $descricao){
            if(mb_strlen($var) > $max){
                    die(json_encode(['status' => 'erro', 'descricao' => $descricao]));
            }
        }

        public static function typeId($id){
            if(!filter_var($id, FILTER_VALIDATE_INT)){
                die(json_encode(['status' => 'erro', 'descricao' => 'digite um id valido']));
            }
        }

        public static function formatUrl(){
            $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $base = '/blympme/API';
            
            return $url = str_replace($base, '', $url);
        }

        public static function verificarVariaveis($var, $erro){
            if(!isset($_GET[$var]) || empty($_GET[$var])){
                die(json_encode(['status' => 'erro', 'descricao' => $erro]));
            }
        }
    }  
?>