const express = require('express');
const app = express();
const port = 300;

const multer = require('multer');
const upload = multer({ dest: 'public/upload/' })

app.use(express.static('public'));

/* mount a middleware function at root to execute each time a GET request is received */
app.get('/', (request, response) => {
    response.send('Hello world!');
});

/* mount a middleware function at root to execute each time a POSt request is received, and process with multer */
app.post('/', upload.single('avatar'), (request, response) => {
    console.log(request.file);
    response.send('upload complete');
});

/* start the app and listen at the defined port */
app.listen(port, () => {
    console.log(`file-upload application listening on port ${port}.`);
});