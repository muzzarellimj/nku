class Node<T> {
  T? value;
  Node? next;

  Node({this.value, this.next});

  @override
  String toString() {
    return next == null ? '$value' : '$value -> ${next?.value}';
  }
}
