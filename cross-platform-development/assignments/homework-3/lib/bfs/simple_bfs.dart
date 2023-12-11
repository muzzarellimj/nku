import 'bfs.dart';
import 'vertex.dart';
import 'queue_stack.dart';
import 'adjacency_list.dart';

class SimpleBFS<E> extends BreadthFirstSearch<E> {
  AdjacencyList<E> _adjacencyList;

  SimpleBFS(this._adjacencyList);

  @override
  List<Vertex<E>> breadthFirstSearch(Vertex<E> source) {
    final queue = QueueStack<Vertex<E>>();
    Set<Vertex<E>> unique = {};
    List<Vertex<E>> visited = [];

    queue.enqueue(source);
    unique.add(source);

    while (!queue.isEmpty) {
      Vertex<E> current = queue.dequeue() as Vertex<E>;

      visited.add(current);

      final neighboringEdges = _adjacencyList.edges(current);
      for (final edge in neighboringEdges) {
        if (!unique.contains(edge.destination)) {
          queue.enqueue(edge.destination);
          unique.add(edge.destination);
        }
      }
    }
    return visited;
  }
}