class Memento(object):
    def restore(self): pass

class Originator(object):
    def save(self): pass

class Caretaker(object):
    def undo(self): pass

class Snapshot(Memento):
    def __init__(self, state):
        self.state = state

    def restore(self, editor):
        editor.set_state(self.state)

class Editor(Originator):
    def __init__(self):
        self.content = ''

    def set_state(self, content):
        self.content = content

    def print_state(self):
        print(f"Current editor state is {self.content}")

    def save(self):
        return Snapshot(self.content)
    
class Command(Caretaker):
    def __init__(self, editor):
        self.snapshots = []
        self.editor = editor

    def make_backup(self, snapshot):
        self.snapshots.append(snapshot)

    def undo(self):
        self.snapshots.pop().restore(self.editor)

# Driver code

e = Editor()
e.set_state(1)
e.print_state()

s = e.save()
c = Command(e)
c.make_backup(s)

e.set_state(2)
e.print_state()

s = e.save()
c.make_backup(s)

e.set_state(3)
e.print_state()

c.undo()
e.print_state()

c.undo()
e.print_state()

# Output:
#
# Current editor state is 1
# Current editor state is 2
# Current editor state is 3
# Current editor state is 2
# Current editor state is 1