/**
 * Question 1: write three functions to find the sum of all elements in an array using three different methods...
 * 	- addAll: use a for-loop or for-of-loop to add each element and function() { ... } form.
 * 	- addAll2: use forEach(...) with function() { ... } form.
 * 	- addAll3: use forEach(...) with => form.
 */
let db = {
    data: [1, 2, 3, 4, 5],

    addAll: function() {
        let sum = 0;

        for (let i = 0; i < this.data.length; i++) {
            sum += this.data[i];
        }

        return sum;
    },

    addAll2: function() {
        let sum = 0;

        this.data.forEach(function(value) {
            sum += value;
        });

        return sum;
    },

    addAll3: function() {
        let sum = 0;

        this.data.forEach(value => sum += value);

        return sum;
    }
}

/* test addAll functions */
console.assert(db.addAll() === (1+2+3+4+5), "db.addAll() is not correct")
console.assert(db.addAll2() === (1+2+3+4+5), "db.addAll2() is not correct")
console.assert(db.addAll3() === (1+2+3+4+5), "db.addAll3() is not correct")

/**
 * Question 2: write a class with the following elements:
 * 	- The class name is 'Person' and the constructor sets name and age.
 * 	- It has a getName() function to return the name value.
 * 	- It has a setter, setAge(age), and a getter, getAge().
 */
class Person {
    constructor(name, age) {
        this.name = name;
        this.age = age;
    }

    getName() {
        return this.name;
    }

    set setAge(age) {
        this.age = parseInt(age);
    }

    get getAge() {
        return this.age;
    }
}

/* test Person class */
let john = new Person("John Doe", 25);
console.assert(john.getAge === 25, "getAge return wrong");
console.assert(john.getName() === "John Doe", "getName return wrong");
john.setAge = 26;
console.assert(john.getAge === 26, "getAge return wrong");

/**
 * Question 3. Write a function fib(n) to return the n-th number in the Fibonacci sequence.
 *
 * @param n		the n-th element to find.
 *
 * @returns {number}	the n-th element.
 */
function fib(n) {
    if (n < 0) return -1;

    let sequence = [ 0, 1 ];

    for (let i = 0; i < n; i++) {
        sequence[i + 2] = sequence[i] + sequence[i + 1];
    }

    return sequence[n];
}

/* test fib(n) */
console.assert(fib(-11) === -1, "fib(-11) should be -1")
console.assert(fib(1) === 1, "fib(1) should be 1")
console.assert(fib(6) === 8, "fib(6) should be 8");