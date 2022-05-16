# Assignment One: Circular Doubly-Linked List

The following required classes are available for download via Canvas: MyDoublyLinkedList, MyList, MyAbstractList, 
MyAbstractSequentialList, and TestMyDoublyLinkedList.

## Assignment Guidelines

The task for this assignment is to create a public, concrete class - ``MyDoublyLinkedList`` - that extends 
``MyAbstractSequentialList`` and implements ``Cloneable``. The class must override ``clone()`` and ``equals()`` that 
are inherited from ``Object`` and all supported methods should work just like those in ``java.util.LinkedList``. The 
code should be tested with ``TestMyDoublyLinkedList``, ensuring that tests 1 through 40 execute successfully.

This class must be implemented using a circular doubly-linked list with a dummy head node. Each node should have three 
data fields: one for the element, one for the previous node, and one for the next node. Note that the first element of 
a non-empty list is ``head.next.element`` and the last element of a non-empty list is ``head.prev.element``.

The methods ``contains()``, ``indexOf()``, and ``lastIndexOf()`` should compare elements to ``e`` by checking equality 
with ``equals()``. I may need to handle a null-value as a special case because the call ``e.equals(...)`` will throw 
a ``NullPointerException`` if ``e`` is null.

I will also need to write an inner class that implements the ``ListIterator`` interface. Carefully read the Java 
documentation on ``ListIterator`` ``add()``, ``remove()``, and ``set()``, and note that the latter two need to throw 
an ``IllegalStateException`` in certain circumstances.

### Tips

**Tip 1:** it is not necessary to override ``equals()`` in ``MyDoublyLinkedList`` in order to write ``contains()``, 
``indexOf()``, or ``lastIndexOf()``. The ``equals()`` method that will be called in these methods is the one provided 
by the elements of the list, not the method provided by the list class.

**Tip 2:** it is necessary to understand how ``ListIterator`` is expected to work for implementing 
``MyAbstractSequentialList``. The following is a description of ``ListIterator`` from Java documentation. Specifically,  
it is important to understand how ``remove()`` and ``set()`` work.

- if you have invoked ``next()``, then call ``remove()``, it will delete the node that is previous of current
- if you have invoked ``previous()``, then call ``remove()``, it will delete the node that is current
- if you have invoked ``next()``, then call ``set()``, it will set the node that is previous of current
- if you have invoked ``previous()``, then call ``set()``, it will set the node that is current
- by default, you cannot call ``remove()`` or ``set()`` before invoking ``next()`` or ``previous()``
- after you have called ``add()`` or ``remove()`` once, you cannot call ``remove()`` or ``set()`` before invoking 
``next()`` or ``previous()`` again

**Tip 3:** in ``remove()`` of the iterator, you will probably switch based on value of ``iterState``, which indicates 
if a node can be deleted, cannot be deleted, and if the previous node can be deleted or not.

- if the value of ``iterState`` is ``CAN_REMOVE_PREV``, consider whether you need to update ``indexOfNext``; hint: the 
index of the next element will be changed by the deletion
- if the value of ``iterState`` is ``CAN_REMOVE_CURRENT``, consider whether you need to update ``current``; hint: you 
do not want current to point to a node that is no longer in the list

## Submission

Submission of ``MyDoublyLinkedList`` can be completed via Canvas.