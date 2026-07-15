import Header from './layout/Header'
import Footer from './layout/Footer'
import Sidebar, { Test } from './layout/Sidebar'
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Home from './pages/Home';
import About from './pages/About';
import Service from './pages/Service';
import Layout from './layout/Layout';


function App() {
  return (

    <BrowserRouter>
      <Routes>
         <Route path='/' element={<Layout/>}>
           <Route path='/home' element={<Home />} />
           <Route path='/about' element={<About />} />
           <Route path='/service' element={<Service />} />
         </Route>
        
      </Routes>
    </BrowserRouter>


  )
}

export default App;
