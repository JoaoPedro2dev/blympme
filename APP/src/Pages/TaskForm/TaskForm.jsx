import Header from "../../Componentes/Header/Header";
import "./TaskForm.css";

function TaskForm() {
  return (
    <div>
      <Header />

      <div className="formContainer">
        <form>
          <h2>Adicionando tarefa</h2>
          <p>
            <label htmlFor="title">Titulo</label>
            <input
              type="text"
              name="title"
              id="title"
              placeholder="Titulo da tarefa"
            />
          </p>

          <p>
            <label htmlFor="description">Descrição</label>
            <input
              type="text"
              name="description"
              id="description"
              placeholder="Descrição da tarefa"
            />
          </p>

          <p>
            <label htmlFor="taskType">Tipo da tarefa</label>
            <select name="taskType" id="taskType">
              <option value="unica">Única</option>
              <option value="recorrente">Recorrente</option>
            </select>
          </p>

          <p>
            <label htmlFor="taskTime">Tempo espera da tarefa</label>
            <select name="taskTime" id="taskTime">
              <option value="dia">A cada 1 dia</option>
              <option value="semana">A cada 1 semana</option>
              <option value="mes">A cada 1 mês</option>
            </select>
          </p>

          <p>
            <label htmlFor="taskDate">Data inicial da tarefa</label>
            <input type="date" name="taskDate" id="taskDate" />
          </p>

          <input type="submit" value="Adicionar tarefa" />
        </form>
      </div>
    </div>
  );
}

export default TaskForm;
