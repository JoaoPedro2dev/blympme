import { useState } from "react";
import "./Login.css";
import { Eye, EyeOff } from "lucide-react";
import { useNavigate } from "react-router";

function Login() {
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
        <h2>Login</h2>

        <p>
          <label htmlFor="user">Usuario</label>
          <input type="text" id="user" name="user" />
          <span className="errorMsgm">erro</span>
        </p>

        <p>
          <label htmlFor="pass">Senha</label>
          <div className="inputWrapper">
            <input type={typeInput} id="pass" name="pass" maxLength={10} />
            <span id="eyeBox" onClick={changePass}>
              {passVisible ? <Eye color="#ccc" /> : <EyeOff color="#ccc" />}
            </span>
          </div>
          <span className="errorMsgm">erro</span>
        </p>

        <p>
          <input type="submit" value="ENTRAR" />
          <a href="#">Ainda não possui uma conta? Criar uma</a>
        </p>
      </form>
    </div>
  );
}

export default Login;
