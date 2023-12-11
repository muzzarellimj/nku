# Team Project: Tetris

## Preparation

### Milestone Schedule

| Milestone | Date | Completion |
|:----------|:-----|:-----------|
| Prepare repository and completion plan | October 27, 2023 | |
| Refactor to remove remaining code smell | November 3, 2023 | |
| Design, implement, and test next block preview | November 10, 2023 | |
| Design, implement, and test user-selected difficulties | November 17, 2023 | |
| Design, implement, and test music and sound effects | November 24, 2023 | |
| Refine and create PPT presentation | December 1, 2023 | |

## Features

### Next Block Preview

> As a user, I want to see a preview of the next block to appear so that I can prepare my next move.

This can be implemented by creating a new `Block` object, `nextBlock`, any time `currentBlock` is created (e.g., on start, on placement, etc). This can be unit tested by creating a mock instance of `Tetris` and checking `nextBlock` has been populated with a new `Block`, then calling `Block#place()`, then checking that `currentBlock` is equal to what `nextBlock` was, and `nextBlock` has been repopulated with a new object.

### User-Selected Difficulties

> As a user, I want to select my difficulty before I place a block so that I can choose the board dimensions and block speed.

This can be implemented by creating a new enumeration, `Difficulty`, with each entry consisting of three values: `boardHeight`, `boardWidth`, and `blockSpeed`. `boardHeight` and `boardWidth` should have an impact on the board size that is displayed to the user but should not impact block dimension. `blockSpeed` should impact the speed at which blocks fall and are placed. For example:

```python
class Difficulty(Enum):
    EASY = 20, 10, 10
    MEDIUM = 16, 8, 20
    HARD = 12, 6, 30
```

This can be unit tested by creating a mock instance of `Tetris` with each difficulty and checking that the actual board dimensions match the expected board dimensions and that the actual block speed matches the expected block speed, both based on `Difficulty`.

### Music and Sound Effects

> As a user, I want to hear music when the game starts and hear sound effects when an event of interest occurs.

This can be implemented by loading each sound effect into [`pygame.mixer`](https://www.pygame.org/docs/ref/mixer.html) and playing each sound when appropriate:

- on start, play a few seconds of background music
- on block placement, play a soft placement sound effect
- on line clear, play a soft explosion sound effect

This can be unit tested by creating a mock instance of `Tetris` and using [`unittest.mock`](https://docs.python.org/3/library/unittest.mock.html) to spy on the `pygame.mixer` methods called when a sound should be played, and use that spy to ensure each sound is called as expected.