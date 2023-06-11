import React from 'react';
import Login from "./login/login";
import '../utilities/css/App.css';
import NormalButton from "../components/Buttons/Button";
import LoadingButton from "../components/Buttons/LoadingButton";

function App() {
  return (
    // <div className="text-2xl">
    //     <h1>Hello World</h1>
    //     <NormalButton text={"Testing reusable component"} onPressed={test} />
    //     <LoadingButton />
    // </div>
      <Login />
  );
}


export default App;
