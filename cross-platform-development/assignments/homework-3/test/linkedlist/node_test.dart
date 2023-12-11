import 'package:homework_3/linkedlist/node.dart';
import 'package:test/test.dart';

void main() {
  test('constructor', () {
    final node2 = Node<int>(value: 20);
    final node1 = Node<int>(value: 10, next: node2);

    expect(node1.value, 10);
    expect(node1.next!.value, node2.value);
    expect(node2.value, 20);
  });

  test('toString', () {
    final node1 = Node<int>(value: 1);
    expect(node1.toString(), '1');

    final node2 = Node<int>(value: 2);
    node1.next = node2;
    expect(node1.toString(), '1 -> 2');
  });
}
