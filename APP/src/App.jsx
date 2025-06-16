import "./App.css";
import Card from "./Componentes/Card/Card";
import Header from "./Componentes/Header/Header";
import { Plus } from "lucide-react";

function App() {
  return (
    <div>
      <Header />
      <section>
        <Card />
        <Card />
      </section>
      <button className="addBtn">
        <Plus />
      </button>
    </div>
  );
}

export default App;
