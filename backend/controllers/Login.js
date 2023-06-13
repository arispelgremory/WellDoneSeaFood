const firebase = require("firebase/compat");

function login(req, res) {
    const response = {};

    try {
        // get data from request
        const { username, password } = req.body;

        // TODO: check username and password
        firebase.database().ref("")

        // TODO: return response
        response.status = 200;
        response.message = 'Login success';

    } catch (error) {
        response.status = 400;
        response.message = 'Invalid request';
    }
    res.send(response);
}


module.exports = { login }