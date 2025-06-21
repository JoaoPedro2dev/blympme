<?php
namespace API\DAO;

use API\DAO\DAO;
use API\MODEL\Task;

    class TaskDAO extends DAO{
        public function __construct()
        {
            parent::__construct();
        }        

        public function insert(Task $model) : Task
        { 
            $sql = "INSERT INTO lembretes (id_usuario, titulo, descricao) VALUES (?, ?, ?)";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $model->getIdUsuario());
            $stmt->bindValue(2, $model->getTitulo());
            $stmt->bindValue(3, $model->getDescricao());
            $stmt->execute();

            $model->setId(parent::$conexao->lastInsertId());
            
            return $model;
        }  

        public function getById(int $id) : ?Task {
            $sql = "SELECT * FROM lembretes WHERE id = ?";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject("API\MODEL\Task");
        }

        public function selectAll(): array {
            $sql = "SELECT * FROM lembretes";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(DAO::FETCH_CLASS, "API\MODEL\Task");
        }

        public function update(Task $model) : Task{
             $sql = "UPDATE lembretes SET id_usuario= ?, titulo = ?, descricao = ? WHERE id = ?";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $model->getIdUsuario());
            $stmt->bindValue(2, $model->getTitulo());
            $stmt->bindValue(3, $model->getDescricao());
            $stmt->bindValue(4, $model->getId());
            $stmt->execute();

            $model->setId(parent::$conexao->lastInsertId());
            
            return $model;
        }

        
        public function delete(int $id) : bool {
            $sql = "DELETE FROM lembretes WHERE id = ?";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            return $stmt->execute();
        }
    }
?>