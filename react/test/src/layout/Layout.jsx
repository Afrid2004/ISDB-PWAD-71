import React from 'react'
import Header from './Header'
import Footer from './Footer'
import Sidebar from './Sidebar'
import { Outlet } from 'react-router-dom'

function Layout() {
  return (
   <>
    <Header/>
    <Sidebar/>
      <Outlet/>
    <Footer/>
   </>
  )
}

export default Layout