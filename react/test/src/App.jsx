import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from './assets/vite.svg'
import heroImg from './assets/hero.png'
import './App.css'
import Header from './layout/Header'
import Footer from './layout/Footer'
import Sidebar, { Test } from './layout/Sidebar'

function App() {
   let myfunction = Test();
   let a= 10;
   let b= 20;
  return (
    <>
       <br />
       <Header address={{
        vill:"borojura", po:"Ishwargonj", dis:"Mymensingh"
        }}   title="Batch71" name="Rashed" age="25"/>
       <br /> 
       <Sidebar/>
        <br />
       <Footer/>

    </>
  )
}

export default App;
