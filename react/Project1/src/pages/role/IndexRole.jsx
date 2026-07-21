import axios from 'axios';
import React, { useEffect, useState } from 'react'
import Table from 'react-bootstrap/Table';
import Spinner from 'react-bootstrap/Spinner';
const IndexRole = () => {
 const baseUrl= import.meta.env.VITE_API_BASE_URL;
 const [roles , setRoles] = useState([]);
 const [loading, setLoading] = useState(false)
 const [error, setError] = useState("")


 const fetchRoles= async ()=>{
    try {
       setLoading(true);
       let res= await axios.get(`${baseUrl}/role`);
      //  return res.data.roles;
       console.log(res.data.roles);
       setRoles(res.data.roles);
      
    } catch (error) {
      setError(`${error}`)
       return error;
    }finally{
       setLoading(false);
    }
 } 
  useEffect(()=>{
   let roles= fetchRoles();
  }, [])

 if (loading) {
  return (
    <div className="text-center mt-5">
      <Spinner animation="border" variant="primary" />
      <p className="mt-2">Loading Roles...</p>
    </div>
  );
}

if (error) {
  return <div className="alert alert-danger">{error}</div>;
}

  if(!loading && roles.length !== 0){
 return (
    <>
      <Table striped bordered hover>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
           
          </tr>
        </thead>
        <tbody>

         {
           roles.map((role)=>(
            <tr key={role.id}>
            <td>{role.id}</td>
            <td>{role.name}</td>
            <td>Edit | Delete</td>
            </tr>
           ))
         }  
        </tbody>
      </Table>
    </>
  )
  }


 
}

export default IndexRole