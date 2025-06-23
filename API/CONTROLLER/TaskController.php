<?php

namespace Controller;

use Model\Task;

    final class TaskController{
        public static function index(){
            return (new Task())->listarTasks();
        }

        public static function getTask($id){
            return (new Task())->selecionarTask($id);
        }

        public static function insertTask($id_usuario, $titulo, $descricao){
            $model = new Task();

            $model->setIdUsuario($id_usuario);
            $model->setTitulo($titulo);
            $model->setDescricao($descricao);

            return $model->cadastrarTask();
        }

        public static function updateTask($id, $titulo, $descricao){
            $model = new Task();

            $model->setId($id);
            $model->setTitulo($titulo);
            $model->setDescricao($descricao);

            return $model->alterarTask();
        }

        public static function deleteTask($id){
            return Task::deletarTask($id);
        }
    }
?>