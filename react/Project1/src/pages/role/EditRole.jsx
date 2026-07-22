import axios from 'axios';
import React, { useState } from 'react'
import Form from 'react-bootstrap/Form';
import { useParams } from 'react-router-dom';

const EditRole = () => {

  const [role, setrole] = useState({name:""});
  const {id} = useParams();

 const baseUrl= import.meta.env.VITE_API_BASE_URL;


//  function  fetchRole(id){
//   let response=  axios.get(`${$base_url}/role/find/${id}`);
//   setrole(response.data.role)
//  }

 function handleChange(e){
   const [name , value]= e.target.value;
    setrole((role)=>({
      ...role,
      [name]:value
    }));
 }

 function handleSubmit(){

 }






  return (
    <>
    
    <Form  onSubmit={handleSubmit}>
      <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
        <Form.Label>Name</Form.Label>
        <Form.Control value={role.name} type="text" placeholder="admin" onChange={handleChange} />
      </Form.Group>
      <Form.Group className="mb-3" controlId="exampleForm.ControlInput1">
        <Form.Control type="submit" className='btn btn-primary'/>
      </Form.Group>
    </Form>
    
    
    
    </>
  )
}

export default EditRole