import "./App.css";
import Card from "./Componentes/Card/Card";
import Header from "./Componentes/Header/Header";
import { Plus } from "lucide-react";

const array = [
  {
    id: 3,
    title: "Titulo 3",
    descricao:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.",
  },
  {
    id: 4,
    title: "Titulo 4",
    descricao:
      "Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.",
  },
  {
    id: 5,
    title: "Titulo 5",
    descricao:
      "Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.",
  },
  {
    id: 6,
    title: "Titulo 6",
    descricao:
      "Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora.",
  },
  {
    id: 7,
    title: "Titulo 7",
    descricao:
      "Curabitur sodales ligula in libero. Sed dignissim lacinia nunc. Curabitur tortor.",
  },
  {
    id: 8,
    title: "Titulo 8",
    descricao:
      "Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis.",
  },
  {
    id: 9,
    title: "Titulo 9",
    descricao:
      "Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor.",
  },
  {
    id: 10,
    title: "Titulo 10",
    descricao:
      "Morbi lectus risus, iaculis vel, suscipit quis, luctus non, massa.",
  },
  {
    id: 11,
    title: "Titulo 11",
    descricao:
      "Fusce ac turpis quis ligula lacinia aliquet. Mauris ipsum. Nulla metus metus.",
  },
  {
    id: 12,
    title: "Titulo 12",
    descricao:
      "Ut fringilla. Suspendisse potenti. Nunc feugiat mi a tellus consequat imperdiet.",
  },
];

function App() {
  return (
    <div>
      <Header />
      <section>
        <h1>Meus lembretes</h1>
        {array.length < 1 ? (
          <p>
            Você ainda não possui lembretes, aproveite a nossa tecnologia para
            facilitar seu dia a dia
          </p>
        ) : (
          array.map((item, key) => (
            <Card key={key} title={item.title} descricao={item.descricao} />
          ))
        )}
      </section>
      <button className="addBtn">
        <Plus />
      </button>
    </div>
  );
}

export default App;
