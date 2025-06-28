<?php 
    namespace Model;

    use DAO\TaskDAO;
use DateTime;

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
            if(!filter_var($id, FILTER_VALIDATE_INT)){
                die(json_encode(['status' => 'erro', 'descricao' => 'digite um id valido']));
            }
            
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
            if(!filter_var($id_usuario, FILTER_VALIDATE_INT)){
                die(json_encode(['status' => 'erro', 'descricao' => 'digite um id de usuario valido']));
            }
            
            $this->id_usuario = $id_usuario;
        }

        public function getTitulo() : string
        {
            return $this->titulo;
        }

        public function setTitulo(string $titulo) : void
        {
            if(mb_strlen($titulo) > 100){
                    die(json_encode(['status' => 'erro', 'descricao' => 'Um título pode ter no máximo 100 letras incluindo espaços']));
            }
            
            $this->titulo = $titulo;
        }

        public function getDescricao() : string
        {
            return $this->descricao;
        }

        public function setDescricao(string $descricao) : void
        {
            if(mb_strlen($descricao) > 300){
                    die(json_encode(['status' => 'erro', 'descricao' => 'Uma descrição pode ter no máximo 300 letras incluindo espaços']));
            }
            
            $this->descricao = $descricao;
        }

        public function setTipo(string $tipo): void{
            if($tipo !== 'unico' && $tipo !== 'recorrente'){
                die(json_encode([
                    'status' => 'erro',
                    'descricao' => 'tipo de lembrete nao conhecido'
                ]));
            }

            $this->tipo = $tipo;
        }

        public function setDelay(int $delay): void{
            if($delay > 7){
                 die(json_encode([
                    'status' => 'erro',
                    'descricao' => 'Um lembrete pode esperar no maximo 7 dias'
                ]));
            }
            $this->delay = $delay;
        }

        public function setHorario(string $horario): void{
            $h = DateTime::createFromFormat('H:i:s', $horario);

            if($h && $h->format('H:i:s') === $horario){
                $this->horario = $horario;
                return;
            }

            die(json_encode([
                'status' => 'erro',
                'descricao' => 'horario invalido. formato esperado H-i-s'
            ]));
        }

        public function setInicio(string $inicio): void{
            $d = DateTime::createFromFormat('Y-m-d', $inicio);

            if($d && $d->format('Y-m-d') === $inicio){
              $this->inicio = $inicio;
              return;
            }

            die(json_encode([
                'status' => 'erro',
                'descricao' => 'data de inicio invalida. formato esperado Y-m-d'
            ]));
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