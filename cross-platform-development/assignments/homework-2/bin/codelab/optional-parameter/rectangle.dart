// Output:
//
// Origin: (10, 20), width: 100, height: 200
// Origin: (10, 10), width: 0, height: 0
// Origin: (0, 0), width: 200, height: 0
// Origin: (0, 0), width: 0, height: 0

class Point {
    final int x;
    final int y;

    const Point(this.x, this.y);
}

class Rectangle {
    Point origin;
    int width;
    int height;

    Rectangle({this.origin = const Point(0, 0), this.width = 0, this.height = 0});

    @override
    String toString() => 'Origin: (${origin.x}, ${origin.y}), width: $width, height: $height';
}

main() {
  print(Rectangle(origin: const Point(10, 20), width: 100, height: 200));
  print(Rectangle(origin: const Point(10, 10)));
  print(Rectangle(width: 200));
  print(Rectangle());
}