# 8 Design Patterns Every Programmer Should Know

Video is available [here](https://neetcode.io/courses/lessons/8-design-patterns). I watched this video:

- Wednesday, November 1, 2023
- Thursday, November 2, 2023
- Friday, November 3, 2023

In 1994, [Design Patterns: Elements of Reusable Objet-Oriented Software](https://en.wikipedia.org/wiki/Design_Patterns) was written by the "Gang of Four" - Erich Gamma, Richard Helm, Ralph Johnson, and John Vlissides - and discussed the advantages and disadvantages of object-oriented programming, as well as defining 23 software design patterns.

## Creational Patterns

### Factory

In the factory pattern, we can create a base class that accepts a set of arguments, then a factory class that instantiates the base class by predetermining the arguments that should be included.

```python
class Burger:
    def __init__(self, ingredients):
        self.ingredients = ingredients

    def print(self):
        print(self.ingredients)

class BurgerFactory:
    def createCheeseBurger(self):
        ingredients = [ 'bun', 'cheese', 'beef patty' ]
        return Burger(ingredients)

    def createVeganBurger(self):
        ingredients = [ 'bun', 'special sauce', 'vegetarian patty' ]
        return Burger(ingredients)

burgerFactory = BurgerFactory()
burgerFactory.createCheeseBurger().print()
burgerFactory.createVeganBurger().print()
```

### Builder

In the builder pattern, we can better control the arguments passed in by accepting them one a time. We can create a base class that accepts no arguments but has setters for all appropriate attributes, then a builder class that has methods to set each base class attribute and returns an instance of the class.

```python
class Burger:
    def __init__(self):
        self.buns = None
        self.patty = None
        self.cheese = None

    def setBuns(self, bunStyle):
        self.buns = bunStyle
    
    def setPatty(self, pattyStyle):
        self.patty = pattyStyle
    
    def setCheese(self, cheeseStyle):
        self.cheese = cheeseStyle

class BurgerBuilder:
    def __init__(self):
        self.burger = Burger()

    def addBuns(self, bunStyle):
        self.burger.setBuns(bunStyle)
        return self
    
    def addPatty(self, pattyStyle):
        self.burger.setPatty(pattyStyle)
        return self
    
    def addCheese(self, cheeseStyle):
        self.burger.setCheese(cheeseStyle)
        return self  

    def build(self):
        return self.burger

burger = BurgerBuilder() \
            .addBuns("sesame") \
            .addPatty("fish-patty") \
            .addCheese("swiss cheese") \
            .build()
```

### Singleton

In the singleton pattern, we can control an application state attribute that should remain consistent across the application as a single source of truth. We can create a functional class that has an `instance` attribute and a static `getX` method, where `X` is the attribute name. This attribute can be carried between components to ensure consistency throughout an application.

```python
class ApplicationState:
    instance = None

    def __init__(self):
        self.isLoggedIn = False

    @staticmethod
    def getAppState():
        if not ApplicationState.instance:  
            ApplicationState.instance = ApplicationState()
        return ApplicationState.instance

appState1 = ApplicationState.getAppState()
print(appState1.isLoggedIn) # False

appState2 = ApplicationState.getAppState()
appState1.isLoggedIn = True

print(appState1.isLoggedIn) # True
print(appState2.isLoggedIn) # True
```

## Behavioral Patterns

### Observer (and/or Pub/Sub)

In the observer pattern, we set up an observable state within a subject (e.g., "publisher") which will source the events and hook multiple observers (e.g., "subscribers") to this state, so when the state is updated, all observers are notified.

```python
class YoutubeChannel:
    def __init__(self, name):
        self.name = name
        self.subscribers = []

    def subscribe(self, sub):
        self.subscribers.append(sub)
    
    def notify(self, event):
        for sub in self.subscribers:
            sub.sendNotification(self.name, event)

from abc import ABC, abstractmethod

class YoutubeSubscriber(ABC):
    @abstractmethod
    def sendNotification(self, event):
        pass

class YoutubeUser(YoutubeSubscriber):
    def __init__(self, name):
        self.name = name
    
    def sendNotification(self, channel, event):
        print(f"User {self.name} received notification from {channel}: {event}")

channel = YoutubeChannel("neetcode")

channel.subscribe(YoutubeUser("sub1"))
channel.subscribe(YoutubeUser("sub2"))
channel.subscribe(YoutubeUser("sub3"))

channel.notify("A new video released")

# User sub1 received notification from neetcode: A new video released 
# User sub2 received notification from neetcode: A new video released 
# User sub3 received notification from neetcode: A new video released
```

### Iterator

In the iterator pattern, we can determine the iteration strategy beyond the built-in strategies provided in a programming language (e.g., Python can iterate through a list via `ListIterator`). We can create a node class which defines how it is connected to other nodes, and a data container class which defines an `__iter__` and `__next__` method to describe how a data structure should be iterated.

```python
class ListNode:
    def __init__(self, val):
        self.val = val
        self.next = None

class LinkedList:
    def __init__(self, head):
        self.head = head
        self.cur = None

    # Define Iterator
    def __iter__(self):
        self.cur = self.head
        return self

    # Iterate
    def __next__(self):
        if self.cur:
            val = self.cur.val
            self.cur = self.cur.next
            return val
        else:
            raise StopIteration

# Initialize LinkedList
head = ListNode(1)
head.next = ListNode(2)
head.next.next = ListNode(3)
myList = LinkedList(head)

# Iterate through LinkedList
for n in myList:
    print(n) 

# 1 2 3
```

### Strategy

In the strategy pattern, we can define multiple strategies as to how a process should be conducted (e.g., data manipulation) in individual classes, then accepting a strategy class as an argument in a method of the base values class.

```python
from abc import ABC, abstractmethod

class FilterStrategy(ABC):
    @abstractmethod
    def removeValue(self, val):
        pass

class RemoveNegativeStrategy(FilterStrategy):
    def removeValue(self, val):
        return val < 0 

class RemoveOddStrategy(FilterStrategy):
    def removeValue(self, val):
        return abs(val) % 2


class Values:
    def __init__(self, vals):
        self.vals = vals
    
    def filter(self, strategy):
        res = []
        for n in self.vals:
            if not strategy.removeValue(n):
                res.append(n)
        return res

values = Values([-7, -4, -1, 0, 2, 6, 9])

print(values.filter(RemoveNegativeStrategy())) # [0, 2, 6, 9]
print(values.filter(RemoveOddStrategy())) # [-4, 0, 2, 6]
```

## Structural Patterns

### Adapter

In the adapter pattern, we can allow incompatible objects to become compatible with one another via wrapper (e.g., "adapter") classes that act as a compaibility layer.

```python
class UsbCable:
    def __init__(self):
        self.isPlugged = False
    
    def plugUsb(self):
        self.isPlugged = True

class UsbPort:
    def __init__(self):
        self.portAvailable = True
    
    def plug(self, usb):
        if self.portAvailable:
            usb.plugUsb()
            self.portAvailable = False

# UsbCables can plug directly into Usb ports
usbCable = UsbCable()
usbPort1 = UsbPort()
usbPort1.plug(usbCable)

class MicroUsbCable:
    def __init__(self):
        self.isPlugged = False
    
    def plugMicroUsb(self):
        self.isPlugged = True

class MicroToUsbAdapter(UsbCable):
    def __init__(self, microUsbCable):
        self.microUsbCable = microUsbCable
        self.microUsbCable.plugMicroUsb()

    # can override UsbCable.plugUsb() if needed

# MicroUsbCables can plug into Usb ports via an adapter
microToUsbAdapter = MicroToUsbAdapter(MicroUsbCable())
usbPort2 = UsbPort()
usbPort2.plug(microToUsbAdapter)
```

### Facade

In the facade pattern, we create a service wrapper class (e.g., pleasant outward appearance) that reduces the complexities of lower-level service functionality by concealing more tedious processes behind simpler points of entry (e.g., Fetch API as opposed to manually making an HTTP request).

```python
# Python arrays are dynamic by default, but this is an example of resizing.
class Array:
    def __init__(self):
        self.capacity = 2
        self.length = 0
        self.arr = [0] * 2 # Array of capacity = 2

    # Insert n in the last position of the array
    def pushback(self, n):
        if self.length == self.capacity:
            self.resize()
            
        # insert at next empty position
        self.arr[self.length] = n
        self.length += 1

    def resize(self):
        # Create new array of double capacity
        self.capacity = 2 * self.capacity
        newArr = [0] * self.capacity 
        
        # Copy elements to newArr
        for i in range(self.length):
            newArr[i] = self.arr[i]
        self.arr = newArr
        
    # Remove the last element in the array
    def popback(self):
        if self.length > 0:
            self.length -= 1 
```