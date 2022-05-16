# Assignment 8: Encryption and Authentication

## Requirements as User Stories

As a local computer user, I want to store a password collection in a local file that can be easily transported, 
decrypted, and read without network connection, so I can access each set of account credentials without a network 
connection and without storing the file to a cloud or other third-party service.

As a cross-platform user, I want to store a password collection in an encrypted file whose format can be recognised,
decrypted, and read across multiple machines and operating systems, so I can access each set of account credentials
independent of platform and without need for conversion or installation of another application or service.

## Module Design

This application has three core components, each with unique processes: makePassword, to generate an encrypted file
from a raw text file; passwordJs, to authenticate input with the encrypted file contents; and utility, to read and 
write each file and generate password hash values. An example is as such:

1. A raw text file, `password.txt`, is manually written, containing account credentials in an `email:password` pattern.

2. `node src/makePassword` is entered in the terminal, calling `makePassword(rawFilename, encFilename)` with arguments
   `password.txt` and `password.enc.txt`, by default.

   1. `makePassword(rawFilename, encFilename)` reads the file specified by argument `rawFilename`, generates an SHA256 
      hash with `utility#hash(value)` for each password, and writes a file specified by argument `encFilename`.

   2. The encrypted text file, `password.enc.txt`, is created, containing account credentials in an `email:hash` 
      pattern.

3. `node src/passwordJs <encryptedFilename> <email> <password>` is entered in the terminal, calling `passwordJs()`.

    1. `passwordJs()` reads the file specified by `<encryptedFilename>`, searches each set of credentials for `<email>`,
       and assuming a match is found, validates the encrypted password with that specified by `<password>` by 
       calling `utility#hash(value)` with argument `<password>` to ensure a match.

    2. Assuming the hashed entered password matches the encrypted stored password, `true` is returned; if not, or if 
       appropriate arguments are not supplied or the email does not exist, `false` is returned.