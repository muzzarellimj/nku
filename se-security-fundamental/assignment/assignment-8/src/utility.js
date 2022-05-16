'use strict';

const { existsSync, readFileSync, writeFileSync } = require('fs');
const { createHash } = require('crypto');

function read(filename) {
	if (!existsSync(filename)) {
		throw `${filename} does not exist.`;
	}

	try {
		const file = readFileSync(filename, { encoding: 'utf8' });
		const content = file.split('\n');

		content.forEach((line, index) => {
			content[index] = line.replaceAll('\r', '').trim();
		});

		return content;

	} catch (error) {
		console.log(error);
	}
}

function write(filename, content) {
	try {
		writeFileSync(filename, content.join('\n', { encoding: 'utf8' }));
	} catch (error) {
		console.log(error);
	}
}

function hash(value) {
	return createHash('sha256').update(value).digest('hex');
}

module.exports = { read, write, hash };