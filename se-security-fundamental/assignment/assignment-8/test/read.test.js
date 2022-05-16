const { read } = require('../src/utility');

test(`read('password.test.txt') should return an array with an element, 'foo@bar.com:foobar'`, () => {
	const expected = 'foo@bar.com:foobar';

	expect(read('password.test.txt')).toContain(expected);
});