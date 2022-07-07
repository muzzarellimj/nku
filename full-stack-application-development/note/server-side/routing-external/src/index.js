const express = require('express');
const app = express();
const port = 3000;

/* require the middleware */
const site = require('./external-router');

/* employ the use of the defined middleware at a particular site directory */
app.use('/site', site);

/* start the app and listen at the defined port */
app.listen(port, () => {
    console.log(`external-routing application listening on port ${port}.`);
});