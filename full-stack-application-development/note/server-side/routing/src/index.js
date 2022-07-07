const express = require('express');
const app = express();
const port = 3000;

/* call the route function at root ('/') and chain handlers beneath it */
app.route('/')
    .get((request, response) => {
        response.send('received a GET request');
    })

    .post((request, response) => {
        response.send('received a POST request');
    })

    .put((request, response) => {
        response.send('received a PUT request');
    })

    .patch((request, response) => {
        response.send('received a PATCH request');
    })

    .delete((request, response) => {
        response.send('received a DELETE request');
    });

/* start the app and listen at the defined port */
app.listen(port, () => {
    console.log(`routing application listening on port ${port}.`);
});