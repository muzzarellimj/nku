// Output:
//
// Please enter [r]ock, [p]aper, or [s]cissors, or [q]uit:
// r
// You lose. You chose [r] and the computer chose [p].
// Please enter [r]ock, [p]aper, or [s]cissors, or [q]uit:
// p
// You win! You chose [p] and the computer chose [r].
// Please enter [r]ock, [p]aper, or [s]cissors, or [q]uit:
// s
// You win! You chose [s] and the computer chose [p].
// Please enter [r]ock, [p]aper, or [s]cissors, or [q]uit:
// h
// Incorrect input. Please enter [r]ock, [p]aper, or [s]cissors, or [q]uit:
// q
// Thank you for playing!

import 'dart:io';
import 'dart:math';

void main() {
  while (true) {
    print('Please enter [r]ock, [p]aper, or [s]cissors, or [q]uit: ');
    var userMove = stdin.readLineSync()!.toLowerCase();

    while (userMove != 'r' &&
        userMove != 'p' &&
        userMove != 's' &&
        userMove != 'q') {
      print(
          'Incorrect input. Please enter [r]ock, [p]aper, or [s]cissors, or [q]uit: ');
      userMove = stdin.readLineSync()!.toLowerCase();
    }

    if (userMove == 'q') {
      print('Thank you for playing!');
      break;
    }

    final random = Random().nextInt(3);
    final computerMove = ['r', 'p', 's'].elementAt(random);

    if (userMove == computerMove) {
      print('It was a tie. You and the computer both chose [$userMove].');
    } else if (userMove == 'r' && computerMove == 's') {
      print(
          'You win! You chose [$userMove] and the computer chose [$computerMove].');
    } else if (userMove == 'p' && computerMove == 'r') {
      print(
          'You win! You chose [$userMove] and the computer chose [$computerMove].');
    } else if (userMove == 's' && computerMove == 'p') {
      print(
          'You win! You chose [$userMove] and the computer chose [$computerMove].');
    } else {
      print(
          'You lose. You chose [$userMove] and the computer chose [$computerMove].');
    }
  }
}
