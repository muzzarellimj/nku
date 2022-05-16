# Chapter 27: Hashing

## Overview

The preceding sections introduced search trees wherein an element can be found in O(log n) time in a well-balanced 
environment. This section will introduce a more efficient technique - hashing - the implementation of which with a map 
or a set to search, insert, and delete in O(1) time. This is completed by storing values in an array and using a key as 
the index to find each value. A value is passed through a *hash function*, generating a hash key, which is then stored 
in an array called a *hash table*. At the core, hashing is technique that retrieves the value using the index obtained 
from a key without performing a search.

A hash function is simply a mathematical calculation that will return a numerical value, which will work for all 
initial data types, as a memory address is used for all non-numeric initial data types.

## Collisions

A collision occurs when two or more elements hash to the same location in a table, and there are four ways to address 
such an event: linear probing, quadratic probing, and double hashing, which are all 'open addressing' approaches; and 
separate chaining, a 'closed addressing' approach.

### Linear Probing

...

### Quadratic Probing

Quadratic probing can avoid the clustering issue found in linear probing, which considers consecutive cells beginning 
at index `k`. Quadratic probing, on the other hand, increases the index by `i^2` for `i = 0, 1, 2, 3, 4...`, meaning 
the actual searched indices are `k`, `k + 1`, `k + 4`, `k + 9`, `k + 16`...

This approach could still lead to *secondary clustering*, wherein our probing sequence could become stuck in an 
infinite loop visiting only part of the table, but this will not happen so long as the table length is a prime number 
and is never more than half full.

This theorem is as such: if the length of the hash table is a prime number `p`, then the first `ceil(p / 2)` probes - 
`i = 0`, `i = 1`, ..., `i` = `ceil(p / 2) - 1` of the table will visit unique locations in the array.

As a consequence, if the hash table capacity is a prime number `p` and the number of values therein is less than 
`p / 2`, then when searching for an element, a match or an empty slot will be found in the first `ceil(p / 2)` probes.

### Double Hashing

Double hashing is similar to linear hashing, but in the case of a collision, it uses a secondary hash function on the 
key to determine the increment. This approach could also still lead to the infinite loop issue, but it will not occur 
if the table length and secondary hashing value are relatively prime, i.e., their only common divisor is 1.

### Separate Chaining

The separate chaining approach places all entries with the same hash index into the same location rather than finding a 
new location. Each location in the separate chaining approach is a called a *bucket*, which is a container that can 
hold multiple entries such as a LinkedList.

## Load Factor and Threshold

The load factor is calculated by dividing the number of items stored by the length of the table. A table threshold is a 
preset value determined during table initialisation. The load factor is calculated after each successful insert 
operation, and if the calculated load factor exceeds the threshold, the table is doubled in length and rehashed to 
redistribute all stored items. 

Thresholding and increasing table length reduces the number of collisions; the 'open addressing' approaches require 
less probing to find empty locations and the 'closed addressing' approach will have shorted lengths for each bucket. 
Results in overall improvement in performance for both approaches.