# Design Patterns

In software engineering, a design pattern is a template to the solution of a commonly occurring problem within a given 
context of software design. Effectively, design patterns describe the best practices a software engineer should employ
when building an application. There are three categories of design patterns discussed in this course: creational, 
structural, and behavioral. A fourth category, [concurrency](https://en.wikipedia.org/wiki/Concurrency_pattern), was not
discussed but does have some interesting applications in the multi-threaded programming paradigm.

## Creational Pattern

A [creational pattern](https://en.wikipedia.org/wiki/Creational_pattern) is one that focuses on ideal object creation
mechanisms by better controlling the creation process. A commonly used pattern of this category is the 
[singleton pattern](https://en.wikipedia.org/wiki/Singleton_pattern) wherein a class is restricted to one instantiation
of itself, useful when exactly one object is required to coordinate actions across the system. This could be implemented
in the case of a database connection driver; if only one database connection should ever exist within an application,
a singleton class will only ever be instantiated once and will guarantee no additional connections will be established.

## Structural Pattern

A [structural pattern](https://en.wikipedia.org/wiki/Structural_pattern) is one that focuses on simplifying the 
recognition of relationships among entities. A commonly used pattern of this category is the 
[adapter pattern](https://en.wikipedia.org/wiki/Adapter_pattern) wherein the interface of one class is converted into
another interface that the client should expect. This could be implemented in the case of an internal API expecting
JSON interacting with an external, potentially legacy API expecting XML. The adaptee class could be defined as `JSON`,
the adapted class could be defined as `XML`, and the adapter class could be defined as `JsonToXmlAdapter`. Both `JSON` 
and `XML` should contain functions that convert to their respective data format, and `JsonToXmlAdapter` could call upon 
these functions to convert the data at run-time so each API receives the data format it expects.

## Behavioral Pattern

A [behavioral pattern](https://en.wikipedia.org/wiki/Behavioral_pattern) is one that identifies common communication 
patterns among objects in an effort to increase flexibility in carrying out communication. A commonly used pattern of 
this category is the [interpreter pattern](https://en.wikipedia.org/wiki/Interpreter_pattern) wherein instructions are
provided for evaluating (or interpreting) sentences in a particular language. This could be implemented in the case
of an application that evaluates mathematical expressions written in 
[Reverse Polish notation](https://en.wikipedia.org/wiki/Reverse_Polish_notation). A class or function could be written 
to evaluate each mathematical operation alongside a client which would read a string of data, parse the data as values
written in RPN, and perform the calculations as expected.