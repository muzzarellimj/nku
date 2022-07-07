const express = require('express');
const app = express();
const port = 3000;

/* mount middleware function at root to execute each time the app receives a request */
app.use((request, response, next) => {
    console.log('Request Type: ' + request.method);
    next();
});

/* mount middleware function at '/:user' to execute each time a GET request is received at this path */
app.get('/:user', (request, response, next) => {
    response.send(request.params.user);
});

/* start the app and listen at the defined port */
app.listen(port, () => {
    console.log(`routing application listening on port ${port}.`);
});