# Assignment 5: HashSet with Quadratic Probing

## Assignment Guidelines

There are several provided classes in this assignment, many of which are required for testing, but `MyQuadraticHashSet`
is the primary class to be modified.

### Implementation

The `MyQuadraticHashSet` class implements the `MySet` interface. Using this class, implement the sections labeled 'TODO'
by using the open-addressing quadratic probing approach to implement the hash set functionality.

### Probing Function

Use the following quadratic function to calculate the index of each probe:

```
private static int probeIndex(int hashCode, long probeCount, int tableLength) {
    return (int) ((hashCode % tableLength - tableLength - probeCount * probeCount) % tableLength);
}
```

Call the above method with `probeCount = 1`, `probeCount = 2`, `probeCount = 3`, ... for the probe attempts.

### Class Constructor

The `MyQuadraticHashSet` class requires two parameters: (1) the load threshold and (2) an array of prime numbers that 
should be used as table sizes. Proceed to the next value in the array each time the table must be resized and rehashed.
This array is provided in the test classes. The first value in the array is 17, indicating that the table length will 
have an initial value of 17. This class will be tested with load thresholds of 0.1 and 0.5.

### Table Object

The hash table is an object array, `Object[]`. It may be required to use casts of the form `(E)` in order to ensure
compilation. Use `@SupressWarnings("unchecked")` as necessary to ensure compilation without checking for these
unchecked casts.

### Deleting Elements

Removing elements with open-addressing is slightly tricky. A naive approach is to replace removed elements with value
`null`. However, this may short-circuit later probing sequences, yielding incorrect results. Instead, the suggested 
method is to declare a data field: 

```private final static Object REMOVED = new Object();```

Each time an element is removed from the table, replace it with `REMOVED`. When searching for an element, continue 
probing if a probe yields `REMOVED`. When adding an element, replace an instance of `REMOVED`.

### Table Resizing

The table must be resized and rehashed anytime the number of elements or instances of `REMOVED` in the table exceeds
the predefined `thresholdSize`.

### iterator() Method

Consequently, an iterator does not need to be implemented in this assignment, as none of the tests use one. It should
be kept in mind, however, that since `MyQuadraticHashSet` implements `MySet<E>` implements `Iterable<E>`, an iterator
method should usually be implemented.

### Testing the Hash Set

There are a few tests run in this assignment:

- `TestHashSetsSmall` will test `MyQuadraticHashSet` on a small test case.
- `TestHashSets` will test `MyQuadraticHashSet` on larger cases, comparing results of the add, contains, and remove 
  operations to the results of performing the same operations on a `java.util.HashSet`.
- `TimeHashSets` will compare the runtime performance of `MyQuadraticHashSet` to that of `java.util.HashSet` and 
  `MyHashSet`, the course material example.

## Submission

Submit the modified and commented `MyQuadraticHashSet` class on Canvas.