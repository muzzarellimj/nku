from enum import Enum
import pygame
import random

SCREEN_HEIGHT = 500
SCREEN_WIDTH = 400
BOARD_POS_X = 100
BOARD_POS_Y = 60
BLOCK_SIZE = 20

class Color(Enum):
    BLUE = (100, 179, 179)
    BROWN = (80, 34, 22)
    GRAY = (128, 128, 128)
    GREEN = (113, 179, 113)
    PINK = (180, 34, 122)
    PURPLE = (120, 37, 179)
    RED = (180, 34, 22)
    WHITE = (255, 255, 255)

class GameState(Enum):
    GAME_START = 'GAME_START'
    GAME_END = 'GAME_END'

class BlockState(Enum):
    ACTIVE = 'ACTIVE'
    INACTIVE = 'INACTIVE'

class Tetromino(Enum):
    I = [ [1, 5, 9, 13], [4, 5, 6, 7] ]
    J = [ [1, 2, 5, 9], [0, 4, 5, 6], [1, 5, 9, 8], [4, 5, 6, 10] ]
    L = [ [1, 2, 6, 10], [5, 6, 7, 9], [2, 6, 10, 11], [3, 5, 6, 7] ]
    O = [ [1, 2, 5, 6] ]
    S = [ [6, 7, 9, 10], [1, 5, 6, 10] ]
    T = [ [1, 4, 5, 6], [1, 4, 5, 9], [4, 5, 6, 9], [1, 5, 6, 9] ]
    Z = [ [4, 5, 9, 10], [2, 6, 5, 9] ]

class Block:
    block_colors =  [ Color.BLUE, Color.BROWN, Color.GREEN, Color.PINK, Color.PURPLE, Color.RED ]
    block_dimension = 4
    
    def __init__(self, x, y, board):
        self.type = random.choice(list(Tetromino)).value
        self.color = random.choice(self.block_colors)
        self.rotation = 0
        self.dx = x
        self.dy = y
        self.state = BlockState.ACTIVE
        self.board = board

    def draw(self, screen):
        for height in range(self.block_dimension):
            for width in range(self.block_dimension):
                spaceKey = height * self.block_dimension + width

                if spaceKey in self.type[self.rotation]:
                    pygame.draw.rect(screen, self.color.value,
                        [BOARD_POS_X + BLOCK_SIZE * (width + self.dx) + 1, BOARD_POS_Y + BLOCK_SIZE * (height + self.dy) + 1, BLOCK_SIZE - 2, BLOCK_SIZE - 2] )
                    
    def intersects(self):
        intersection = False
        for height in range(self.block_dimension):
            for width in range(self.block_dimension):
                spaceKey = height * self.block_dimension + width

                if spaceKey in self.type[self.rotation]:
                    if height + self.dy > self.board.height - 1 or \
                        width + self.dx > self.board.width - 1 or \
                        width + self.dx < 0 or \
                        self.board.board[height + self.dy][width + self.dx] != 0:
                        intersection = True

        return intersection

    def place(self):
        for height in range(self.block_dimension):
            for width in range(self.block_dimension):
                spaceKey = height * self.block_dimension + width

                if spaceKey in self.type[self.rotation]:
                    self.board.board[height + self.dy][width + self.dx] = self.color

        self.board.check_lines()
        self.state = BlockState.INACTIVE

    def drop(self):
        while not self.intersects():
            self.dy += 1

        self.dy -= 1
        self.place()

    def rotate(self):
        prevRotation = self.rotation
        nextRotation = (self.rotation + 1) % len(self.type)

        self.rotation = nextRotation

        if self.intersects():
            self.rotation = prevRotation

    def translate_down(self, dy = 1):
        self.dy += dy

        if self.intersects():
            self.dy -= 1
            self.place()

    def translate_left(self, dx = 1):
        self.dx -= dx

        if self.intersects():
            self.dx += 1

    def translate_right(self, dx = 1):
        self.dx += dx

        if self.intersects():
            self.dx -= 1

class Board:
    def __init__(self, screen, height, width):
        self.board = [[0 for i in range(width)] for j in range(height)]
        self.screen = screen
        self.height = height
        self.width = width

    def draw(self):
        self.screen.fill(Color.WHITE.value)

        for height in range(self.height):
            for width in range(self.width):
                pygame.draw.rect(self.screen, Color.GRAY.value, [BOARD_POS_X + BLOCK_SIZE * width, BOARD_POS_Y + BLOCK_SIZE * height, BLOCK_SIZE, BLOCK_SIZE], 1)

                if self.board[height][width] != 0:
                    pygame.draw.rect(self.screen, self.board[height][width].value,
                        [BOARD_POS_X + BLOCK_SIZE * width + 1, BOARD_POS_Y + BLOCK_SIZE * height + 1, BLOCK_SIZE - 2, BLOCK_SIZE - 1])
                    
    def check_lines(self):
        for height in range(1, self.height):
            if self.is_line_full(height = height) == True:
                self.clear_line(height = height)

    def is_line_full(self, height):
        emptySpaces = 0

        for width in range(self.width):
            if self.board[height][width] == 0:
                emptySpaces += 1

        return emptySpaces == 0
    
    def clear_line(self, height):
        for height in range(height, 1, -1):
            for width in range(self.width):
                self.board[height][width] = self.board[height - 1][width]

class Tetris:
    def __init__(self):
        pygame.init()

        self.clock = pygame.time.Clock()
        self.screen = pygame.display.set_mode((SCREEN_WIDTH, SCREEN_HEIGHT))
        self.board = Board(self.screen, height = 20, width = 10)
        self.state = GameState.GAME_START

        pygame.display.set_caption('Tetris')

        fps = 25
        counter = 0
        pressing_down = False

        block = Block(x = 3, y = 0, board = self.board)

        while self.state == GameState.GAME_START:
            counter += 1
            if counter > 100000:
                counter = 0
                
            if counter % (fps // 2) == 0 or pressing_down: 
                if self.state == GameState.GAME_START:
                    block.translate_down()

            for event in pygame.event.get():
                if event.type == pygame.QUIT:
                    self.state = GameState.GAME_END

                if event.type == pygame.KEYDOWN:
                    if event.key == pygame.K_UP:
                        block.rotate()
                    if event.key == pygame.K_LEFT:
                        block.translate_left()
                    if event.key == pygame.K_RIGHT:
                        block.translate_right()
                    if event.key == pygame.K_SPACE:
                        block.drop()
                    if event.key == pygame.K_DOWN:
                        pressing_down = True

                if event.type == pygame.KEYUP and event.key == pygame.K_DOWN:
                    pressing_down = False

            self.board.draw()
            block.draw(self.screen)

            if block.state == BlockState.INACTIVE:
                block = Block(x = 3, y = 0, board = self.board)

                if block.intersects():
                    self.state = GameState.GAME_END

            pygame.display.flip()
            self.clock.tick(fps)
        
        pygame.quit()

if __name__ == "__main__":
    Tetris()