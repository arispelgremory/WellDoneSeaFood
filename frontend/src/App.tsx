import React, { Suspense } from 'react';
import './assets/css/App.css';
import { Route, Routes } from "react-router-dom";
import Navigationbar from './components/shared/navbar';
import Shop from './components/shop/shop';
import About from './components/about/about';
import Contact from './components/contact/contact';

const HomeComponent = React.lazy(() => import('./components/home/home'));
const Login = React.lazy(() => import('./components/login/login'));


function App() {
  return (
    <Suspense fallback={<div>Loading...</div>}>
      <div id='app'>
        <Navigationbar  />
        <Routes>

          <Route path={`/`} element={<HomeComponent />} />
          <Route path={`/login`} element={<Login />} />
          <Route path={`/shop`} element={<Shop/>} />
          <Route path={`/about`} element={<About/>} />
          <Route path={`/contact`} element={<Contact/>} />
        </Routes>
    </div>
    </Suspense>
  );
}


export default App;
