import React, {ChangeEvent, FormEvent, useState} from 'react';
import {Button, FormElement, Input, Link, Spacer, Text} from "@nextui-org/react";
import {useNavigate} from "react-router-dom";

function Login() {
    return (
        <div className={`h-screen w-screen py-4 max-h-screen max-w-screen`}>
            <div className={`w-4/5 h-full mx-auto flex`}>
                <div className={`w-1/2 px-8 flex flex-col justify-center h-full`}>
                    <div className={`mb-8  w-3/4`}>
                        <Text h1>Sign In</Text>
                        <Text h4>Enter your credentials to access of your account.</Text>
                    </div>
                    <LoginForm />
                </div>



                <div className={`w-1/2`}>
                    <img
                        className={`h-full rounded-2xl`}
                        alt={`landing`}
                        src={`/assets/images/Login/landing.jpg`}
                    />
                </div>
            </div>
        </div>
    )
}

function LoginForm() {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const [usernameError, setUsernameError] = useState('');
    const [passwordError, setPasswordError] = useState('');

    const navigate = useNavigate();

    const handleUsernameChange = (e: ChangeEvent<FormElement>) => {
        setUsername(e.currentTarget.value);
    }

    const handlePasswordChange = (e: ChangeEvent<FormElement>) => {
        setPassword(e.currentTarget.value);
    }

    const handleSubmit = (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();




        // TODO: Fetch API to login

        // if username is wrong
        // if() {
        //     setUsernameError("test");
        // }

        // if password is wrong
        // if() {
        //     setPasswordError("test");
        // }

        navigate(`/`);

    };

    return (
        <div className={`w-3/4`}>
            <form onSubmit={handleSubmit}>
                <div className={`flex flex-col mb-4`}>
                    <Input
                        clearable
                        label={"Username"}
                        size={"lg"}
                        placeholder={"Your Name"}
                        name={"username"}
                        id={"username"}
                        bordered
                        color={"primary"}
                        helperText={usernameError}
                        onChange={handleUsernameChange}
                    />
                </div>
                <div className={`flex flex-col`}>
                    <Input.Password
                        clearable
                        label={"Password"}
                        size={"lg"}
                        placeholder={"Your Password"}
                        name={"Password"}
                        id={"password"}
                        bordered
                        color={"primary"}
                        helperText={passwordError}
                        onChange={handlePasswordChange}
                    />
                </div>
                <Spacer y={3} />
                <Button css={{width: `100%`}} color="primary" type={`submit`}>Login</Button>
            </form>
            <Spacer y={0.8} />
            <p>Haven't have an account? <span><Link color={"primary"} href={"#"}>Register</Link></span></p>
        </div>
    );
}


export default Login;