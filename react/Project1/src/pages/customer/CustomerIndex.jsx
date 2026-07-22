import axios from 'axios';
import React, { useEffect, useState } from 'react'
import { NavLink, Link } from 'react-router-dom';

const CustomerIndex = () => {

 const [customers, setCustomers]= useState([]);
 const baseUrl= import.meta.env.VITE_API_BASE_URL;

 function fetchcustomer(){
    axios({
        url:`${baseUrl}/customer/`,
        method:"get",
        data:{} 
     })
     .then((res)=>{
        console.log(res.data);
        setCustomers(res.data.customer)
     })
     .catch((err)=>{
        console.log(err);
     })
  }

  useEffect(()=>{
   fetchcustomer()
  },[])

  if(customers.length > 0){
    return (
    <>
        <Link className='btn btn-primary' to={"/customer/create"}> Create Customer </Link>
       <br />
      <table>
        <thead>
  <tr>
             <th>id</th>
             <th>name</th>
             <th>mobile</th>
             <th>photo</th>
             <th>action</th>
         </tr>
        </thead>
        <tbody>
         {
           customers.map((customer, index)=>(
               <tr key={customer.id}>
                <th>{++index}</th>
                <th>{customer.name}</th>
                <th>{customer.mobile}</th>
                <th>{customer.photo}</th>
                <th> <Link className='btn btn-info' to={`/customer/edit/${customer.id}`}>Edit</Link> | Delete</th>
              </tr>
           ))

         }
         </tbody>
      </table>
    </>
  )
  }

  
}

export default CustomerIndex