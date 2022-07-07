const express = require('express');
const app = express();

const bodyParser = require('body-parser');
const fs = require('fs');
const uuid = require('uuid');

const port = 3000;

const publicDirectory = `${__dirname}/../public`;

app.use(express.json({
    verify: (request, response, buffer) => {
        try {
            JSON.parse(buffer);
        } catch (error) {
            response.status(406).send('JSON could not be successfully validated - please try again!');
        }
    }
}));

app.use(bodyParser.json());

app.post('/api', (request, response) => {
    let id = uuid.v4();

    fs.writeFile(`${publicDirectory}/${id}.json`, JSON.stringify(request.body, null, 4), (error) => {
        if (error) {
            response.status(500).send('An error was caught while writing the JSON file - please try again!');

        } else {
            response.location(`localhost:3000/api/${id}`);
            response.status(201).send('A JSON document has successfully been generated and stored.')
        }
    });
});

app.get('/api/:id', (request, response) => {
    let file = `${publicDirectory}/${request.params.id}.json`;

    fs.access(file, fs.constants.F_OK, (error) => {
        if (error) {
            response.status(404).send('A JSON document with the provided unique identifier cannot be found - please try again!');

        } else {
            fs.readFile(file, { encoding: 'utf-8' }, (error, data) => {
                if (error) {
                    response.status(500).send(`An error occurred while retrieving document ${request.params.id} - please try again!`);

                } else {
                    response.status(200).send(data);
                }
            });
        }
    });
});

app.put('/api/:id', (request, response) => {
    
    // check to see if the ID of the JSON exists in the public folder
    let id = request.params.id;
    fs.access(`${publicDirectory}/${id}.json`, fs.constants.F_OK, (error) => {

        // if the <id>.json does not exist then return an HTTP 404 per JSON Blob API documentation
        if(error) {

            response.status(404).send(`The provided ID could not be found. Please verify that you have the correct ID of the JSON document and try again. The ID received was: ${id}`);

        }
        // if the <id>.json does exist then return an HTTP 200 with the body of the response being the JSON received
        else {
            // overwrite the existing file with the new body of the request
            fs.writeFile(`${publicDirectory}/${id}.json`, JSON.stringify(request.body, null, 4), (error) => {

                // catch any errors that may occur while writing
                if (error) {

                    response.status(500).send('An error was caught while writing the JSON file - please try again!');
        
                } 
                else {
                    // read the file so that it may be returned in the body of the HTTP 200
                    fs.readFile(`${publicDirectory}/${id}.json`, (error, data) => {

                        // catch any errors that may occur while writing
                        if(error) {

                            response.status(500).send('An error was caught while reading the JSON file - the file was updated on the server.');

                        }
                        // send the response back if there were no issues
                        else {
                            response.status(200).send(`${data}`);
                        }

                    });
                    
                }
            });

        }

    });

});

app.delete('/api/:id', (request, response) => {
    let file = `${publicDirectory}/${request.params.id}.json`;

    fs.access(file, fs.constants.F_OK, (error) => {
        if (error) {
            response.status(404).send('A JSON document with the provided unique identifier cannot be found - please try again!');

        } else {
            fs.rm(file, (error) => {
                if (error) {
                    response.status(500).send(`An error occurred while deleting document ${request.params.id} - please try again!`);

                } else {
                    response.status(200).send(`Document ${request.params.id} has been deleted successfully.`);
                }
            });
        }
    });
});

app.listen(port, () => {
    console.log(`application is listening on port ${port}.`);
});
