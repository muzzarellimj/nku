# Features

## Automatic level progression and difficult increases

Rather than an endless game that can never really be completed, we could design levels that are automatically progressed as score rises or time lapses, and each level becomes gradually more difficult with faster movement, blocks rendering further down the board to start, etc.

### Implementation Strategy

This feature could be implemented by creating an abstract class `Level` which sets an foundation for extending classes (e.g., `Level1`, `Level2`, etc.) along with data and methods that could be referenced in another class to increase speed or lower block rendering position.

### Testing Strategy

This feature could be tested by mocking level progression and checking either the calculated speed at which blocks are falling or the starting position that new blocks are rendered at.

## Scoreboard

As a user progresses levels and difficulties, we should create a scoreboard to note at least one high score.

### Implementation Strategy

This feature could be implemented by creating a class `Score` which houses attributes like total score, total lines cleared, top lines cleared in one move, etc. and referenced in the UI as "Top Score".

### Testing Strategy

This feature could be tested by mocking level progression and checking that the UI reads the appropriate score.

## Block Guide

Our board is small so we can easily see where a block will land before we drop it, but as our board gets bigger, this could become a painpoint for our users. We should create a visual block guide that outlines where the block will land once it is dropped. Rather than a filled block, we should use an outlined block with the outline color matching the fill color to easily distinguish between the two.

### Implementation Strategy

This feature could be implemented by creating a new class `GuideBlock` which is created in `Block#__init__()` to provide data related to the `Block` this `GuideBlock` is built to serve. With the `Tetromino` type, color, and position data, we can create and draw a new outlined block and position it at the first point before intersection and continue to update it as `Block` methods are called.

### Testing Strategy

This feature could be tested by mocking a `Block` and checking the position of the corresponding `GuideBlock`, as well as calling all block movement methods and checking `GuideBlock` is moved accordingly.