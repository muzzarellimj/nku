# 10 Design Patterns Explained in 10 Minutes

Video is available [here](https://fireship.io/lessons/typescript-design-patterns/). I watched this video:

- Wednesday, November 1, 2023
- Thursday, November 2, 2023
- Friday, November 3, 2023

This video discusses many of the same design patterns as [8 Design Patterns Every Programmer Should Know](./design-pattern-general.md), but through a JavaScript and Typescript lens.

## Creational -- how objects are created

### Singleton

Singleton is a great design pattern to ensure only one instance of an object exists at any given time (e.g., `Settings` below), but as JavaScript relies on object literals, this...

```javascript
class Settings {
    static instance: Settings;
    public readonly mode = 'dark';
    
    // prevent new with private constructor
    private constructor() { }
    
    static getInstance(): Settings {
        if (!Settings.instance) {
            Settings.instance = new Settings();
        }
        return Settings.instance;
    }
}

const settings = new Settings() // throws error
const settings = Settings.getInstance();
```

...is functionally similar to this...

```javascript
const settings = {
    darK: 'true'
}
```

...so the main point is - lean on language capabilities and don't overengineer solutions.

### Prototype

Prototype (e.g., "clone") allows copies of objects and classes to be made to share behavior without inheritance to prevent an inappropriate hierarchy from forming. This is functionally similar to inheritance in that JavaScript will work up the prototype chain to find attributes and functions that may exist.

```javascript
const zombie = {
    eatBrains() {
        return 'yum 🧠';
    }
}

const chad = Object.create(zombie, { name: { value: 'chad'} });

chad.__proto__;
Object.getPrototypeOf(chad);

const babyChad = Object.create(chad, { baby: { value: true } });
```

### Builder

Builder is still a valuable pattern in JavaScript but has become less popular over time as it adds complexity in knowing how to build an object by chaining functions.

```javascript
class HotDog {
    constructor(
        public bread: string,
        public ketchup?: boolean,
        public mustard?: boolean,
        public kraut?: boolean
    ) {}
    
    addKetchup() {
        this.ketchup = true;
        return this;
    }

    addMustard() {
        this.mustard = true;
        return this;
    }

    addKraut() {
        this.kraut = true;
        return this;
    }
}

const myLunch = new HotDog('gluten free')
    .addKetchup()
    .addMustard()
    .addKraut();
```

### Factory

Factory has been criticized for preventing the knowledge of attribute values in factory creation methods, but in creating cross-platform applications, this can be particularly useful:

```javascript
class IOSButton { }
class AndroidButton { }

// Without Factory
const button1 = os === 'ios' ? new IOSButton() : new AndroidButton()
const button2 = os === 'ios' ? new IOSButton() : new AndroidButton()

class ButtonFactory {
    createButton(os: string): IOSButton | AndroidButton {
        if (os === 'ios') {
            return new IOSButton();
        } else {
            return new AndroidButton();
        }
    }
}

// With Factory
const factory = new ButtonFactory();
const btn1 = factory.createButton(os);
const btn2 = factory.createButton(os);
```

## Structural -- relationships between objects

### Facade

Facade is a useful pattern to hide low-level details of subsystems, and all libraries can be considered facades for the low-level processes they perform.

```javascript
class PlumbingSystem {
    // low evel access to plubming system
    setPressure(v: number) {}
    turnOn() {}
    turnOff() {}
}

class ElectricalSystem {
    // low evel access to electrical system
    setVoltage(v: number) {}
    turnOn() {}
    turnOff() {}
}

class House {
    private plumbing = new PlumbingSystem();
    private electrical = new ElectricalSystem();

    public turnOnSystems() {
        this.electrical.setVoltage(120);
        this.electrical.turnOn();
        this.plumbing.setPressure(500);
        this.plumbing.turnOn();
    }

    public shutDown() {
        this.plumbing.turnOff();
        this.electrical.turnOff();
    }
}

const client = new House();
client.turnOnSystems();
client.shutDown();
```

### Proxy (e.g., Substitute)

Proxy allows a developer to provide a substitute or placeholder for another object to control or filter access to it; e.g., [Vue.js reactivity](https://vuejs.org/guide/extras/reactivity-in-depth.html#how-reactivity-works-in-vu).

```javascript
const original = { name: 'jeff' };

const reactive = new Proxy(original, {
    get(target, key) {
        console.log('Tracking: ', key);
        return target[key];
    },

    set(target, key, value) {
        console.log('updating UI...');
        return Reflect.set(target, key, value);
    },
});

reactive.name; // 'Tracking: name'
reactive.name = 'bob'; // 'updating UI...'
```

## Behavioral -- how objects communicate

### Iterator

Iterator is especially useful for adding functionality that should exist in JavaScript like the `range(...)` function. We can force an iterator on a function that processes data which allows the function to be used in `for-in` and `for-each` loops.

```javascript
function range(start: number, end: number, step=1) {
    return {
        [Symbol.iterator]() {
            return this;
        },
        next() {
            if (start < end) {
                start = start+step;
                return { value: start, done: false };
            }
            return { done: true, value: end }; 
        }
    }
}

for (const n of range(0, 100, 5)) {
    console.log(n);   
}
```

### Observer

Observer can be useful in observing state changes from one data source and updating consuming clients with that data. [RxJS](https://rxjs.dev/) is a prime example with `Subject` and the creation of an observable data stream.

```javascript
import { Subject } from 'rxjs';

const news = new Subject();

const tv1 = news.subscribe(v => console.log(v + 'via Den TV'));
const tv2 = news.subscribe(v => console.log(v + 'via Batcave TV'));
const tv3 = news.subscribe(v => console.log(v + 'via Airport TV'));

news.next('Breaking news: ');
news.next('The war is over ');

tv1.unsubscribe();
```

### Mediator

Mediator uses a class that sits between interacting objects and mediates communication; e.g., an ATC mediates communication between runways and planes, and a middleware function mediates communication between requests and responses to perform data manipulation, log incoming requests, etc.

```javascript
import express from 'express';
const app = express();

// Middleware logic
function mediator(req, res, next) {
    console.log('Request Type:', req.method)
    next()
}

app.use(mediator);

// Mediator runs before each route handler
app.get('/', (req, res) => {
    res.send('Hello World');
});

app.get('/about', (req, res) => {
    res.send('About');
});
```

### State

State encapsulates an object state so it can be changed and accessed independently of the object, and can be very useful for avoiding switch-statement complexity by providing a property-state interface and implementations of that interface to match possible values of that state (e.g., interface `State` and implementations `HappyState`, `SadState`, etc.).

```javascript
interface State {
    think(): string;
}

class HappyState implements State {
    think() {
        return 'I am happy 🙂';
    }
}

class SadState implements State {
    think() {
        return 'I am sad 🙁';
    }
}


class Human {
    state: State;

    constructor() {
        this.state = new HappyState();
    }

    changeState(state) {
        this.state = state;
    }

    think() {
        return this.state.think();
    }
}
```