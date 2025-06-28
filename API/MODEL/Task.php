<?php 
    namespace Model;

    use DAO\TaskDAO;

    class Task implements \JsonSerializable{
        private ?int $id;
        private ?int $id_usuario;
        private string $titulo;
        private string $descricao;
        private string $tipo;
        private int $delay;
        private string $horario;
        private string $inicio;

        public function cadastrarTask() : Task
        {
            return (new TaskDAO())->insert($this);
        }

        public function selecionarTask(int $id) : ?Task
        {
            return (new TaskDAO())->getById($id);
        }

        public function listarTasks() : array
        {
            return (new TaskDAO())->selectAll();
        }

        public function alterarTask()
        {
            return (new TaskDAO())->update($this);            
        }

        public static function deletarTask(int $id) : bool
        {
            return (new TaskDAO())->delete($id);
        }

        public function getId() : ?int
        {
            return $this->id;
        }

        public function setId(?int $id) : void
        {
            $this->id = $id;
        }

        public function getIdUsuario() : ?int
        {
            return $this->id_usuario;
        }

        public function getTipo(): string{
            return $this->tipo;
        }

        public function getDelay(): int{
            return $this->delay;
        }

        public function getHorario(): string{
            return $this->horario;
        }

        public function getInicio(): string{
            return $this->inicio;
        }

        public function setIdUsuario(?int $id_usuario) : void
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

        public function setTipo(string $tipo): void{
            if($tipo !== 'único' && $tipo !== 'Recorrente'){
                die(json_encode(['status' => 'erro', 'descricao' => 'tipo de lembrete não conhecido']));
            }

            $this->tipo = $tipo;
        }

        public function setDelay(int $delay): void{
            $this->delay = $delay;
        }

        public function setHorario(string $horario): void{
            $this->horario = $horario;
        }

        public function setInicio(string $inicio): void{
            $this->inicio = $inicio;
        }

        public function jsonSerialize(): array
        {
            return [
                'id' => $this->id,
                'titulo' => $this->titulo,
                'descricao' => $this->descricao,
            ];
        }
    }
?>