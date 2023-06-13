const Login = require('./controllers/Login')

const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const port = 5000;
const multer = require('multer');

// For handling raw json
app.use(express.json());
// For handling url x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: true }));
// For handling form-data
app.use(multer().none());

// Import the firebase package
const firebase = require('firebase');

// Firebase Configurations
const firebaseConfig = {
    apiKey: "AIzaSyDpN8WwRB-GOgk610e54-ZpUgFr6bQc8ko",
    authDomain: "well-done-seafood.firebaseapp.com",
    projectId: "well-done-seafood",
    storageBucket: "well-done-seafood.appspot.com",
    messagingSenderId: "841522488604",
    appId: "1:841522488604:web:7219528fa0e06c60ee86d9",
    measurementId: "G-8CRDCB7XKJ"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

app.get('/', (req, res) => {
    // res.send('Hello World!');
    firebase.database();
})

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`)
});

app.post('/login', Login.login);