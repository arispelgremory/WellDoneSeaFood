import React from 'react';
import NormalButton from "../../components/Buttons/Button";

function Login() {
    return (
        <div className={`h-screen w-screen py-4 max-h-screen max-w-screen`}>
            <div className={`w-4/5 h-full mx-auto flex`}>
                <div className={`w-1/2 px-8 flex flex-col justify-center h-full`}>
                    <div className={`mb-8  w-3/4`}>
                        <h1 className={`mb-0`}>Sign In</h1>
                        <h4>Enter your credentials to access o your account.</h4>
                    </div>
                    <div className={`mb-8 w-3/4`}>
                        <form>
                            <div className={`flex flex-col mb-4`}>
                                <label htmlFor="username" className={`mb-2 font-medium`}>Username: </label>
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    placeholder="Username"
                                    className={`border border-gray-400 rounded-lg p-2 focus:border-blue-300 focus:border-2`}
                                />
                                <p className={`visible text-red-700`}>This is an error</p>
                            </div>
                            <div className={`flex flex-col`}>
                                <label  className={`mb-2`} htmlFor="password">Password: </label>
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    placeholder="Enter your password"
                                    className={`border border-gray-400 rounded-lg p-2 focus:border-blue-300 focus:border-2`}
                                />
                                <p className={`visible text-red-700`}>This is an error</p>
                            </div>
                        </form>
                    </div>
                    <div className={`w-3/4`}>
                        <NormalButton text={`Login`} onPressed={() => {}} />
                    </div>
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

export default Login;