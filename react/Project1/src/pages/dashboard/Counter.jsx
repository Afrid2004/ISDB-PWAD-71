import React, { useState } from 'react'

const Counter = () => {
 
  const [count,setCount]= useState(100);

  const [products, setProducts] = useState(
    [
    {id:1 , name:"Shop", price:100},
    {id:2 , name:"bag", price:1500},
    {id:3 , name:"Clock", price:2000},
    {id:4 , name:"Watch", price:5000},
  ]
  )




  function increaseConut(){
       setCount((abc)=> abc+2 )
     
  }
  function decreaseConut(){
       setCount((pre)=> pre-1 )
      
  }


  return (
    <>
     <div>{count}</div>
     <button onClick={increaseConut}> Increase </button>
     <button onClick={decreaseConut}> Decrease </button>
      <table className='table stripe'>
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Price</th>
             </tr>
         </thead>
         <tbody>
            {
               products.map((product)=>(
                <tr key={product.id}>
                    <th>{product.id}</th>
                    <th>{product.name}</th>
                    <th>{product.price}</th>
                </tr>
               ))

            }
         </tbody>
      </table>






    </>
  )
}

export default Counter