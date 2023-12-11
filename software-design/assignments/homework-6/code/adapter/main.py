from math import sqrt

class RoundHole:
    def __init__(self, radius):
        self._radius = radius

    def get_radius(self):
        return self._radius
    
    def fits(self, peg):
        return self._radius >= peg.get_radius()
    
class RoundPeg:
    def __init__(self, radius):
        self._radius = radius

    def get_radius(self):
        return self._radius
    
class SquarePeg:
    def __init__(self, width):
        self._width = width

    def get_width(self):
        return self._width
    
class SquarePegAdapter:
    def __init__(self, peg):
        self._peg = peg

    def get_radius(self):
        return self._peg.get_width() * sqrt(2) / 2
    
    def get_width(self):
        return self._peg.get_width()

# Driver code

round_hole = RoundHole(7.1)
square_peg = SquarePeg(10)
square_adapter = SquarePegAdapter(square_peg)
print(f"square width {square_adapter.get_width()} => {square_adapter.get_radius()}")
print(round_hole.fits(square_adapter))

# Output:
#
# square width 10 => 7.0710678118654755
# True