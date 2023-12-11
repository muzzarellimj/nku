import 'dart:math';
import 'package:flutter/material.dart';

void main() {
  runApp(SinCalculationApp());
}

class SinCalculationApp extends StatelessWidget {
  final items = List<num>.generate(10, (int index) => sin(index * pi / 10));

  SinCalculationApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
        home: Scaffold(
            body: ListView.builder(
                itemCount: items.length,
                prototypeItem: ListTile(
                  title: Text(items.first.toString()),
                ),
                itemBuilder: (context, index) {
                  return ListTile(
                      title: Text(
                          style: Theme.of(context).textTheme.headline4,
                          overflow: TextOverflow.ellipsis,
                          items[index].toString()));
                })));
  }
}
