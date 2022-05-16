# Assignment Three: Comparison of Sorting Algorithms

## Assignment Guidelines

The goal in this assignment is to obtain runtimes for three sorting algorithms: insertion sort, as implemented in the 
textbook; heap sort, as implemented in the textbook using `Heap`; and in-place heap sort, implemented by me, 
in-place in the array that will be sorted.

There are four files included on Canvas: `InsertionSort.java`, an implementation of the insertion sort; `Heap.java` and
`HeapSort.java`, an implementation of the heap data structure and the heap sort; and `TestSorting.java`, a driver to 
test sorting the sorting algorithms and obtain their runtimes.

The test driver, `TestSorting`, will create sorted and unsorted `int[]` objects in lengths of 100,000, 200,000, and 
400,000 elements. It will then run each of the three sorting algorithms on copies of each of the six data sets, test the
results for correctness, and display the runtimes, writing the output to both the console and a file, `Timings.txt`.

### More on the In-Place Heap Sort

The textbook provides an implementation of the heap sort, but it allocates a heap object that has the same size as the
original array. For this assignment, I am required to implement the heap sort so that it operates **in-place**. Recall 
that this implies that an algorithm should only use a small number of local variables for its workspace, and should not 
allocate any significantly large collections (do **not** allocate a `Heap`!) 

The following is a provided pseudocode example that should be implemented to work with `int[]` input.

```
heapSort(array):
    let 'n' be the length of the array
    
    // part one: turn the array into a max-heap
    for (i = 1 to n - 1)
        compare parent_of_i and 'sift up' item at index i
        
    // part two: repeatedly extract the maximum element at 0-th position from heap
    for (i = n - 1 to 1)
        // move the largest item from 0-th to the end i-th index
        swap array[0] with array[1]
        
        // note: the last indiex into the heap is now i - 1
        compare r/1 - child and 'sift down' element at index 0
```

The class should be named `InPlaceIntHeapSort` and include a public static method `heapsort(int[] input)`.

## Submission

Submit `InPlaceIntHeapSort.java` and `Timings.txt` on Canvas.