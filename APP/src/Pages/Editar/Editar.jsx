import { useState } from "react";
import Header from "../../Componentes/Header/Header";
import "./Editar.css";

function Editar() {
  const tarefa = {
    id: 1,
    titulo: "Titulo teste",
    descricao: "Descrição de teste",
    tipo: "recorrente",
    delay: 7,
  };

  const [formData, setFormData] = useState(tarefa);

  function inputChange(e) {
    const { name, value } = e.target;

    setFormData((prev) => ({
      ...prev,
      [name]: name === "delay" ? Number(value) : value,
    }));
  }

  return (
    <div>
      <Header />

      <div className="editarContainer">
        <form>
          <h2>Editar tarefa</h2>
          <p>
            <label htmlFor="title">Titulo</label>
            <input
              type="text"
              name="titulo"
              id="titulo"
              placeholder="Titulo da tarefa"
              value={formData.titulo}
              onInput={inputChange}
            />
          </p>

          <p>
            <label htmlFor="description">Descrição</label>
            <input
              type="text"
              name="descricao"
              id="descricao"
              placeholder="Descrição da tarefa"
              value={formData.descricao}
              onInput={inputChange}
            />
          </p>

          <p>
            <label htmlFor="taskTipo">Tipo da tarefa</label>
            <select
              name="tipo"
              id="tipo"
              value={formData.tipo}
              onChange={inputChange}
            >
              <option value={"unica"}>Única</option>
              <option value={"recorrente"}>Recorrente</option>
            </select>
          </p>

          <p>
            <label htmlFor="taskDelay">Tempo espera da tarefa</label>
            <select
              name="delay"
              id="delay"
              value={formData.delay}
              onChange={inputChange}
            >
              <option value={1}>A cada 1 dia</option>
              <option value={7}>A cada 1 semana</option>
              <option value={30}>A cada 1 mês</option>
            </select>
          </p>

          <input type="submit" value="Adicionar tarefa" />
        </form>
      </div>
    </div>
  );
}

export default Editar;
