const { generateKeyPairSync, createSign, createVerify } = require('crypto');
const { readFileSync, writeFileSync } = require('fs');

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

// read message to be signed
const data = readFileSync('../../asset/signatureData.txt', 'utf8');

// write public key to file
writeFileSync('../../asset/signaturePublicKey.key', publicKey);

// sign message
const signer = createSign('rsa-sha256');
signer.update(data);

// write signature to file
const signature = signer.sign(privateKey, 'hex');
writeFileSync('../../asset/signature.txt', signature);

// data to verify
const compromised = data + '???';
const uncompromised = data;

// verify the data
let verifier = createVerify('rsa-sha256');
verifier.update(compromised);

const isVerified1 = verifier.verify(publicKey, signature, 'hex');
console.log(isVerified1);

verifier = createVerify('rsa-sha256');
verifier.update(uncompromised);

const isVerified2 = verifier.verify(publicKey, signature, 'hex');
console.log(isVerified2);