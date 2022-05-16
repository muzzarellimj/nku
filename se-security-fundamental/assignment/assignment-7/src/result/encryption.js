const { createCipheriv, createDecipheriv} = require('crypto');
const { readFileSync } = require('fs');

// read file to retrieve message and encryption info
const file = readFileSync('../../asset/encryption.json');
const { message, key, iv } = JSON.parse(file);
console.log('raw: ' + message);

// create encryption cipher
const cipher = createCipheriv('aes256', Buffer.from(key, 'hex'), Buffer.from(iv, 'hex'));

// encryption
const encryptedMessage = cipher.update(message, 'utf8', 'hex') + cipher.final('hex');
console.log('encrypted: ' + encryptedMessage);

// create decryption cipher
const decipher = createDecipheriv('aes256', Buffer.from(key, 'hex'), Buffer.from(iv, 'hex'));

// decryption
const decryptedMessage = decipher.update(encryptedMessage,'hex', 'utf8') + decipher.final('utf8');
console.log('decrypted: ' + decryptedMessage);