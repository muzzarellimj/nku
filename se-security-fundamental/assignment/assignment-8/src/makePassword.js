'use strict';

const { read, write, hash } = require('./utility');

function makePassword(rawFilename, encFilename) {
	const rawFile = read(rawFilename);
	const encFileContent = [];

	rawFile.forEach(credential => {
		let [ email, password ] = credential.split(':');

		encFileContent.push(`${email}:${hash(password)}`);
	});

	write(encFilename, encFileContent);
}

if (require.main === module) {
	makePassword('password.txt', 'password.enc.txt');
}

module.exports = { makePassword };