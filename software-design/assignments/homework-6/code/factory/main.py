from abc import abstractmethod

class IClass:
    @abstractmethod
    def create_object(self):
        "An abstract interface method"

class ClassA(IClass):
    def __init__(self):
        self.name = "ConcreteProductA"

    def create_object(self):
        return self
    
class ClassB(IClass):
    def __init__(self):
        self.name = "ConcreteProductB"

    def create_object(self):
        return self
    
class ClassC(IClass):
    def __init__(self):
        self.name = "ConcreteProductC"

    def create_object(self):
        return self
    
class FactoryClass:
    @staticmethod
    def create_object(type):
        if type == 'a':
            return ClassA()
        if type == 'b':
            return ClassB()
        if type == 'c':
            return ClassC()
        return None
    
# Driver code

product = FactoryClass.create_object('b')
print(product.name)

# Output:
#
# ConcreteProductB
