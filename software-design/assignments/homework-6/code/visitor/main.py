class Visitable(object):
    def accept(self, visitor): pass

class Visitor(object):
    def visit(self, element): pass

class CD(Visitable):
    def __init__(self, price):
        self.price = price

    def accept(self, visitor):
        visitor.visit_cd(self)

class Book(Visitable):
    def __init__(self, price):
        self.price = price

    def accept(self, visitor):
        visitor.visit_book(self)

class BookStoreVisitor(Visitor):
    def __init__(self):
        self.totalPrice = 0.0

    def visit(self, items):
        for item in items:
            item.accept(self)

    def visit_book(self, book):
        self.totalPrice += book.price

    def visit_cd(self, cd):
        self.totalPrice += cd.price

# Driver code

items = []
items.append(Book(15)); items.append(CD(20)) # 15 and 20 is the price
visitor = BookStoreVisitor()
visitor.visit(items)
print(visitor.totalPrice)

# Output:
#
# 35.0