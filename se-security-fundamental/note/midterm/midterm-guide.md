# Midterm (and Graded Quiz) Guide

## Daily Quiz

The following information can be found on daily quizzes that were completed in class up to this point:

1. Software engineering (SE) is about <ins>rules</ins> and <ins>tools</ins> to <ins>build</ins> software products in a
   <ins>team</ins>, more specifically, to <ins>deliver</ins> products <ins>on time</ins> and </ins>within budget</ins>.

2. The name of the game re: SE is managing complexity. The most important rule is keep it simple and stupid (KISS).
   The most important tool is software design. The most important *team* rule is **no** surprises.

3. In this class we use: Visual Code Studio as the software editor; Node.js (JavaScript) as the primary programming
   language, and MongoDB as the database system. We should always buy *good* prebuilt software rather than build our own.

4. Fred Brooks' law states adding more people to a late project adds further delay. Fred Brooks' No Silver Bullet (NSB)
   law states gaining a productivity boost in SE is slow, and many combined tools provide that boost. Two other important
   rules in SE: 'only fools rush in' - think and design before implementation; divide and conquer rule - divide activities
   into multiple stages to manage complexity.

5. The SE box diagram is **very** important to understand. Key activities include define (requirements), design,
   implementation (construction), and deployment. Remember the mnemonic: ET's MOME is DOC.

![](https://i.imgur.com/Wd4kwed.png)

6. Fred Brooks' observed that four components make a software product from a program: generalization, testing,
   documentation, and maintenance. virtualenv is used with Python to solve the 'library hell' problem and manage
   complexity - but we should be ready to switch if another tool does it better. The woes Fred Brooks' observed are: one
   must perform perfectly; other people set objectives; depend on each other's work; finding bugs is a hellish experience,
   especially close to a deadline. There **is** joy in SE; making useful things for society is fun, and
   we make money.

7. In this class, we use: XML, YAML, JSON, and Markdown for documentation; Git and GitHub to manage evolution and
   objects; user stores in the agile process; and UML (language) for OOP design.

8. The Gantt chart is used to track progress. Kanban is the agile framework that many software companies use to track
   progress. XML is not widely used because of the limitations in expressing data. Markdown is used as the main
   documentation tool (and file format) because it can be easily read by humans and computers.

9. Mindset is most important to effective communication. We need to be effective communicators because software
   engineering requires teamwork. We should focus more on milestones than deadlines to deliver software on time.

10. JavaScript and Node.js became popular because they help solve programming problems and manage complexity. In
    Node.js: the package manager is called 'npm'; the JavaScript engine is called 'V8'. The command to import a library is
    'require'.

11. In JavaScript, 'let' does not allow redeclaration of a variable, but 'var' does. A JavaScript method that
    references 'this' is a constructor. JavaScript is a prototype and functional programming language, **not** OOP.

## Presentation

### Introduction to Software Engineering Rules and Tools

Software engineering (SE) is about the <ins>rules</ins> and <ins>tools</ins> to <ins>build</ins> and <ins>deliver</ins>
software <ins>products</ins> in a <ins>team</ins>, <ins>on time</ins> and <ins>within budget</ins>. This is difficult
because SE is complex and the requirements, schedules, people, and environments involved change.
SE can then be interpreted as <ins>managing complexity</ins> using <ins>rules and tools</ins>.

SE is a new field and everything was invented recently: software development with programming
languages (FORTRAN) was invented in 1957 at IBM; electronic computers (first: ENIAC) were invented in 1946 at UPenn.

Fred Brooks' No Silver Bullet (NSB) law states there is no single development that promises major improvement in
productivity within a decade; the productivity boost is slow and multiple tools are required. Fred Brooks' law
(different) states adding more manpower to a late project makes it later; a new team member requires training and
extra effort from existing team.

The most important SE rule is KISS: keep it simple and stupid. Software design is about 'modules' and 'interfaces' of
software, representing modules with circles or rectangles and interfaces with arrows. The most important *team* rule is
**no** surprises; let the team know the plan, what you are doing now, and if anything changes. Two other important
rules: divide and conquer, meaning divide the problem into multiple pieces; and only fools rush in, think and design
before implementation.

The software process is a set of related activities that lead to the production of software and a model to develop and
deliver software products. A rule of the software process is to always make tests; code without tests will lead to
legacy code, or code that is no longer supported, which adds complexity.

### Software Process and Agile Process

The waterfall process model is as such: (1) define, (2) design to (3) develop software, then (4) test the software
before (5) deployment. The SE box diagram interprets this from a different perspective: there are (1)
activities in all phases and (2) activities integral to all phases to <ins>build a product</ins>. The waterfall model
focuses on activities, but the box focuses on phases that contain activities. The spiral process model incorporates
'changes' in the software process model; we iterate through the phases to adapt to the changes.

Rumsfeld's law states we don't know what we don't know, then we do know what we don't know, then we know what we know.
The Kaizen (vertical slice) rule states make it work and make it better; simplest implementation first, then make it
better over and over.

The agile process model iterates through the phases more frequently in a short amount of time, usually about two weeks,
called a sprint. The agile process model more effectively adjusts to change and delivers products (and features) more
frequently to check user response; this is called continuous integration and delivery or deployment (CI/CD). In this
course, we use Scrum, a lightweight agile framework.

A few Scrum terms: Scrum team, a team that uses Scrum; daily scrum, a meeting to check (1) what is done, (2) what are
issues, and (3) what will be done; Scrum master, a team lead that manages all Scrum aspects; stakeholder, any people who
are involved in Scrum activities; product owner, the lead user of a system with a deep understanding of it; value, what
a Scrum team tries to produce; sprint backlog, a 'to-do list' for and by developers; product backlog, a list of work for
developers derived from the roadmap; increment, the sum of all product backlog items completed during a sprint and all
previous sprints; sprint planning, a meeting to plan what should be done in this sprint; sprint retrospect, a
self-inspection by the Scrum team for the next sprint; and sprint review, a self-inspection by the Scrum team of the
sprint outcome.

Scrum requires a **Scrum master** to foster an environment where: a **product owner** orders the work for a complex
problem into a product backlog; the Scrum team turns a selection of work into an increment of **value** during a sprint;
the Scrum team and the **stakeholders** inspect the results and adjust for the next sprint; repeat.

### Software Project Tools

**Documentation**: XML, YAML, JSON, and Markdown as language and format, VCS as editor. **Teamwork**: can use any
including email, Slack, and Teams; Notion is popular for sharing information. **Evolution**: Git to trace changes and
GitHub (service) to collaborate. **Requirement**: in Agile model, 'user stores' describe requirements. **Design**: UML
to design software. **Construction**: includes compilers, debuggers, or testing libraries; we use Node.js for
server-side and HTML, CSS, and JavaScript for client-side programming.

#### Documentation Tools

Data is represented as such: numbers, both literal (1) and floating point (1.0); string ("..."); list, sequential data
[ ... ]; and dictionary, list of key-value pairs { ... }. XML (and HTML) are too verbose; YAML is simplified and less
verbose and indentation is crucial; JSON is best re: data because it is lightweight and readable; and Markdown is best
for documentation re: display and conversion

#### Team Tools

BugZilla, JIRA, and YouTrack are common bug tracking software. A Gantt chart (Adamiecki, Gantt) is a
popular way to show activities versus time; most popular implementation is Microsoft Project. Kanban (Toyota) track
people and resources using physical boards. Trello (Spolsky, SO) is a popular project management tools based on Kanban.
Asana is a popular people, time, and resource management tool that uses Gantt and Kanban. Mindset is the most important
communication tool. Notion is a great multipurpose (wiki, Kanban, database, etc.) tool.

### Module 3: Programming

### JavaScript

Web: 1.0, sent HTML as response to request; 2.0, common gateway interface (CGI) dynamically generated HTML from request.
JavaScript was invented by Brendan Eich (Netscape) to manipulate the DOM. JavaScript is prototype language mimicking
LISP and Scheme, the first functional languages. No connection with Java - just good marketing.

Function declaration: standard, function add(x, y) { return x + y; }; lambda, let add = (x, y) => { return x + y };
Scheme, ( define (add x y) (+ x y)). Function reference of 'this' indicates function is a constructor. JSON is derived
from JavaScript so structure is identical. AJAX (with jQuery) is used to communicate with a server. Lambda expression
can be used in an object - get: () => { return this }. The *apply()* function is a Lisp/Scheme function that is used
often in JavaScript as a member of another function - object.function.apply(...). The *funcall()* function in Lisp
(*call()* in JavaScript) is the same as *apply()* except that we provide arguments one by one.

Variable declaration: **var** can be redefined; **let** cannot be redefined; **const** cannot be redefined or modified.

**Prototype**: uses 'this' to copy the prototype to make an object; common convention is to name function with a
capital letter; as with OOP constructor, arguments can be passed to change variable values. ES5 brought new function,
_Object.create()_, functionally identical in creation of object to set prototype. ES6 introduced 'class' from OOP;
syntactic sugar but mimics OOP well.

**Features**: spread operator, prepend '...' to array name to extract each element (concatenation); rest parameter,
prepend '...' to parameter name to collect arguments into an array; sameness, '= =' ignores data type and '= = =' does
not; shallow copy, reference copy of the source object; deep copy, independent copy of the source object; null, a value
that can define some variables; and undefined, not a value.

### Node.js

Google built Chrome with a JavaScript engine, V8, written in C++ and designed to be standalone or embedded. Ryan Dahl
wrote a runtime environment running V8, Node.js, that executes outside browsers. The package manager, npm, manages the
complexities of too many libraries. Node.js, as with JS, is asynchronous (non-blocking) meaning multiple functions can
execute at once.