import 'package:test/test.dart';
import 'package:homework_3/bfs/adjacency_list.dart';
import 'package:homework_3/bfs/simple_bfs.dart';

void main() {
  test('graph', () {
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

    var bfs = SimpleBFS(graph);
    final vertices = bfs.breadthFirstSearch(d);

    expect(vertices[0].data, 'D');
    expect(vertices[1].data, 'A');
    expect(vertices[2].data, 'B');
    expect(vertices[3].data, 'C');
  });
}
