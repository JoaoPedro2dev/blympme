import "./Header.css";
import { CircleUser } from "lucide-react";
import { useNavigate } from "react-router-dom";

function Header() {
  const navigate = useNavigate();

  return (
    <header>
      <h1
        onClick={() => {
          navigate("/");
        }}
      >
        Header
      </h1>

      <CircleUser className="accountIcon" />
    </header>
  );
}

export default Header;
