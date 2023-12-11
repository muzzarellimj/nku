import random

if __name__ == "__main__":
    valid_moves = { "r": "rock", "p": "paper", "s": "scissors" }

    while True:
        user_input = input("Choose a move by entering r for rock, p for paper, or s for scissors, or enter q to quit: ")

        if valid_moves.get(user_input):
            user_input_code = user_input
            user_input_name = valid_moves.get(user_input_code)
            ai_input_code, ai_input_name = random.choice(list(valid_moves.items()))

            if user_input_code == ai_input_code:
                print("Tie! Both you and AI chose {input}.".format(input=user_input_name))

            elif user_input_code == "r" and ai_input_code == "s":
                print("You win! You chose {user_input} and AI chose {ai_input}.".format(user_input=user_input_name, ai_input=ai_input_name))

            elif user_input_code == "p" and ai_input_code == "r":
                print("You win! You chose {user_input} and AI chose {ai_input}.".format(user_input=user_input_name, ai_input=ai_input_name))

            elif user_input_code == "s" and ai_input_code == "p":
                print("You win! You chose {user_input} and AI chose {ai_input}.".format(user_input=user_input_name, ai_input=ai_input_name))

            else:
                print("You lose. You chose {user_input} and AI chose {ai_input}.".format(user_input=user_input_name, ai_input=ai_input_name))

        elif user_input == "q":
            print("Qutting - thank you for playing!")
            exit()

        else:
            print("You entered {input} which was invalid - please try again.".format(input=user_input))