const { makePassword } = require('../src/makePassword');
const { read, hash } = require('../src/utility');

test('makePassword should read password.test.txt, encrypt the password, and write password.test.enc.txt', () => {
	makePassword('password.test.txt', 'password.test.enc.txt');

	expect(read('password.test.enc.txt')[0]).toMatch(`foo@bar.com:${hash('foobar')}`);
});