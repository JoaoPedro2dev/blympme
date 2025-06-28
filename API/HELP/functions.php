<?php 
    namespace Help;

    abstract class Functions{
        public static function verifyKey(){
            if(!isset($_GET['key']) || empty($_GET['key'])){
                die(json_encode(['status' => 'error', 'descricao' => 'Você precisa de uma chave de acesso'], JSON_UNESCAPED_UNICODE));
            }

            if($_GET['key'] !== $_ENV['key']){
                die(json_encode(['status' => 'error', 'descricao' => 'Chave de acesso não reconhecida'], JSON_UNESCAPED_UNICODE));
            }
        }

        public static function typeId($id){
            if(!filter_var($id, FILTER_VALIDATE_INT)){
                die(json_encode(['status' => 'erro', 'descricao' => 'Digite um id válido'], JSON_UNESCAPED_UNICODE));
            }
        }

        public static function formatUrl(){
            $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $base = '/blympme/API';
            
            return $url = str_replace($base, '', $url);
        }

        public static function verificarVariaveis($var, $erro){
            if(!isset($_GET[$var]) || empty($_GET[$var])){
                die(json_encode(['status' => 'erro', 'descricao' => $erro], JSON_UNESCAPED_UNICODE));
            }
        }
    }  
?>