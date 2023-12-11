from enum import Enum
from abc import ABC, abstractmethod
from random import choice

class Moves(Enum):
    ROCK = "r"
    PAPER = "p"
    SCISSORS = "s"

class Player(ABC):
    @abstractmethod
    def choose_move():
        pass

    @abstractmethod
    def get_move():
        pass

class Human(Player):
    def __init__(self):
        self.move = None

    def choose_move(self):
        while True:
            human_input = input("Please choose a move: [r]ock, [p]aper, [s]cissors, or [q]uit. ")

            if human_input == "q":
                print("Thank you for playing!")
                quit()

            try:
                self.move = Moves(human_input)
                break
            except ValueError:
                print("Your selection of {input} was invalid - please try again.".format(input=human_input))

    def get_move(self):
        return self.move
    
class Computer(Player):
    def __init__(self):
        self.move = None

    def choose_move(self):
        self.move = choice(list(Moves))

    def get_move(self):
        return self.move
    
class Game:
    def __init__(self):
        self.human = Human()
        self.computer = Computer()

    def play(self):
        self.human.choose_move()
        self.computer.choose_move()

        winner = self.choose_winner()

        if winner == Player.__name__:
            print("You win! You chose {human_move} and the computer chose {computer_move}.".format(human_move=self.human.get_move().name.lower(), computer_move=self.computer.get_move().name.lower()))
        elif winner == Computer.__name__:
            print("You lose. You chose {human_move} and the computer chose {computer_move}.".format(human_move=self.human.get_move().name.lower(), computer_move=self.computer.get_move().name.lower()))
        else:
            print("It was a tie! You and the computer both chose {move}.".format(move=self.human.get_move().name.lower()))

    def choose_winner(self):
        human_move = self.human.get_move()
        computer_move = self.computer.get_move()

        if human_move == computer_move:
            return None
        
        elif human_move == Moves.ROCK and computer_move == Moves.SCISSORS:
            return Player.__name__
        
        elif human_move == Moves.PAPER and computer_move == Moves.ROCK:
            return Player.__name__
        
        elif human_move == Moves.SCISSORS and computer_move == Moves.PAPER:
            return Player.__name__
        
        else:
            return Computer.__name__
        
if __name__ == "__main__":
    game = Game()
    game.play()