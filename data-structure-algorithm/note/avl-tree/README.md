# Chapter 26: AVL Trees

## Why an AVL Tree?

Search, insertion, and deletion time for a binary tree is dependent on the height of the tree, with the worst case height
being `O(n)`. A perfectly balanced tree - a complete binary tree - will maintain a height of `O(log n)`. Maintaining a
perfectly balanced tree is possible, but it is also expensive. An alternative solution is to compromise to maintain a 
well-balanced tree wherein the height of two subtrees are *almost* equal.

## What is an AVL Tree?

An AVL tree is a well-balanced binary tree designed by Russian computer scientists G. M. Adelson-Velsky and E.M. Landis
in 1962. In an AVL tree, the difference between the height of two subtrees for any node must be 0 or 1. The maximum 
height of an AVL tree is `O(log n)`.

## Maintaining Balance

Insertion and deletion in AVL trees are the same as in regular binary search trees, except that the tree must be 
rebalanced after an action to ensure that the tree remains well-balanced. This is completed by first considering the 
balance factor of a node - the height of the right subtree minus that of the left subtree. A node is *balanced* if the
balance factor is equal to -1, 0, or 1. A node is also considered *left-heavy* if the balance factor is -1 or 
*right-heavy* if the balance factor is +1.

If a node is not balanced (based on balance factor) after an insertion or deletion operation, the tree must be 
rebalanced. The process of re-balancing a node is called a *rotation*. There are four possible rotations: LL, RR, LR, 
and RL.

### LL Imbalance and Rotation

LL imbalance occurs at node A if (1) A has a balance factor of -1 and (2) left child B has a balance factor of -1 or 0.
This imbalance is fixed by a right rotation at A.

![LL imbalance and rotation demonstration](https://i.imgur.com/IwL23VF.png)

### RR Imbalance and Rotation

RR imbalance occurs at node A if (1) A has a balance factor of +2 and (2) right child B has a balance factor of +1 or 0.
This imbalance is fixed by a left rotation at A.

![RR imbalance and rotation demonstration](https://i.imgur.com/yrnrUqY.png)

### LR Imbalance and Rotation

LR imbalance occurs at node A if (1) A has a balance factor of -2 and (2) left child B has a balance factor of +1. This
imbalance is fixed by a double rotation. Assuming the right child of node B is node C, perform a left rotation at B, 
then a right rotation at A.

![LR imbalance and rotation demonstration](https://i.imgur.com/r7tmIla.png)

### RL Imbalance and Rotation

RL imbalance occurs at node A if (1) A has a balance factor of +2 and (2) right child B has a balance factor of -1. This
imbalance is fixed by a double rotation. Assuming the left child of node B is node C, perform a right rotation at B,
then a left rotation at A.

![RL imbalance and rotation demonstration](https://i.imgur.com/tHjpas2.png)