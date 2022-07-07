const express = require('express');
const app = express();
const port = 3000;

/* declare the 'public' and 'assets' directories static resource directories */
app.use(express.static('public'));
app.use(express.static('assets'));

/* respond at root ('/') with non-formatted instructions to load static resources */
app.get('/', (request, response) => {
    response.send('To load a static resource, call the resource filename URL; e.g., localhost:3000/about.html');
});

/* start the app and listen at the defined port */
app.listen(port, () => {
    console.log(`static-file application listening on port ${port}.`);
});