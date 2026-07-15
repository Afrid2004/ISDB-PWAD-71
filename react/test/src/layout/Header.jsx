import { Link, NavLink } from "react-router-dom";
function Header(){

return (
 <>
   <nav>

     <ul>
        <li><NavLink to="/home">Home</NavLink></li>
        <li><Link to="/about">about</Link></li>
        <li><Link to="/service">service</Link></li>
     </ul>



   </nav>
 </>
)}

export default Header;