<?php

namespace Controller;

use Model\Task;

    final class TaskController{
        public static function index(){
            return (new Task())->listarTasks();
        }

        public static function getTask(int $id){
            return (new Task())->selecionarTask( $id);
        }

        public static function insertTask(int $id_usuario, string $titulo, string $descricao, string $tipo, int $delay, string $horario, string $inicio){
            $model = new Task();

            $model->setIdUsuario( $id_usuario );
            $model->setTitulo( $titulo );
            $model->setDescricao( $descricao );
            $model->setTipo($tipo);
            $model->setDelay($delay);
            $model->setHorario($horario);
            $model->setInicio($inicio);

            return $model->cadastrarTask();
        }

        public static function updateTask(int $id, string $titulo, string $descricao, string $tipo, int $delay, string $horario, string $inicio){
            $model = new Task();

            $model->setId( $id );
            $model->setTitulo( $titulo );
            $model->setDescricao(  $descricao );
            $model->setTipo($tipo);
            $model->setDelay($delay);
            $model->setHorario($horario);
            $model->setInicio($inicio);

            return $model->alterarTask();
        }

        public static function deleteTask(int $id){
            return Task::deletarTask( $id );
        }
    }
?>