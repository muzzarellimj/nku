# Assignment Two: Knapsack Problem

## Assignment Guidelines

The Knapsack Problem is a common exercise in dynamic programming wherein data is read that includes the name, weight, 
and value of objects that can be placed in a knapsack, and an individual must find the maximum profit achievable given 
these items. Time is not much of an issue when considering only ten items, but a new approach must be considered over 
brute-force searching when considering one thousand item: dynamic programming.

In this example, the sample data is read from one of two input files available on Canvas, KnapsackData1.txt or 
KnapsackData2.txt. Each input object - or line read, as it were - consists of three pieces of data: the project name 
(String), the amount of required labor (Integer), and the expected net profit (Integer). These are effectively an 
adaptation the name, weight, and value attributes of the original problem.

The task for this assignment is to write a program that...
1. prompts the user for the number of available labor (Integer)
2. prompts the user for the name (including extension) of the input file (String)
3. prompts the user for the name (including extension) of the output file (String)
4. reads the available projects from the input file
5. solves the corresponding problem without repetition of items and with dynamic programming
6. writes a summary of the results to the output file, including the expected profit and list of the best projects

Here is a sample session with the program, as it should receive input:

```
Enter the number of available employee work weeks: 10
Enter the name of input file: KnapsackData1.txt
Enter the name of output file: Output1.txt
Number of projects = 4
Done
```

For the above input example, here is the expected output that should be written to Output1.txt:

```
Number of projects available: 4 
Available employee work weeks: 10 
Number of projects chosen: 2 
Total profit: 46 
Project0 6 30 
Project2 4 16 
```

## Submission

Submission of class ``Knapsack`` can be completed via Canvas.