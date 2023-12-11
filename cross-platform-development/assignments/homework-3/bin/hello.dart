// Output:
//
// true
// 1, 2, 3, 4, 5
// false

import 'package:homework_3/linkedlist/linkedlist.dart';

main() {
  final list = LinkedList<int>();
  print(list.isEmpty()); // should return true
  list.push(3);
  list.push(2);
  list.push(1);
  list.append(4);
  list.append(5);
  print(list);
  // Your code should print
  // 1 -> 2 -> 3 -> 4 -> 5
  print(list.isEmpty()); // should print false
}
