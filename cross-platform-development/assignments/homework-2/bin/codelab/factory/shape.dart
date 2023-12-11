// Output:
//
// 12.566370614359172
// 4

import 'dart:math';

// option 1: create a top-level function
// Shape shapeFactory(String type) {
//     if (type == 'circle') return Circle(2);
//     if (type == 'square') return Square(2);
//     throw 'Can\'t create $type.';
// }

abstract class Shape {
  // option 2: create a factory constructor
  factory Shape(String type) {
    if (type == 'circle') return Circle(2);
    if (type == 'square') return Square(2);
    throw 'Can\'t create $type.';
  }

  num get area;
}

class Circle implements Shape {
  final num radius;

  Circle(this.radius);
  
  @override
  num get area => pi * pow(radius, 2);
}

class CircleMock implements Circle {
  @override
  num area = 0;
  
  @override
  num radius = 0;
}

class Square implements Shape {
  final num side;

  Square(this.side);

  @override
  num get area => pow(side, 2);
}

main() {
  // option 1: instantiate with top-level shapeFactory function
  // final circle = shapeFactory('circle');
  // final square = shapeFactory('square');

  // option 2: instantiate with factory constructor
  final circle = Shape('circle');
  final square = Shape('square');

  print(circle.area);
  print(square.area);
}
