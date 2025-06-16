import "./Header.css";
import { CircleUser } from "lucide-react";

function Header() {
  return (
    <header>
      <h1>Header</h1>

      <CircleUser className="accountIcon" />
    </header>
  );
}

export default Header;
