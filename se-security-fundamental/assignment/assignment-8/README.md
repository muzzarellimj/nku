# Assignment 8: Conclusion of ASE 285

[Source](src) | [Test](test) | [Requirement and Design](docs/design.md)

In this assignment, we are required to design and implement applications using [Node.js](https://nodejs.dev/), 
[WebStorm](https://www.jetbrains.com/webstorm/), and [GitHub](https://github.com/muzzarellimj/se-security-fundamental/tree/main/assignment/assignment-8).
Within this process, we should: define the requirements of the application; specify modules with input, output, and 
interfaces; use WebStorm to write, test, and debug the application; and use GitHub to track changes along the way.

## Problem Definition

We are given a file, `password.txt`, with a series of email addresses and passwords. We need to make an encrypted file,
`password.enc.txt`, from the TXT file using a hash. We need to then return true or false when users provide an email 
address and password.

For example, here is a sample `password.txt` file:

```text
sm.cho@hello.com:123456
john.deacon@good.com:bestpassword
alan.may@best.com:mypassword
henry.taylor@edu.com:educatorbest
```

Our application should generate `password.enc.txt` the an `email:hash` format similar to this sample `password.enc.txt`:

```text
sm.cho@hello.com:8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92
john.deacon@good.com:c495634064a4baa0c6f7a5aed1f9f47488b421a4eca666a0b112baa720cee7f5
alan.may@best.com:89e01536ac207279409d4de1e5253e01f4a1769e696db0d6062ca9b8f56767c8
henry.taylor@edu.com:14f4cbccaee1fa7fe31820e2d57f1389823350a6fe23054b2a3d7dde4fa8531b
```

If a user provides an email and password that match the email and password hash in the encrypted file, the application
should return true. If the entered email or password are invalid or do not exist within the file, the application
should return false.

## Application

We should create two separate applications:

- `makepassword.js` should create `password.enc.txt` from `password.txt`.

- `passwordjs.js` should receive two arguments, `name` and `password`, and return true or false. It should be assumed 
  that all files are in the same directory.

To this end, we should use `references/passwordjs template.zip` or our own code structure, and can use the `utility.js`
function in the template.

### Acceptance Test

After the application is created, we should ensure it passes the acceptance test, accessed via `acceptance.bat`.

## Software Design and Diagrams

Software design documents should include a module description including input and output, and an explanation as to how
information is generated and modified; e.g., how the input file is read, transformed, and written. If necessary, 
LucidChart diagrams can be included as part of the software design process.