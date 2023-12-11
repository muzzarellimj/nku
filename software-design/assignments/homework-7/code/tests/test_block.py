import unittest

from src.tetris import Block, BlockState, Board, Tetromino
from unittest.mock import patch

HEIGHT = 20
WIDTH = 10
DEFAULT_X = 0
DEFAULT_Y = 0

class BlockTest(unittest.TestCase):

    def test_intersects_without_intersection(self) -> None:
        """Test #intersects on a block that should not be intersecting another block."""

        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        block = Block(x = DEFAULT_X, y = DEFAULT_Y, board = board)

        assert block.intersects() == False

    def test_intersects_with_intersection(self) -> None:
        """Test #intersects on a block that should be intersecting another block."""

        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        board.board = [[1 for i in range(WIDTH)] for j in range(HEIGHT)]
        block = Block(x = DEFAULT_X, y = DEFAULT_Y, board = board)

        assert block.intersects() == True

    @patch('src.tetris.Board.check_lines')
    def test_place(self, _mock_check_lines) -> None:
        """Test #place on a block that has been permanently placed on the board."""

        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        block = Block(x = DEFAULT_X, y = DEFAULT_Y, board = board)

        assert block.state == BlockState.ACTIVE
        block.place()
        block.board.check_lines.assert_called()
        assert block.state == BlockState.INACTIVE
    
    def test_drop(self) -> None:
        """Test #drop on a block that has been dropped on the board."""

        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        block = Block(x = DEFAULT_X, y = DEFAULT_Y, board = board)

        assert block.state == BlockState.ACTIVE
        block.drop()
        assert block.dy >= 15 & block.dy <= 20
        assert block.state == BlockState.INACTIVE

    def test_rotate(self) -> None:
        """Test #rotate on a block capable of rotation."""

        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        block = Block(x = DEFAULT_X, y = DEFAULT_Y, board = board)

        # check block is not 'O' and thus cannot be rotated
        while block.type == Tetromino.O.value:
            block = Block(x = DEFAULT_X, y = DEFAULT_Y, board = board)

        rotation = block.rotation
        block.rotate()
        assert block.rotation != rotation
    
    def test_translate_down_without_intersection(self) -> None:
        """Test #translate_down on a block that can be translated without intersecting."""

        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        block = Block(x = DEFAULT_X, y = DEFAULT_Y, board = board)

        dy = block.dy
        block.translate_down()
        assert block.dy == dy + 1

    def test_translate_down_with_intersection(self) -> None:
        """Test #translate_down on a block that can be translated but also intersects."""

        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        block = Block(x = DEFAULT_X, y = DEFAULT_Y, board = board)

        dy = block.dy
        block.translate_down()

        while dy < block.dy:
            dy = block.dy
            block.translate_down()

        assert block.state == BlockState.INACTIVE

    def test_translate_left_without_intersection(self) -> None:
        """Test #translate_left on a block that can be translated without intersecting."""

        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        block = Block(x = DEFAULT_X, y = DEFAULT_Y, board = board)

        dx = block.dx
        block.translate_left()
        assert block.dx == dx - 1

    def test_translate_left_with_intersection(self) -> None:
        """Test #translate_left on a block that can be translated but also intersects."""

        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        block = Block(x = DEFAULT_X, y = DEFAULT_Y, board = board)

        dx = block.dx
        block.translate_left()

        while dx > block.dx:
            dx = block.dx
            block.translate_left()

        assert block.dx == dx

    def test_translate_right_without_intersection(self) -> None:
        """Test #translate_right on a block that can be translated without intersecting."""

        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        block = Block(x = DEFAULT_X, y = DEFAULT_Y, board = board)

        dx = block.dx
        block.translate_right()
        assert block.dx == dx + 1

    def test_translate_right_with_intersection(self) -> None:
        """Test #translate_right on a block that can be translated but also intersects."""

        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        block = Block(x = DEFAULT_X, y = DEFAULT_Y, board = board)

        dx = block.dx
        block.translate_right()

        while dx < block.dx:
            dx = block.dx
            block.translate_right()

        assert block.dx == dx