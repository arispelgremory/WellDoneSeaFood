import React from 'react';
import '../utilities/css/App.css';
import { Route, Routes } from "react-router-dom";
import Login from "./login/login";
import HomeComponent from "./home";

function App() {
  return (
      <Routes>
        <Route path={`/`} element={<HomeComponent />} />
        <Route path={`/login`} element={<Login />} />
      </Routes>
  );
}


export default App;
