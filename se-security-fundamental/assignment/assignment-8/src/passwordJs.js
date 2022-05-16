const { read, write, hash } = require('./utility');

function passwordJs() {
	if (process.argv.length !== 5) return false;

	const encFileContent = read(process.argv[2]);
	const email = process.argv[3];
	const password = String(process.argv[4]);

	let match;

	encFileContent.forEach((credential, index) => {
		if (credential.includes(email)) {
			match = encFileContent[index];
		}
	});

	if (match !== undefined || null) {
		return hash(password) === match.split(':')[1];
	}

	return false;
}

if (require.main === module) {
	console.log(passwordJs());
}

module.exports = { passwordJs };