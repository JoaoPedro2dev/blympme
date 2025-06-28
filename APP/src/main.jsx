import { StrictMode } from "react";
import { createRoot } from "react-dom/client";
import "./index.css";
import App from "./App.jsx";

import { createBrowserRouter, RouterProvider } from "react-router";

import TaskForm from "./Pages/TaskForm/TaskForm.jsx";
import Login from "./Pages/Login/Login.jsx";

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
    path: "/adicionar",
    element: <TaskForm />,
    errorElement: <p>Error page</p>,
  },
]);

createRoot(document.getElementById("root")).render(
  <StrictMode>
    <RouterProvider router={router} />
  </StrictMode>
);
