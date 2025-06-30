import { useState } from "react";
import { useNavigate } from "react-router";
import "./Cadastro.css";

import { Eye, EyeOff } from "lucide-react";

function Cadastro() {
  const [passVisible, setPassVisible] = useState(false);
  const [typeInput, setTypeInput] = useState("password");

  function changePass() {
    if (!passVisible) {
      setPassVisible(true);
      setTypeInput("text");
    } else {
      setPassVisible(false);
      setTypeInput("password");
    }
  }

  const navigate = useNavigate();

  return (
    <div className="loginContainer">
      <h1
        onClick={() => {
          navigate("/");
        }}
      >
        Header
      </h1>
      <form action="">
        <h2>Criar conta</h2>

        <p>
          <label htmlFor="user">Usuário</label>
          <input
            type="text"
            id="user"
            name="user"
            placeholder="Digite o seu nome de usuário"
          />
          <span className="errorMsgm">erro</span>
        </p>

        <p>
          <label htmlFor="pass">Senha</label>
          <div className="inputWrapper">
            <input
              type={typeInput}
              id="pass"
              name="pass"
              maxLength={10}
              placeholder="Digite sua senha"
            />
            <span id="eyeBox" onClick={changePass}>
              {passVisible ? <Eye color="#ccc" /> : <EyeOff color="#ccc" />}
            </span>
          </div>
          <span className="errorMsgm">erro</span>
        </p>

        <p className="agreementBox">
          <input type="checkbox" name="agreement" id="agreement" />
          <label htmlFor="agreement">
            Li e aceito os <a href="#">Termos e condições</a>
          </label>
          <span className="errorMsgm">erro</span>
        </p>

        <p>
          <input type="submit" value="CADASTRAR" />
          <a href="/login">Já possui uma conta?</a>
        </p>
      </form>
    </div>
  );
}

export default Cadastro;
