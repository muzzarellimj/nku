class Stack {
	constructor() {
		this.array = [];
		this.top = 0;
	}

	push = (item) => {
		this.array.push(item);
		this.top++;
	}

	count = () => {
		return this.top;
	}

	pop = () => {
		this.top--;

		return this.array.pop();
	}
}

module.exports = Stack;