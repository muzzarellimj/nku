const { scryptSync, randomBytes } = require('crypto');
const { readFileSync, writeFileSync } = require('fs');

async function register(email, password) {
	const salt = randomBytes(16).toString('hex');
	const hashedPassword = scryptSync(password, salt, 64).toString('hex');
	const user = {email: `${email}`, password: `${salt}:${hashedPassword}`};

	const existing = await retrieveExistingUsers('../../asset/user.json');
	existing.push(user);

	writeFileSync('../../asset/user.json', JSON.stringify(existing), { flag: 'w' });

	return user;
}

async function authenticate(email, password) {
	const users = await retrieveExistingUsers('../../asset/user.json');
	const user = users.find(user => user.email === email);
	const [ salt, pass ] = user.password.split(':');
	const hashedBuffer = scryptSync(password, salt, 64).toString('hex');

	return hashedBuffer === pass;
}

async function retrieveExistingUsers(path) {
	const file = readFileSync(path);

	if (file !== null && file !== undefined) {
		return JSON.parse(file);
	}

	return [];
}

register('foo@bar.com', 'pa$$word').then(user => console.log('user registered: ' + JSON.stringify(user)));
authenticate('foo@bar.com', 'password').then(result => console.log('should be false: ' + result));
authenticate('foo@bar.com', 'pa$$word').then(result => console.log('should be true: ' + result));