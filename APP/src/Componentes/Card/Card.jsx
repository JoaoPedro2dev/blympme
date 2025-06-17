import "./Card.css";

import { Pen, Trash } from "lucide-react";

function Card({ title, descricao }) {
  return (
    <div className="cardBody">
      <div className="cardTop">
        <h1>{title}</h1>
      </div>
      <div className="cardBottom">
        <p>{descricao}</p>
      </div>
      <nav>
        <Pen className="configIcon" />
        <Trash className="configIcon" />
      </nav>
    </div>
  );
}

export default Card;
