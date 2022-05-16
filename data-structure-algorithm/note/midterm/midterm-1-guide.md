# Midterm 1 Guide

## Chapter 22: Developing Efficient Algorithms

### Big-O Notation and Algorithmic Efficiency

Big-O notation is the standard approach for measuring runtime performance, which focuses on execution time as input 
length increases. In this notation, _n_ is the input length, and we examine three measurements: best-case (least time),
worst-case (most time), and average-case (average). The average-case and worst-case are the most useful, and worst-case
is often easier to obtain, thus it is the standard analysis provided. In calculating time complexity, the following can 
be ignored: multiplicative constants, _0.5n = n_, _5n = n_, etc.; and non-dominating terms, _n - 1 = n_, 
_n^2 + n = n^2_, etc.

### Common, Patterns, Runtimes, and the Calculation Thereof

Common runtimes include: constant time, O(1); linear time, O(n); logarithmic time, O(log-n); quadratic time, O(n^2);
and exponential time, O(2^n). Common patterns include repetition, sequence, and selection. Repetition (and their
respective runtime) include: a simple loop, T(n) = c * n = O(n); a nested loop dependent on one variable, 
T(n) = c * c * n = O(n); and a nested loop dependent on two variables, T(n) = c * n * n = O(n^2). This calculation is 
scalable to more complex nested loop repetition, sequence, and selection. 

#### More on Runtime

Constant time, represented above as _c_, is shorthand for an operation completed with no relation to the input 
length. Logarithmic time increases slowly as the input length increases, meaning each time the input length is 
doubled or squared, runtime is increased by a constant amount or doubled, respectively. Quadratic time grows
pretty fast as the input length increases, meaning if the input length is doubled, runtime is quadrupled.

### Searching

A linear search is completed in O(n) and searches linearly at each element to check equality. A binary search 
is completed in O(log n) and searches a sorted dataset by recursively checking equality of the desired value with the 
value of the central index, splitting the dataset at the central index, and ignoring the split half that does not 
include the desired value.

### Common Programming Problems

Towers of Hanoi is a mathematical problem that is solved in O(2^n) by moving disk _n_ from A to B, moving the 
first _n - 1_ disks from A to C recursively, and moving _n - 1_ disks from C to B recursively. The Euclidean algorithm 
is an efficient method of calculating GCD in O(log n) by cutting the first integer in half
every two levels of recursion. Finding prime numbers is the following time complexity per method: O(n^2) to check
divisors up to (number - 1); O(n^1.5) to check possible divisors up to Math.sqrt(number); O(n^1.5 / log n) to check
possible prime divisors up to Math.sqrt(number); or O(n log log n) upon finding a prime, cancelling multiples up to n.

### Dynamic Programming

Dynamic programming is an approach that stores the result for each sub-problem to reduce redundancy, generally 
resulting in a significant time complexity decrease. This can either be completed by storing results in a few variables,
an array, or a multidimensional array (table, as in Knapsack).

#### Application: Fibonacci

Fibonacci calculation algorithm is O(2^n) with simple-minded recursive approach, O(n) with dynamic approach:

```
public long solve(long n) {
    long f0 = 0;    // for solve(0)
    long f1 = 1;    // for solve(1)
    long f2 = 1;    // for solve(2)
    
    if (n == 0) {
        return f0;
    } else if (n == 1) {
        return f1;
    } else if (n == 2) {
        return f2;
    }
    
    for (int i = 3; i <= n; i++) {
        f0 = f1;
        f1 = f2;
        f2 = f0 + f1;
    }
    
    return f2;
}
```

#### Application: Increasing Subsequences

Increasing subsequence calculation algorithms are O(2^n) to find all increasing subsequences and longest increasing
subsequence, O(n^2) to find only longest increasing subsequence. The dynamic approach utilises array, `score` and 
`prev`, where `score[j]` represents the length of the longest increasing subsequence ending with the value of `source[j]`
and `prev[i]` represents the value of j that yielded the maximum. The value of `score[i]` is calculated with the 
relation `score[i] = 1 + max(score[j]: j < i, source[j] < source[i];)`, which can be simplified: append if current is 
greater than last element, finding the closest smaller element with the longest length; and replace if current is less 
than or equal to the last element.

#### Application: Knapsack Problem

The knapsack problem (see [assignment two](https://github.com/muzzarellimj/data-structure-algorithm/tree/main/assignment/assignment-2))
is a common dynamic programming exercise wherein there are several valuable items to put in a knapsack, but the knapsack
has a fixed weight capacity and each item has a weight and value measurement. To solve without repetition: use the 
recurrence relation `K(w, j) = max(K(w - w_j, j - 1) + v_j, K(w, j - 1))`; build a multidimensional array with 
j + 1 columns and w + 1 rows to account for base cases of `K(w, 0) = 0` and `K(0, j) = 0`, respectively; apply the 
recurrence relation in a nested loop to fill each 'cell' with the calculated value. With this approach, the worst-case
is O(nW).

```
public int solve(int labor, int count) {
    int[][] table = new int[labor + 1][count + 1];

    for (int c = 0; c <= count; c++) {
        table[0][c] = 0;
    }
    
    for (int r = 0; r <= labor; r++) {
        table[r][0] = 0;
    }
    
    for (int c = 1; c <= count; c++) {
        for (int r = 1; r <= labor; r++) {
            if (current.labor <= labor) {
                try {
                    table[r][c] = Math.max(table[r - current.labor][c - 1] + current.profit, table[r][c - 1]);
                } catch (ArrayIndexOutOfBoundsException e) {
                    table[r][c] = table[r][c - 1];
                }
            } else {
                table[r][c] = table[r][c - 1];
            }
        }
    }
    
    return table[labor + 1][count + 1]
}
```

### Common Summation Formulas

- _1_ + _2_ + _3_ + ... + _n_ = _n(n + 1) / 2_
- _a^0_ + _a^1_ + _a^2_ + ... _a^n_ = _((a^n + 1) - 1) / (a - 1)_
- _2^0_ + _2^1_ + _2^2_ + ... _2^n_ = _((2^n + 1) - 1) / (2 - 1)_ = _(2^n + 1) - 1_

### Common Recurrence Relations

| Recurrence Relation               | Result            | Example                        |
|:----------------------------------|:------------------|:-------------------------------|
| T(n) = T(n / 2) + O(1)            | T(n) = O(log n)   | Binary Search, Euclid GCD      |
| T(n) = T(n - 1) + O(1)            | T(n) = O(n)       | Linear Search                  |
| T(n) = 2T(n / 2) + O(n)           | T(n) = O(n log n) | Merge Sort                     |
| T(n) = T(n - 1) + O(n)            | T(n) = O(n ^ 2)   | Selection Sort, Insertion Sort |
| T(n) = 2T(n - 1) + O(1)           | T(n) = O(2^n)     | Tower of Hanoi                 |
| T(n) = T(n - 1) + T(n - 2) + O(1) | T(n) = O(1.618^n) | Recursive Fibonacci            |

### Common Growth Functions

| Title       | Complexity |
|:------------|:-----------|
| Constant    | O(1)       |
| Logarithmic | O(log n)   |
| Linear      | O(n)       |
| Log-linear  | O(n log n) |
| Quadratic   | O(n^2)     |
| Cubic       | O(n^3)     |
| Exponential | O(2^n)     |

![](https://www.cs.odu.edu/~toida/nerzic/content/function/growth_files/summary.gif)

## Chapter 23: Sorting

Sorting is a classic subject in computer science - they illustrate creative approaches that are flexible in solving 
other problems, they are good for practicing fundamental programming techniques, and they are exemplary of algorithm 
performance. For simplicity, this chapter assumes data are integers, sorted in ascending order, and stored in an array.
The examples to follow consider two existing datasets: an unsorted list, source; and a sorted list, result.

### Best- and Worst-Case Time and Space Complexities

| Title     | Best         | Worst        | Space                      |
|:----------|:-------------|:-------------|:---------------------------|
| Insertion | O(n)         | O(n^2)       | O(1)                       |
| Bubble    | O(n)         | O(n^2)       | O(1)                       |
| Merge     | O(n log n)   | O(n log n)   | O(n)                       |
| Quick     | O(n log n)   | O(n^2)       | O(n) naive, O(log n) Hoare |
| Heap      | O(n log n)   | O(n log n)   | O(1)                       |
| Bucket    | O(n)         | O(n^2)       | O(n + k)                   |
| Radix     | O(n * k / d) | O(n * k / d) | O(n + 2^d)                 |

### Insertion Sort

The insertion sort, O(n^2), considers both datasets: source and result. An integer is repeatedly inserted from the 
source to the result in sorted order until the source is empty and the entire dataset is sorted.

```
for (int i = 0; i < source.length; i++) {
    insert source[i] into target[0...i - 1] in sorted order by comparison
}
```

### Bubble Sort

The bubble sort, O(n^2), repeatedly compares adjacent elements and swaps their position as necessary over multiple 
passes. The maximum element of each pass will end up at the end of the list, eventually presenting as ascending sorted 
order.

```
for (int i = 0; i < source.length; i++) {
    if (source[i] > source[i + 1]) {
        swap and repeat
    }
}
```

### Merge Sort

The merge sort, O(n log n), recursively divides the source into _n_ sub-lists, each containing one element, and 
repeatedly merges the sub-lists to produce sorted sub-lists until the final two sorted sub-lists are merged forming 
the result. A tradeoff of merge sort is the additional temporary memory requirement of O(n).

```
public int[] mergeSort(int[] source) {
    firstHalf = first half of source;
    mergeSort(firstHalf); // recursive call
    secondHalf = second half of source;
    mergeSort(secondHalf); // recursive call
    
    return merge(firstHalf, secondHalf); // external function to merge two lists
}
```

### Quick Sort

The quick sort, O(n^2), selects the first element as the pivot value, the second element as the initial low value, and 
the last element as the initial high value. Low is compared with pivot and incremented one position if low is lesser; 
if greater, low is marked at that position. Similarly, high is compared with pivot and decremented one position if high
is greater; if lesser, high is marked at that position. This process is repeated until low meets high, at which point 
the last valid low is swapped with pivot, splitting the list in two. This entire process is recursively called until the
entire list is sorted.

```
quickSort(int[] source, int first, int last) {
    if (last > first) {
        int pivotIndex = partition(source, first, last);
        
        quickSort(source, first, pivotIndex - 1;
        quickSort(source, pivotIndex + 1, last);
    }
}
```

### Heap

A heap is a complete (full LTR) binary tree wherein each node is greater than or equal to existing children. This 
concept is called a max-heap, but a min-heap is identical aside from each parent node being lesser than existing 
children. A max-heap can be represented with an array as follows: for a node at position _i_, the left child is at 
position _2i + 1_, the right child is at position _2i + 2_, and the parent is at index _(i - 1) / 2_.

#### Finding Parents and Children in the Array

Theorem: if the left child of the node at index _i_ exists, then it will be at index _2i + 1_. Proof: suppose the 
element at index _i_ is the n-th element of the r-th row; then _i_ = _2^r + n - 1_. The left child will be the 
2n-th element on the (r + 1)-st row. Therefore, by the lemma, the index will be:

`2^(r + 1) + 2n - 1 = 2(2^r) + 2n - 1 = 2(2^r) + 2n - 2 + 1 = 2(2^r + n - 1) + 1 = 2i + 1`

Corollary: if the right child of the node at index _i_ exists, then it will be at index _2i + 2_. Corollary: if the 
parent of the node at index _i_ exists, then it will be at index _(i - 1) / 2_, where '/' indicates integer division 
(_floor_).

### Heap Sort

The heap sort, O(n log n), processes the source, appends each value to a heap, then reprocesses the source and sets 
each value to `heap.remove()` to rewrite the source in sorted order.

```
Heap<E> heap = new Heap<>();

for (int i = 0; i < source.length; i++) {
    heap.add(source[i]);
}

for (int i = source.length - 1; i >= 0; i--) {
    source[i] = heap.remove();
}
```

### Bucket Sort

For comparison-based sorting algorithms, it is impossible to get a worst-case runtime better than O(n log n), but if 
the source consists of small integers, the bucket sort can be used to avoid comparison. The bucket sort, O(n), builds
_n_ buckets, labeled 0, 1, ..., _n_ - 1, and puts the element at index _i_ into the bucket with label _i_. An ArrayList
can be used to implement a bucket.

### Radix Sort

The radix sort is similar to the bucket sort; for each iteration, consider the value from RTL at each digit position 
and complete a bucket sort of elements from the last iteration.

### External Sort

All the above algorithms assume the input data (source) is available at once in memory. To sort data stored in an 
external file too large to bring into memory all at once: repeatedly bring data from the file into an array; sort the 
array using an above algorithm; output the data from the array to a temporary file; merge a pair of sorted segments
into a larger sorted segment; save the new segment into a new temporary file; and repeat until there is only one sorted 
segment.

## Chapter 24: Linked Lists

### Lists

A list is a popular data structure to store data in sequential order. Common operations include retrieval, insertion,
deletion, count, membership check, and empty check. A list can be implemented in two ways: a dynamically-generated 
array wherein a new array is created each time capacity is reached; or a linked list, wherein each node is dynamically 
created and linked together.

#### Implementation via Array

An array is a fixed-size data structure - once created, the length cannot be changed - and a new array must be created
and the source data copied to it each time the source array reaches capacity.

#### Insertion and Deletion

Before insertion of a new element at a specified index, shift all elements after the index to the right and increase the
list length by 1. Before removal of an element at a specified index, shift all elements after the index to the left and 
decrease the list length by 1.

### Nodes

A linked list consists of nodes, each containing an element and a link to the next neighbor (singly-linked) or both 
the next and previous neighbors (doubly-linked). The variable `head` refers to the first node in the list, and the 
variable `tail` refers to the last node in the list. If the list is empty, both are `null`.

#### Traversal

If each node contains at least the element and `next`, the last node in the list will contain `next = null`, marking the 
end of the list.

```
Node<E> current = head;

while (current != null) {
    current = current.next;
}
```

### More on Linked Lists

A circular singly-linked list is similar to a singly-linked list, except that the pointer of the last node points back 
to the first node (like a circle). A doubly-linked list contains nodes with two pointers, `previous` and `next`, that 
point to their respective neighbor, thus allowing forward and backward traversal. A circular doubly-linked list is a
doubly-linked list, except that `next` of the last node points to the first node and `previous` of the first node points
to the last node. A circular doubly-linked list with a dummy node (see [assignment one](https://github.com/muzzarellimj/data-structure-algorithm/tree/main/assignment/assignment-1))
is a circular doubly-linked list with a dummy head node that contains no data, but only marks the start of the list.

### Stacks

A stack can be viewed as a special type of list, wherein the elements are accessed, inserted, and deleted only from the
end, called the top, of the stack in a last in, first out (LIFO) manner. This structure is best implemented with an 
array list since the insertion and deletion operations are made only at the end. Defining it as a data field within the 
appropriate class is more efficient in that the class will not inherit unnecessary and inappropriate methods.

### Queues

A queue represents a waiting list and can also be considered a special type of list, wherein the elements are inserted
into the end (tail) of the queue, and are accessed and deleted from the beginning (head) of the queue in a first in, 
first out (FIFO) manner. This structure is best implemented with a linked list since the deletion operations are made 
at the beginning of the list. Defining it as a data field within the appropriate class is more efficient in that the 
class will not inherit unnecessary and inappropriate methods.

#### Priority Queues

As described above, a regular queue is a FIFO data structure, wherein elements are appended to the end of the queue
and are removed from the beginning of the queue. In a priority queue, elements are assigned with a priority value, and
when elements are accessed, that with the highest priority is removed first. A priority queue has a largest-in, 
first-out manner (think emergency room).