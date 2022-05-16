const Stack = require('./stack');

const stackObject = new Stack();

test('push integer 2 on stack', () => {
	stackObject.push(2);

	expect(stackObject.array).toContain(2);
});

test('count of stack should be 1', () => {
	expect(stackObject.count()).toBe(1);
});

test('pop integer 2 from stack', () => {
	stackObject.pop();

	expect(stackObject.count()).toBe(0);
});