# Assignment Four: Adding JavaScript Events

View the most recent published (publicly committed) page-based pagination implementation 
[here](https://muzzarellimj.github.io/full-stack-application-development/assignment/assignment-4/index-pagination-pages.html),
and 'load more' pagination implementation 
[here](https://muzzarellimj.github.io/full-stack-application-development/assignment/assignment-4/index-pagination-load-more.html).

## Assignment Guidelines

Our task in this assignment is to add pagination to the Kenton County Animal Shelter website created in
[assignment three](https://github.com/muzzarellimj/full-stack-application-development/tree/main/assignment/assignment-3)
using JavaScript events. This task should be completed in two files:

- ``index-pagination-pages.html`` for page-based pagination; the page will initially load with ``?page=1`` in the query 
string, displaying a page with the two animals at indices 0 and 1. At the bottom of the page, we should add a number 
of buttons that will enable moving to other pages, each of which will also show two dogs. The index 'card' elements
will update based on the query string ``page`` value.

- ``index-pagination-load-more.html`` for a 'load more' style pagination system; the page will initially load with
``?page=1`` in the query string, displaying a page with the two animals at indices 0 and 1. At the bottom of the page,
we should add a 'load more' button that will load an additional two animals to the page. This can be repeated until
there are no more animals to show, at which point the button should be disabled.

## Rubric

This assignment is graded positively on the following elements:
- page-based pagination functions as expected: 3 points
- 'load more' pagination functions as expected: 3 points
- the code is well-written and formatted, including the use of functions to show content: 2 points
- the layout of the page is well-designed and organized using Bootstrap: 2 points

## Submission

Submission is as per usual; submit a ZIP file containing our work and the URL to the GitHub repository.