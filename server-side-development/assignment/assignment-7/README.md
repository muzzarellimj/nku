# Assignment 7: Class Creation

## Installation and Usage

This assignment relies on [Composer](https://getcomposer.org/) and [Pest](https://pestphp.com/) and requires 
dependencies installation prior to run. To this end, ensure `composer` is an available command via PATH and run 
`composer update`. Once all dependencies are installed, run `composer test` to initialise the Pest unit testing process.
In the event that this is an annoying process, a screenshot of a successful test run can be found [here](data/unit-test-screenshot.png).

## Assignment Guidelines

In this assignment, we are asked to create four classes - `CsvHandler`, `JsonHandler`, `AuthenticationHandler`, and 
`Entity` - and appropriate unit tests (e.g., `CsvHandlerTest`). The classes are as such:

- `CsvHandler` and `JsonHandler` should contain format-appropriate CRUD (create, read, update, delete) functions.

- `AuthenticationHandler` should contain functions to support signing a user up, in, or out, and validating 
  authentication to retrieve information about an authenticated user.

- `Entity` should contain entity-appropriate CRUD (create, read, update, delete) functions and can be the same entities
  used in the midterm.

Each class should also be accompanied by a unit test class to ensure all functions work as expected with dummy data.

## Submission

Submission is completed with a link to the GitHub repository containing the necessary files.