import axios from 'axios';
import React, { useEffect, useState } from 'react'
import { useNavigate, useParams } from 'react-router-dom';

const EditCustomer = () => {
 const baseUrl= import.meta.env.VITE_API_BASE_URL;
 const navagate= useNavigate();

 const {id}= useParams();

//  console.log("params", useParams());
//  console.log("customerId",id);

function fetchCustomer(){
   axios({
      url:`${baseUrl}/customer/find/${id}`,
      method:"GET",
      data:{}
   })
   .then(res=>{
      setCustomer(res.data.customer)
      console.log(res.data);
   })
   .catch(err=>{
      console.log(err);
      
   })
}

useEffect(()=>{
   fetchCustomer()
   
},[]);
 

  const [customer , setCustomer]= useState({
     name:"",
     email:"",
     mobile:"",
     address:"",
     id:""
  });

  function handleChange(e){
    const {name,value}= e.target;
     setCustomer((prev)=>({
       ...prev,
       [name]:value
     })) 
  }


  function handleSubmit(e){
      e.preventDefault()
      console.log(customer);

      axios({
         url:`${baseUrl}/customer/update/${id}`,
         method:"put",
         data:customer
      })
      .then((res)=>{
         console.log(res);
         navagate("/customer");
      })
      .catch(err =>{
          console.log(err);
      })
      
  }

  return (
    <>
    
      <form  onSubmit={handleSubmit}>
       <div>
            <label htmlFor="name">Name</label> <br />
            <input onChange={handleChange} type="text"  name='name'   value={customer.name}/>
       </div>
       <div>
            <label htmlFor="mobile">Mobile</label> <br />
            <input onChange={handleChange} type="text"  name='mobile' value={customer.mobile}/>
       </div>
       <div>
            <label htmlFor="email">Email</label> <br />
            <input onChange={handleChange} type="text"  name='email' value={customer.email}/>
       </div>
       <div>
            <label htmlFor="address">address</label> <br />
            <textarea onChange={handleChange} type="text"  name='address' value={customer.address}> </textarea>
       </div>
       <div>
           
            <input type="submit"/>
       </div>


      </form>
    </>
  )
}

export default EditCustomer