import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from './assets/vite.svg'
import heroImg from './assets/hero.png'
import { BrowserRouter, Route, Routes } from 'react-router-dom'
import Layout from './layout/Layout'
import Dashboard from './pages/dashboard/Dashboard'
import 'bootstrap/dist/css/bootstrap.min.css'
import IndexRole from './pages/role/IndexRole'


function App() {
  const [count, setCount] = useState(0)

  return (
    <>
      <BrowserRouter>
       <Routes>
        <Route path='/' element={<Layout/>}>
           <Route path='/' element={<Dashboard/>}  />
           <Route path='/roles'  element={<IndexRole/>}/>



        </Route>
       </Routes>
      </BrowserRouter>



    </>
  )
}

export default App
