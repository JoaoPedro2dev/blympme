<?php
namespace DAO;

use DAO\DAO;
use Model\Task;

    class TaskDAO extends DAO{
        public function __construct()
        {
            parent::__construct();
        }        

        public function insert(Task $model) : Task
        { 
            $sql = "INSERT INTO lembretes (id_usuario, titulo, descricao, tipo, delay, horario, inicio) VALUES (?, ?, ?, ?, ?, ?, ?)";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $model->getIdUsuario());
            $stmt->bindValue(2, $model->getTitulo());
            $stmt->bindValue(3, $model->getDescricao());
            $stmt->bindValue(4, $model->getTipo());
            $stmt->bindValue(5, $model->getDelay());
            $stmt->bindValue(6, $model->getHorario());
            $stmt->bindValue(7, $model->getInicio());

            $stmt->execute();
            $model->setId(parent::$conexao->lastInsertId());
            
            return $model;
        }  

        public function getById(int $id) : ?Task {
            $sql = "SELECT * FROM lembretes WHERE id = ?";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject("Model\Task") ?: null;
        }

        public function selectAll(): array {
            $sql = "SELECT * FROM lembretes";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(DAO::FETCH_CLASS, "Model\Task");
        }

        public function update(Task $model) : ?bool{
            $sql = "SELECT id from lembretes WHERE id = ?";
            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $model->getId());
            $stmt->execute();
            $existe = $stmt->fetchColumn();

            if(!$existe){
                return false;
            }
            
            $sql = "UPDATE lembretes SET titulo = ?, descricao = ?, tipo = ?, delay = ?, horario = ?, inicio = ? WHERE id = ?";
            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $model->getTitulo());
            $stmt->bindValue(2, $model->getDescricao());
            $stmt->bindValue(3, $model->getTipo());
            $stmt->bindValue(4, $model->getDelay());
            $stmt->bindValue(5, $model->getHorario());
            $stmt->bindValue(6, $model->getInicio());
            $stmt->bindValue(7, $model->getId());
            $stmt->execute();       
            
            return true;
        }

        
        public function delete(int $id) : bool {
            $sql = "SELECT id from lembretes WHERE id = ?";
            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $existe = $stmt->fetchColumn();

            if(!$existe){
                return false;
            }

            $sql = "DELETE FROM lembretes WHERE id = ?";
            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            return $stmt->execute();
        }
    }
?>