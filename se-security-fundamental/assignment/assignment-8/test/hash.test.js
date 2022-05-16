const { createHash } = require('crypto');
const { hash } = require('../src/utility');

test(`hash('foo') should generate the same hash value as createHash(...)`, () => {
	const withCrypto = createHash('sha256').update('foo').digest('hex');

	expect(hash('foo')).toMatch(withCrypto);
});