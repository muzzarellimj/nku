const { read, write } = require('../src/utility');

test(`write('password.test.txt', ...) should write a file containing the string 'foo@bar.com:foobar`, () => {
	write('password.test.txt', [ 'foo@bar.com:foobar', 'bar@foo.com:foobar' ]);

	expect(read('password.test.txt')).toContain('foo@bar.com:foobar');
});