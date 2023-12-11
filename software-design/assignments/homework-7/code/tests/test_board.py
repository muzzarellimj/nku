import unittest

from unittest.mock import patch
from src.tetris import Board

HEIGHT = 20
WIDTH = 10

class BoardTest(unittest.TestCase):

    @patch('src.tetris.Board.is_line_full', return_value = True)
    @patch('src.tetris.Board.clear_line')
    def test_check_lines(self, _mock_is_line_full, _mock_clear_line):
        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        
        board.check_lines()

        board.is_line_full.assert_called()
        board.clear_line.assert_called()

    def test_is_line_full(self):
        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        assert board.is_line_full(10) == False

        board.board = [[1 for i in range(WIDTH)] for j in range(HEIGHT)]
        assert board.is_line_full(10) == True

    def test_clear_line(self):
        board = Board(screen = None, height = HEIGHT, width = WIDTH)
        board.board = [[1 for i in range(WIDTH)] for j in range(HEIGHT)]

        assert board.is_line_full(10) == True

        board.clear_line(10)
        assert board.is_line_full(10 == False)