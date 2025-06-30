import { StrictMode } from "react";
import { createRoot } from "react-dom/client";
import "./index.css";
import App from "./App.jsx";

import { createBrowserRouter, RouterProvider } from "react-router";

import TaskForm from "./Pages/TaskForm/TaskForm.jsx";
import Login from "./Pages/Login/Login.jsx";
import Cadastro from "./Pages/Cadastro/Cadastro.jsx";
import Agreement from "./Pages/Agreement/Agreement.jsx";
import Editar from "./Pages/Editar/Editar.jsx";

const router = createBrowserRouter([
  {
    path: "/",
    element: <App />,
  },
  {
    path: "/login",
    element: <Login />,
    errorElement: <p>Error page Login</p>,
  },
  {
    path: "/cadastro",
    element: <Cadastro />,
    errorElement: <p>Error page cadastro</p>,
  },
  {
    path: "/adicionar",
    element: <TaskForm />,
    errorElement: <p>Error page adicionar</p>,
  },
  {
    path: "/editar_lembrete",
    element: <Editar />,
    errorElement: <p>Error page editar</p>,
  },
  {
    path: "/termos",
    element: <Agreement />,
    errorElement: <p>Error page Agreement</p>,
  },
]);

createRoot(document.getElementById("root")).render(
  <StrictMode>
    <RouterProvider router={router} />
  </StrictMode>
);
