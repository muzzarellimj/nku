class Keyboard:
    def __init__(self, size, type, color):
        self.size = size
        self.type = type
        self.color = color

    def __str__(self):
        return f"Keyboard: {self.size} keys, {self.type}, {self.color}"

class KeyboardBuilder:
    def __init__(self):
        self.keyboard = Keyboard(None, None, None)

    def set_size(self, size):
        self.keyboard.size = size
        return self
    
    def set_type(self, type):
        self.keyboard.type = type
        return self
    
    def set_color(self, color):
        self.keyboard.color = color
        return self
    
    def build(self):
        return self.keyboard
    
# Driver code

builder = KeyboardBuilder()
keyboard = builder.set_size(110).set_type("mechanical").set_color("black").build()
print(keyboard)

# Output:
#
# Keyboard: 110 keys, mechanical, black