const { generateKeyPairSync, publicEncrypt, privateDecrypt } = require('crypto');
const { readFileSync, writeFileSync } = require('fs');

const secretMessage = 'ASE 285 students are superb!';

// generate key pair
const { privateKey, publicKey } = generateKeyPairSync('rsa', {
	modulusLength: 2048,
	publicKeyEncoding: {
		type: 'spki',
		format: 'pem'
	},
	privateKeyEncoding: {
		type: 'pkcs8',
		format: 'pem'
	}
});

// write public key to file
writeFileSync('../../asset/asymmetricPublicKey.key', publicKey);

// encryption
const encrypted = publicEncrypt(publicKey, Buffer.from(secretMessage));

// write encrypted message to file
writeFileSync('../../asset/asymmetricData.txt', encrypted);

// decryption
const data = readFileSync('../../asset/asymmetricData.txt');
const decrypted = privateDecrypt(privateKey, data);

// output
console.log('decrypted: ' + decrypted.toString('utf8'));