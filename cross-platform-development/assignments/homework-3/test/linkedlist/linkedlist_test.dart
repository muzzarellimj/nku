import 'package:homework_3/linkedlist/linkedlist.dart';
import 'package:test/test.dart';

void main() {
  test('isEmpty', () {
    final list = LinkedList<int>();
    expect(list.isEmpty(), true);

    list.append(0);
    expect(list.isEmpty(), false);
  });

  test('push', () {
    final list = LinkedList<int>();
    list.push(3);
    list.push(2);
    list.push(1);

    expect(list.head?.value, 1);
    expect(list.head?.next?.value, 2);
    expect(list.tail?.value, 3);
  });

  test('append', () {
    final list = LinkedList<int>();
    list.append(1);
    list.append(2);
    list.append(3);

    expect(list.head?.value, 1);
    expect(list.head?.next?.value, 2);
    expect(list.tail?.value, 3);
  });

  test('equal', () {
    final listA = LinkedList<int>();
    listA.append(1);
    listA.append(2);
    listA.append(3);

    final listB = LinkedList<int>();
    listB.append(1);
    listB.append(2);
    listB.append(3);

    expect(listA.equal(listB), true);
  });

  test('toString', () {
    final list = LinkedList<int>();
    list.append(1);
    list.append(2);
    list.append(3);
    list.append(4);
    list.append(5);

    expect(list.toString(), '1, 2, 3, 4, 5');
  });
}
