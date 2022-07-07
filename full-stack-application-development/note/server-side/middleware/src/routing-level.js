const express = require('express');
const app = express();
const port = 3000;

/* sample function to call within routing */
const firstLevel = (request, response, next) => {
    console.log('first level');
    next();
}

/* sample function to call within routing */
const secondLevel = (request, response, next) => {
    console.log('second level');
    next();
}

/* mount middleware function at root to execute firstLevel and secondLevel each time the app receives a request */
app.use(firstLevel, secondLevel, (request, response, next) => {
    console.log('root level');
    next();
});

/* mount middleware function at root to execute each time a GET request is received at this path */
app.get('/', (request, response) => {
    console.log('received a GET request at root');
});

/* start the app and listen at the defined port */
app.listen(port, () => {
    console.log(`routing application listening on port ${port}.`);
});