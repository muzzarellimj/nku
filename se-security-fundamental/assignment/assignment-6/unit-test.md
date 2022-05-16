# Unit Testing with Jest

[Jest](https://jestjs.io/) is a JavaScript testing framework compatible with a number of JavaScript libraries and 
frameworks.

## Introduction

Jest can be installed with `npm install jest`. A source script, `sum.js`, should be authored and a function `sum(a, b)`
exported. A test script, `sum.test.js`, should be authored as such:

```js
const sum = require('./sum');

test('add 1 and 2 to equal 3', () => {
	expect(sum(1, 2)).toBe(3);
});
```

The project `package.json` should be altered to include `"test": "jest"` as a script, which can then be invoked with 
`npm run test` to print a message:

```text
PASS ./sum.test.js
✓ adds 1 + 2 to equal 3 (5ms)
```

## Documentation

### Using Matchers

A test script is written to include an _expectation_ and a _matcher_. In the above example, `expect(...)` is the 
expectation and `toBe(...)` is the matcher. `toBe(...)` is the most common matcher, as it measures exact equality,
but there are a number of other matchers, including:

- value equality with `toEqual(...)`

- truthiness with `toBeNull(...)` to match `null`, `toBeUndefined(...)` to match `undefined`, `toBeDefined(...)` to 
  match the opposite of `undefined`, `toBeTruthy(...)` to match any value an `if` statement treats as true, and 
  `toBeFalsy(...)` to match any value an `if` statement treats as false

- number comparison with `toBeGreaterThan(...)`, `toBeGreaterThanOrEqual(...)`, `toBeLessThan(...)`, and 
  `toBeLessThanOrEqual(...)`.

- strings against regular expressions with `toMatch(...)`

- array or iterable content with `toContain(...)`

- throwing of an exception with `toThrow(...)`

## Practice with Stack Class

The provided script, [stack](src/stack.js), succeeded in the following unit test:

![unit test with jest](https://i.imgur.com/UcryNe5.png)