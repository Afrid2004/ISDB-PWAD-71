import React from 'react'
import Header from './Header'
import Footer from './Footer'
import Sidebar from './Sidebar'
import { Outlet } from 'react-router-dom'
import { Container } from 'react-bootstrap'

const Layout = () => {
  return (
    <>
     <Header/>
     {/* <Sidebar/> */}

     <Container>

      <Outlet/>
     </Container>


     {/* <Footer/> */}
    
    </>
  )
}

export default Layout