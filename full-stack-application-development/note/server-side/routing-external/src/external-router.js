const express = require('express');
const router = express.Router();

/* define middleware specific to this router */
router.use((request, response, next) => {
    console.log('Time: ' + Date.now());
    next();
});

/* define the route at root ('/') */
router.get('/', (request, response) => {
    response.send('Home');
});

/* define the route at about ('/about') */
router.get('/about', (request, response) => {
    response.send('About');
});

/* export the router */
module.exports = router;