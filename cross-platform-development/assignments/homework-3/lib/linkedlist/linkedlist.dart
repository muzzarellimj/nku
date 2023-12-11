import 'node.dart';

class LinkedList<T> {
  Node<T>? head;
  Node<T>? tail;

  bool isEmpty() => head == null;

  void push(T value) {
    final node = Node(value: value);

    if (head == null) {
      head = node;
      tail = node;
    } else {
      node.next = head;
      head = node;
    }
  }

  void append(T value) {
    final node = Node(value: value);

    if (head == null) {
      head = node;
      tail = node;
    } else {
      tail!.next = node;
      tail = node;
    }
  }

  bool equal(LinkedList<T> other) {
    if (this.isEmpty() && other.isEmpty()) {
      return true;
    } else if (this.isEmpty() || other.isEmpty()) {
      return false;
    } else {
      var nodeA = this.head;
      var nodeB = other.head;

      while (nodeA != null && nodeB != null) {
        if (nodeA.value != nodeB.value) {
          return false;
        }

        nodeA = nodeA.next as Node<T>?;
        nodeB = nodeB.next as Node<T>?;
      }

      return nodeA == null && nodeB == null;
    }
  }

  @override
  String toString() {
    var result = StringBuffer();

    var node = head;
    while (node != null) {
      result.write(node.value);

      if (node.next != null) {
        result.write(', ');
      }

      node = node.next as Node<T>?;
    }

    return result.toString();
  }
}
