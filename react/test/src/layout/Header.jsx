
function Header({name, age, title , address:{ vill, po, dis}}){
// function Header(props){
return (
 <>
   This is Header

   <div>
      Name:{name}
   </div>
   <div>
      age:{age}
   </div>
   <div>
      Batch:{title}
   </div>
   <div>
      Vill:{vill}
      <br />
      dis:{dis}
      <br />
      po:{po}
   </div>
 </>
)}

export default Header;