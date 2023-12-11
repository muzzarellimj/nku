import 'vertex.dart';

class Edge<T> {
  const Edge(
    this.source,
    this.destination, [
    this.weight,
  ]);

  final Vertex<T> source;
  final Vertex<T> destination;
  final double? weight;

  @override
  String toString() =>
      "${this.source} -> ${this.destination} ${weight != null ? (weight) : ""}";
  @override
  bool operator ==(Object other) {
    return this.source == (other as Edge).source &&
        this.destination == (other as Edge).destination;
  }
}

enum EdgeType { directed, undirected }
