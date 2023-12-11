# Homework 4: Make a Plan for Homework 8

## Business Logic

As a software engineer/designer, you know a student who wants to use a personal time-management application. This is the email from the student.

> "Hello. My name is Jack, and I want to manage my time by recording and tracking how I use my time. I can use command line tools, so the CUI interface is OK with me. I can record time using the format “DATE FROM TO TASK TAG”. For example, I can type “record today 09:30 10:30 ‘studied Java’ :STUDY” in a console to record my time usage in a database. I want flexibility in the format; I can specify the date using the 2022/09/23 form and add AM or PM to the FROM or TO. Also, I need to query my time usage from the database. I think I can use DATE, TASK, and TAG for the query. For example, I can type “query today” to get all of my activities today; “query ‘Java’ ” to get all the Java-related activities; and “query :STUDY” to get all the activities with the tag :STUDY. I want you to use Python as the programming language and SQLite for the database. I learned that Python has the SQLite as the standard package, so I think it’s no problem to use SQLite.

This business logic is nothing more than a simple request from a client without many details. We, software engineers, need to fill in all the details by making requirements.

## Requirements

We use Python and SQLite library (it is a Python library) to build the application. The first step is to develop requirements by interpreting the business logic into user stories.

For example, we can make the requirements. The first requirement is a high-level user story (Epic) and the second one is one of the broken down requirements from Epic.

- As a student, I want to record my time usage so that I can keep track of time usage.
    - As a user, I want to type “today 09:30 10:30 ‘studied Java’ :STUDY” (DATE FROM TO TASK TAG format) as an input to the application so I can make a database record and store it in the database

You can add as many requirements as possible to clearly understand what to design and implement. Also, you can add any format-related documents to your application.

## Prototype

If this is the first implementation, we must make a prototype application using Python/SQLite. Start the implementation by making questions and answering them questions. These are possible examples.

1. What is the data structure for this application, and why?
2. What is the database structure to store the information?
3. What modules and interfaces do I need to make?
4. If you are unfamiliar with SQLite, how to make a SQL database using Python?

We should keep asking and answering the questions to focus solely on building an application as simply as possible, not on architecturing the program structure.

We have Python code as the result of making a prototype.

## Design

When we finish the prototype, we understand the business logic well. If not, we need to contact the client to clarify the uncertainties. Then, we need to design an application. We refactor the prototype (if necessary, we can write from scratch again) using OOP and SOLID principles into classes or interfaces. In doing so, we design the relationships among the classes and interfaces. We draw UML class diagrams (if necessary, the object and/or sequence diagrams) as the result of the design.

## Implementation and Unit Tests

Use the requirements, design, and format documents to make code in Python. Write unit tests to check the code is working as expected.

## Redesigning, Refactoring, and Revising Tests

Jack is happy with the first version and is writing another email to you.

> "Hello. I’m happy with your application, but I need to ask for new features. I want to make a report of my time usage. For example, with the input report 2021/01/01 2022/01/01, I like to see all the activities I did from 2021/01/01 to 2022/01/01. Also, I’d like to know what activities I spend most of my time. For example, the priority command gives me the list of activities I spend most of my time on.

Based on the change request, redesign the application, refactor the code, and revise the tests. Also, we should test if the requirements are met. However, in this homework assignment, unit tests are OK.

## Documentation

We should write two types of documentation: (a) the documentation for the users and (b) the documentation for software engineers. We call (a) manual and (b) design documents. Read HW8 for specifics. Students should make also presentation PPT/PDF.

## Considerations

1. Clients generally don’t (can’t) give us detailed information, as they don’t know what they don’t know. So we should interpret and extend whatever is given whenever necessary. For example, when they require the command “query :STUDY”, we should interpret this command as “python schedule.py query :STUDY” when schedule.py is the name of the python application.
2. Instead of making multiple python applications for record, query, report, and priority, we make one application that processes these commands.
3. We also design our time usage when we develop software. In other words, we should set milestones (small deadlines) to deliver the software on timeand within budget
4. We should keep contacting clients to ensure we develop the software they want. No surprises are allowed in software engineering. However, in this homework assignment, students decide independently but should make notes to explain the rationale behind the decision.
5. Students use PyCharm for the indiviudal project.
6. Use Python’s “ArgParse” library (https://docs.python.org/3/library/argparse.html) to parse the user’s command.
7. Use the ASE 285 (Introduction to software engineering and security) files in the reference directory.

## Chores

1. Download and read homework 8.
2. Set up a project GitHub repository.
3. Check Canvas individual project page.
4. Set up a working schedule.
5. Start the project following this plan.

## Submission

There is no submission material at this point, but I should...
- create an individual project page
- create a GitHub repository