<?php 
    class Task{
        private ?int $id;
        private int $id_usuario;
        private string $titulo;
        private string $descricao;

        public function cadastrarTask() : Task
        {
            
        }

        public function selecionarTask(int $id) : ?Task
        {
            
        }

        public function listarTasks() : array
        {
            
        }

        public function alterarTask(int $id)
        {
            
        }

        public function deletarTask(int $id) : bool
        {
            
        }

        public function getId() : ?int
        {
            return $this->id;
        }

        public function setId(?int $id) : void
        {
            $this->id = $id;
        }

        public function getIdUsuario() : int
        {
            return $this->id_usuario;
        }

        public function setIdUsuario(int $id_usuario) : void
        {
            $this->id_usuario = $id_usuario;
        }

        public function getTitulo() : string
        {
            return $this->titulo;
        }

        public function setTitulo(string $titulo) : void
        {
            $this->titulo = $titulo;
        }

        public function getDescricao() : string
        {
            return $this->descricao;
        }

        public function setDescricao(string $descricao) : void
        {
            $this->descricao = $descricao;
        }
    }
?>