# Server-Side Programming with Express

## Getting Started with Express

Express is a web framework built atop the Node.js HTTP module. It is fast, unopinionated, and minimalist. It is 
distributed via an NPM package. It should be installed locally rather than globally. 

Express provides support for routing and serving static files. Almost all other functionality is provided by third-party 
middleware modules: processing request body via body parser; working with cookies via cookie parser; using session via 
Express sessions; and handling authentication via Passport.

A simple Express 'hello world' application can be found [here](https://github.com/muzzarellimj/full-stack-application-development/tree/main/note/server-side/hello-world).

## Working with Static Files

Static files are HTML pages that can be served directly with Express. To serve up static files, the 
`express.static(root, [options])` function is invoked with the folder path to the files served. The `root` argument
specifies the root directory from which to serve the static assets. The `[options]` argument can include values such as 
`index`, which specifies the filename of the default file (default of `index.html` to serve if no file is specified; 
and `setHeaders`, which allows a function to be set for specifying custom headers on static file requests.

A sample Express application handling static files can be found [here](https://github.com/muzzarellimj/full-stack-application-development/tree/main/note/server-side/static-file).

## Routing

Routing refers to determining how an application responds to a client request to a particular endpoint, which is a URI 
(or path) and a specific HTTP request method (GET, POST, etc.). Each route can have one or more handler functions, 
which are executed when the route is matched. Route definition utilises the following structure: 
`app.<method>(<path>, <handler>)`, where `app` is the instance of Express, `<method>` is an HTTP request method, 
`<path>` is a path on the server, and `<handler>` is the callback function executed when the route is matched. Express 
implements a function to address every HTTP verb. 

Routing can be further optimised by chaining handlers for a route path using `app.route()`. Because the path is
specified at a single location, creating modular routes is helpful in reducing redundancy and typos.

A sample Express application illustrating optimised routing can be found [here](https://github.com/muzzarellimj/full-stack-application-development/tree/main/note/server-side/routing).

### External Routing

The `express.Router` class can be used to create modular, mountable route handler. A Router instance is a complete 
middleware and routing system; for this reason, it is often referred to as a 'mini-app'.

A sample Express application illustrating external routing can be found [here](https://github.com/muzzarellimj/full-stack-application-development/tree/main/note/server-side/routing-external).

## Understanding the Request Object

The `request` object contains a number of parameters, including: query string parameters, exposed as the `query` 
property; and URL parameters, exposed as the `params` property. To access parameter values within routing, use the 
`:param` format within the route. URL parameters can be used to capture variable URL paths and treat them in the same 
way. Common uses include categories, usernames, and post titles.

## Catch-All Functions

Express contains functions that match all HTTP verbs in a catch-all approach: `app.use` and `app.all`. An important 
note: routes are processed first-in, first-out.

## Express Middleware

Express is a routing and middleware web framework that has minimal functionality in itself. An Express application is
essentially a series of middleware function calls. Middleware functions are functions that have access to the request
object, `req`, the response object, `res`, and the next middleware function in the application request-response cycle.
The next middleware function is commonly denoted by a variable named `next`.

Middleware functions can perform the following tasks: execute any code, make changes to the request and response
objects, end the request-response cycle, and call the next middleware function in the stack. If the current middleware
function does not end the request-response cycle, it must call `next()` to pass control to the next middleware
function - if it does not, the request will be left hanging.

A sample Express application illustrating various approaches to middleware can be found [here](https://github.com/muzzarellimj/full-stack-application-development/tree/main/note/server-side/middleware).

### Chaining Multiple Middleware Functions

The next function can be utilised to chain multiple middleware functions. Consider them a filter or the different
stages of a production line.

### Routing-level Middleware

Middleware functions be defined as part of a particular route. This approach can also be combined with the chaining 
approach.

### Other Middleware

Express includes the following built-in middleware: `express.static` serves static assets such as HTML files, images, 
etc.; `express.json` parses incoming requests with JSON payloads; and `express.urlencoded` parses incoming requests with 
URL-encoded payloads. Express also supports third-party middleware.

## Handling File Upload

Multer is a Node.js middleware built to handle multipart and form data and is primarily used for uploading files. Multer 
adds a `body` object and a `file` (or files) object to the `request` object. The `body` object contains the values of 
the text fields of a form, and the `file`(s) object contains the file(s) uploaded via a form.