# Code smells in prototype Tetris application

## Large Class

Most important and most obvious - large class. Creating this application in one class was easy, but it makes it difficult to read and even more difficult to manage, both resulting in higher complexity. The code can be refactored and the smell removed by extracting classes that deserve to be on their own - for example, color-related variables and methods could be extracted to a new class, `color.py`.

## Primitive Obsession

Primitive data types are used to store values like the game state - `"start"` or `"gameover"`. The code can be refactored and the smell removed by creating an enumeration and extracting it to an appropriate class.

## Long Method

There is at least one method - `break_lines()` - that is too long and is difficult to read as a result. The code can be refactored and the smell removed by extracting code to separate methods - and potentially a new class, if appropriate.

## Duplicate Code

The code snippet `Figures[Type][Rotation]` occurs a total of 9 times throughout the application. The code can be refactored and the smell removed by extracting this code to a variable or method - and potentially a new class, if approriate.

## Divergent Change (and Shotgun Surgery)

To double-dip on the above code snippet, `Figures[Type][Rotation]`, this code could be considered two potential code smells: (a) as is, divergent change, due to the code snippet being present in several semi-unrelated methods; and (b) if moved to other classes without being extracted to its own class, shotgun surgery, due to the code snippet being present in several semi-unrelated methods throughout several semi-unrelated classes.