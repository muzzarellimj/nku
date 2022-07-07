# Assignment Five: Replication of the JSONBlob API

## Assignment Guidelines

Our task in this assignment is to create a replica of the [JSONBlob](https://jsonblob.com/) API, completed in a series 
of steps. First, read through the provided [API documentation](https://jsonblob.com/api) and understand the purpose of 
each request. Next, install and utilise the [Express](https://expressjs.com/) application framework and the 
[body-parser](https://www.npmjs.com/package/body-parser) and [fs](https://www.npmjs.com/package/fs) packages, along with
any other additional packages to ease development, to replicate the behavior of the JSONBlob API. The application 
should consist of a minimum of four routes:

- `POST` at `/api` - create a new JSON document, save it into a file with a unique identifier, and return the 
  identifier.
- `GET` at `/api/:id` - retrieve a JSON document from a file with a provided unique identifier.
- `PUT` at `/api/:id` - retrieve a JSON document with a provided unique identifier and update the content thereof.
- `DELETE` at `/api/:id` - retrieve a JSON document with a provided unique identifier and remove the content within.

Finally, we should create a file that enables the API to be tested with sample HTTP requests.

## Rubric

This assignment is graded positively on the following elements:

- the POST, GET, PUT, and DELETE API functions work as expected - 6 points
- the project contains a file for testing route functionality - 1 point
- the project folder is tidy and well-organized, and data is stored appropriately without any possibility of conflicting 
  file names when creating a new JSON document - 1 point
- the application checks if the data sent in the body is formatted according to the JSON file format before processing 
  them - 1 point
- the application checks if the file contains JSON data before encoding them into the response body - 1 point

## Submission

Submission is completed individually as a link to the GitHub repository.