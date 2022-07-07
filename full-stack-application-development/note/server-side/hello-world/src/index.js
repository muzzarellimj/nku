const express = require('express');
const app = express();
const port = 3000;

/* respond at root ('/') with the non-formatted text 'Hello world!' */
app.get('/', (request, response) => {
    response.send('Hello world!');
});

/* start the app and listen at the defined port */
app.listen(port, () => {
    console.log(`hello-world application listening on port ${port}.`);
});