import 'package:test/test.dart';
import 'package:homework_3/bfs/queue_stack.dart';

void main() {
  test('queuestack test', () {
    final queue = QueueStack<String>();

    expect(queue.isEmpty, true);

    // enqueue tests
    queue.enqueue('A');
    expect(queue.isEmpty, false);
    expect(queue.toString(), '[A]');

    queue.enqueue('B');
    expect(queue.isEmpty, false);
    expect(queue.toString(), '[A, B]');

    // dequeue tests
    var res = queue.dequeue();
    expect(res, 'A');
    expect(queue.isEmpty, false);
    expect(queue.toString(), '[B]');
    
    res = queue.dequeue();
    expect(res, 'B');
    expect(queue.isEmpty, true);
  });
}
