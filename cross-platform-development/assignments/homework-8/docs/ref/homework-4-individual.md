# Homework 4: Make a Plan for Homework 8

## Business Logic

As a software engineer/designer, you know a student who wants to use a personal time-management application. This is the email from the student.

> "Hello. My name is Jack, and I want to manage my time by recording and tracking how I use my time.  I am familiar with both iPhone and Android, so any mobile GUI interface is OK with me.  I can record time using a screen with DATE, FROM, TO, TASK, TAG inputs (or dialog boxes). For example, I can give `today` to the DATE input, `09:30` to FROM, `10:30` to TO, `studied Java` to TASK, and `STUDY` to TAG" in the GUI screen.  I want flexibility in the format; I can specify the date using the 2022/09/23 form and add AM or PM to the FROM or TO. Also, I need to query my time usage from the database. I think I can use DATE, TASK, and TAG for the query. For example, I can open a query screen/page/dialog box and give `today` to the input to get all the activities I did today.  Also, when I want to get all the activities related to Java, I can give "Java" to a certain input/dialog box. The same with the query with the tag; `STUDY` to get all the activities with the tag `:STUDY`. I want you to use Flutter, and I want you to use Firebase for the application development. 

This business logic is nothing more than a simple request from a client without many details. We, software engineers, need to fill in all the details by making requirements. 

## Requirements

We use Flutter/Firebase to build the application. The first step is to develop requirements by interpreting the business logic into user stories. For example, we can make the requirements. The first requirement is a high-level user story (Epic) and the second one is one of the broken down requirements from Epic. 

* As a student, I want to record my time usage so that I can keep track of time usage.
	* As a user, I want to open a dialog box with multiple TextFields so that I can get all the inputs from the user. 
	* As a user, I want to give my date information to the `date` TextField. 
	* ...

You can add as many requirements as possible to clearly understand what to design and implement. Also, you can add any format-related documents to your application. 

## Prototype

If this is the first implementation, we must make a prototype application using Flutter/Firebase. Start the implementation by asking questions and answering them questions. These are possible examples. 

1. What is the data structure for this application, and why?
2. What is the database structure to store the information?
3. What modules and interfaces do I need to make?
4. How to use Firebase in Flutter to implement the features for this project? 

We should keep asking and answering the questions to focus solely on building an application as simple as possible, not on architecturing the program structure. We have Flutter/Firebase code as the result of making a prototype. 

## Design

When we finish the prototype, we understand the business logic well. If not, we need to contact the client to clarify the uncertainties. Then, we need to design an application. We refactor the prototype (if necessary, we can write from scratch again) using OOP and SOLID principles into classes or interfaces. In doing so, we design the relationships among the classes and interfaces. We draw UML class diagrams (if necessary, the object and/or sequence diagrams) as the result of the design. 

## Implementation and Unit Tests

Make ready to use the requirements, design, and format documents to make code in Flutter for HW8. Write a skeleton of unit tests to check the code is working as expected for HW8. 

## Redesigning, Refactoring, and Rewriting Tests

Jack is happy with the first version and is writing another email to you.

> "Hello. I'm happy with your application, but I need to ask for new features. I want to make a report of my time usage. For example, with the input `report 2021/01/01 2022/01/01`, I like to see all the activities I did from 2021/01/01 to 2022/01/01. Also, I'd like to know what activities I spend most of my time. For example, the `priority` command gives me the list of activities I spend most of my time on."

Based on the change request, redesign the application, refactor the code, and revise the tests. Also, we should test if the requirements are met. However, in this homework assignment, unit tests are OK. 

## Documentation

We should write two types of documentation: (a) the documentation for the users and (b) the documentation for software engineers. We call (a) manual and (b) design documents. Read HW8 for specifics. Students should make also presentation PPT/PDF.

## Considerations

1. Clients generally don't (can't) give us detailed information, as they don't know what they don't know. So we should interpret and extend whatever is given whenever necessary. For example, when they require the command "query :STUDY", we should interpret this command as "python schedule.py query :STUDY" when schedule.py is the name of the python application. 
2. We also design our time usage when we develop software. In other words, we should set milestones (small deadlines) to deliver the software on time and within budget.
3. We should keep contacting clients to ensure we develop the software they want. No surprises are allowed in software engineering. However, in this homework assignment, students decide independently but should make notes to explain the rationale behind the decision.  
4. Students use IntelliJ or Android Studio for the individual project.
5. Use the ASE 285 (Introduction to Software Engineering and security) files in the reference directory. 

## Chores

1. Download and read Homework 8
2. Set up a project GitHub repository
3. Check the Canvas individual project page
4. Set up a milestone schedule
5. Start the project following the above plan

## Submission

There is no submission at this time but I should make sure I have an individual project page and repository set up.