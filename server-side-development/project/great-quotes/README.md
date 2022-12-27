# Great Quotes

Great Quotes is a web application that enables users to create, read, update, and delete quotes and the authors each 
quote is attributed to.

**Note: this was completed as a group assignment by Michael Muzzarelli and Andrew Oneal.**

## Assignment Guidelines

This application is built with a number of scripts, and the following scripts should be created containing the following
functions:

- ~~Create file `author.csv` to store an author collection.~~

- ~~Create file `quote.csv` to store a quote collection.~~

- Create an abstract class `collection-util.php` to define a collection class structure:
  - ~~`retrieveCollection($filepath)` to retrieve a collection as an array.~~
  - ~~`retrieveRecord($filepath, $index)` to retrieve a record at index `$index`.~~
  - ~~`createRecord($filepath, $record)` to create a record and append it to the collection.~~
  - ~~`updateRecord($filepath, $index, $record)` to update a record at index `$index` with the content of `$record`.~~
  - ~~`deleteRecord($filepath, $index)` to delete a record at index `$index` and replace it with an empty line.~~
  - ~~`deleteRecordDeep($filepath, $index)` to delete a record at index `$index` and remove the empty line.~~

- ~~Create an abstract class `collection.php` to define a collection class structure:~~
  - ~~`__construct($name)` to construct collections with intent.~~
  - ~~`retrieveCollection()` to retrieve a collection as an array.~~
  - ~~`retrieveRecord($index)` to retrieve a record at index `$index`.~~
  - ~~`createRecord($record)` to create a record and append it to the collection.~~
  - ~~`updateRecord($index, $record)` to update a record at index `$index` with the content of `$record`.~~
  - ~~`deleteRecord($index)` to delete a record at index `$index` and replace it with an empty line.~~
  - ~~`deleteRecordDeep($index)` to delete a record at index `$index` and remove the empty line.~~

- ~~Create collection classes `author_collection.php` and `quote_collection.php` to utilise abstract class `Collection` 
  and fulfill function stub requirements.~~

- Create `author` directory to contain appropriate HTML and PHP scripts:
  - `index.php` to list all available authors.
  - `detail.php` to detail an author and allow modification thereof.
  - `create.php` to contain a form to create author records.
  - `modify.php` to contain a similar form as `create.php` but with prefilled values.
  - `delete.php` to contain a deletion confirmation button and a response alert container.

- Create `quote` directory to contain appropriate HTML and PHP scripts:
  - `index.php` to list all available quotes and corresponding authors.
  - `detail.php` to detail a quote and allow modification thereof.
  - `create.php` to contain a form to create quote records.
  - `modify.php` to contain a similar form as `create.php` but with prefilled values.
  - `delete.php` to contain a deletion confirmation button and a response alert container.

- Fulfill authentication workflow as described in the included instructions, with aim for the following:
  - unauthenticated visitors can access indices and detail documents.
  - authenticated users can create, update, and delete records.

## Rubric

As the assignment and midterm contain separate rubrics, the following should be complete to ensure a positive grade
on each:

- all authentication instructions are functional.
- all core site components are functional, e.g., `index.php`, `detail.php`, `create.php`, `modify.php`, `delete.php`.
- all code is indented and commented appropriately.
- entities and utilities are structured in an object-oriented programming paradigm.

And bonus points are available on the following:

- author detail contains an modifiable profile picture.
- display a random record in `detail.php` and an error message in `delete.php` if a query string is not provided.

## Submission

Submission is completed with a link to the GitHub repository containing the necessary files, including a text file 
containing the names of all team members.