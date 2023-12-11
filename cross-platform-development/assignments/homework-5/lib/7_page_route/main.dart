import 'package:flutter/material.dart';

void main() {
  runApp(const PageRouteApp());
}

class PageRouteApp extends StatelessWidget {
  const PageRouteApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(home: PageRouteAppRoot());
  }
}

class PageRouteAppRoot extends StatefulWidget {
  const PageRouteAppRoot({super.key});

  @override
  State<StatefulWidget> createState() => _PageRouteAppRouteState();
}

class _PageRouteAppRouteState extends State<PageRouteAppRoot> {
  var _title = 'Hello';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(title: Text(_title)),
        body: Center(
            child: TextButton(
          onPressed: () async {
            var input = await Navigator.push(
                context,
                MaterialPageRoute(
                    builder: (context) => const PageRouteSubPage()));
            _updateTitle(input);
          },
          child: const Text('Click to show other pages'),
        )));
  }

  _updateTitle(String input) {
    setState(() {
      _title = input;
    });
  }
}

class PageRouteSubPage extends StatelessWidget {
  const PageRouteSubPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(title: const Text('Page A')),
        body: Column(
          children: [
            IconButton(
                icon: const Icon(Icons.favorite),
                iconSize: 24.0,
                color: Colors.pink,
                onPressed: () {
                  Navigator.pop(context, 'hello');
                }),
            IconButton(
                icon: const Icon(Icons.beach_access),
                iconSize: 36.0,
                color: Colors.blue,
                onPressed: () {
                  Navigator.pop(context, 'goodbye');
                }),
          ],
        ));
  }
}
