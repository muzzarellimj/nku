// Output:
//
// Enter a selection - [r]ock, [p]aper, [s]cissors, or [q]uit:
// r
// You lose. You chose rock and the computer chose paper.
// Enter a selection - [r]ock, [p]aper, [s]cissors, or [q]uit:
// p
// It was a tie. You and the computer both chose paper.
// Enter a selection - [r]ock, [p]aper, [s]cissors, or [q]uit:
// s
// It was a tie. You and the computer both chose scissors.
// Enter a selection - [r]ock, [p]aper, [s]cissors, or [q]uit:
// h
// Incorrect input. Enter a selection - [r]ock, [p]aper, [s]cissors, or [q]uit:
// q
// Thank you for playing!

import 'dart:io';
import 'dart:math';

enum Move { rock, paper, scissors }

Move translate(String input) {
  switch (input) {
    case 'r':
      return Move.rock;
    case 'p':
      return Move.paper;
    case 's':
      return Move.scissors;
    default:
      throw 'Unhandled accepted input type.';
  }
}

abstract class Player {
  Move chooseMove();
}

class Human extends Player {
  @override
  Move chooseMove() {
    print('Enter a selection - [r]ock, [p]aper, [s]cissors, or [q]uit: ');
    var input = stdin.readLineSync()!.toLowerCase();

    while (input != 'r' && input != 'p' && input != 's' && input != 'q') {
      print(
          'Incorrect input. Enter a selection - [r]ock, [p]aper, [s]cissors, or [q]uit: ');
      input = stdin.readLineSync()!.toLowerCase();
    }

    if (input == 'q') {
      print('Thank you for playing!');
      exit(0);
    }

    return translate(input);
  }
}

class Computer extends Player {
  @override
  Move chooseMove() {
    final random = Random().nextInt(3);
    final move = ['r', 'p', 's'].elementAt(random);

    return translate(move);
  }
}

main() {
  var human = Human();
  var computer = Computer();

  var humanMove = human.chooseMove();
  var computerMove = computer.chooseMove();

  if (humanMove == computerMove) {
    print('It was a tie. You and the computer both chose ${humanMove.name}.');
  } else if (humanMove == Move.rock && computerMove == Move.scissors ||
      humanMove == Move.paper && computerMove == Move.rock ||
      humanMove == Move.scissors && computerMove == Move.paper) {
    print(
        'You win! You chose ${humanMove.name} and the computer chose ${computerMove.name}.');
  } else {
    print(
        'You lose. You chose ${humanMove.name} and the computer chose ${computerMove.name}.');
  }
}
