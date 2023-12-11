import 'package:test/test.dart';
import 'package:homework_3/bfs/adjacency_list.dart';

void main() {
  test('queuestack test', () {
    final graph = AdjacencyList<String>();

    final a = graph.createVertex('A');
    final b = graph.createVertex('B');
    final c = graph.createVertex('C');
    final d = graph.createVertex('D');

    graph.addEdge(a, b);
    graph.addEdge(a, c);
    graph.addEdge(a, d);
    graph.addEdge(b, c);
    graph.addEdge(b, d);

    // test edges
    expect(graph.edges(a).toString(), '[A -> B , A -> C , A -> D ]');
    expect(graph.edges(b).toString(), '[B -> A , B -> C , B -> D ]');
    expect(graph.edges(c).toString(), '[C -> A , C -> B ]');
    expect(graph.edges(d).toString(), '[D -> A , D -> B ]');

    // test vertices
    expect(graph.vertices.toString(), "(A, B, C, D)");

    // test _connections
    graph.connections.forEach((key, value) {
      if (key.toString() == "A") expect(value.toString(), '[A -> B , A -> C , A -> D ]');
      if (key.toString() == "B") expect(value.toString(), '[B -> A , B -> C , B -> D ]');
      if (key.toString() == "C") expect(value.toString(), '[C -> A , C -> B ]');
      if (key.toString() == "D") expect(value.toString(), '[D -> A , D -> B ]');
    });
  });
}
