import 'package:test/test.dart';
import 'package:homework_3/bfs/edge.dart';
import 'package:homework_3/bfs/vertex.dart';

void main() {
  group('combined edge and vertex tests', () {
    late Vertex<String> v1;
    late Vertex<String> v2;
    late Vertex<String> v3;
    late Edge<String> edge1;
    late Edge<String> edge2;
    late Edge<String> edge3;

    setUp(() {
      v1 = Vertex(index:0, data:"A");
      v2 = Vertex(index:1, data:"B");
      v3 = Vertex(index:2, data:"A");
      edge1 = Edge(v1, v2);
      edge2 = Edge(v1, v3);
      edge3 = Edge(v1, v3);
    });
    
    test('vertex #toString() prints data as string', () {
      expect(v1.toString(), 'A');
      expect(v2.toString(), 'B');
    });

    test('vertex operator == compares vertex equality', () {
      expect(v1 == v2, false);
      expect(v1 == v1, true);
    });

    test('edge #toString() prints edge as string', () {
      expect(edge1.toString(), 'A -> B ');
    });

    test('edge operator == compares edge equality', () {
      expect(edge1 == edge2, false);
      expect(edge2 == edge3, true);
    });
  });
}