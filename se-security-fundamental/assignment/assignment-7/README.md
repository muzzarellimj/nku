# Assignment 7: Security

## Make and Share: Encryption and Decryption

### Rewrite `createsalt.js`

The provided `createsalt.js` file uses a JSON object (`const user`) to share an email and password. Rewrite this script
to store the JSON object in a file and load the stored JSON object from a file. The local copy of this file can be found 
[here](src/result/createSalt.js).

### Rewrite `encryption.js`

The provided `encryption.js` file uses a variable (`encryptedMessage`) to encrypt and decrypt a message. Rewrite this 
script to store the variable in a file and load the stored variable from a file. The local copy of this file can be 
found [here](src/result/encryption.js), and the encryption values can be found [here](asset/encryption.json).

### Rewrite `asymmetric-encryption.js`

The provided `asymmetric-encryption.js` file uses a variable (`encryptedData`) to store a message and a variable 
`publicKey` to store the public key. Rewrite this script to store `publicKey` in a file, `publicKey.key`, and 
`encryptedData` in a text file, `data.txt`. Read the file and decrypt the information. The local copy of this file can 
be found [here](src/result/asymmetricEncryption.js), the public key [here](asset/asymmetricPublicKey.key), and the 
encrypted message [here](asset/asymmetricData.txt).

### Rewrite `signing.js`

The provided `signing.js` file contains variables `publicKey`, `signature`, and `data`. Rewrite this script to store
the public key in a file `publicKey.key`, the signature in files `signature.txt`, and the data in a file `data.txt`.
Read the files to verify that the content in `data.txt` is correctly signed. The local copy of this file can be found
[here](src/result/signing.js), the public key [here](asset/signaturePublicKey.key), 
the data [here](asset/signatureData.txt), and the signature [here](asset/signature.txt).

## PGP (or GPG) in Secure File Sharing

Install [GPG](https://gnupg.org/), encrypt and send a file to a partner or additional computer, and decrypt the file
on the additional computer.