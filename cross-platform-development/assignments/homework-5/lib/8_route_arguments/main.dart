import 'package:flutter/material.dart';

void main() {
  runApp(const RouteArgumentApp());
}

class Arguments {
  final String message;
  final int value;

  Arguments(this.message, this.value);
}

class RouteArgumentApp extends StatelessWidget {
  const RouteArgumentApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
        home: const RouteArgumentAppRoot(),
        onGenerateRoute: (settings) {
          final args = settings.arguments as Arguments;

          if (settings.name == PageRouteAppPage1.routeName) {
            return MaterialPageRoute(builder: (context) {
              return PageRouteAppPage1(arguments: args);
            });
          } else {
            return MaterialPageRoute(builder: (context) {
              return PageRouteAppPage2(arguments: args);
            });
          }
        });
  }
}

class RouteArgumentAppRoot extends StatefulWidget {
  const RouteArgumentAppRoot({super.key});

  @override
  State<StatefulWidget> createState() => _RouteArgumentAppRootState();
}

class _RouteArgumentAppRootState extends State<RouteArgumentAppRoot> {
  var _title = 'Hello';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(title: Text(_title)),
        body: Column(children: [
          TextButton(
              onPressed: () {
                _press(PageRouteAppPage1.routeName, Arguments('x', 10));
              },
              child: const Text('Page 1')),
          TextButton(
              onPressed: () {
                _press(PageRouteAppPage2.routeName, Arguments('y', 20));
              },
              child: const Text('Page 2'))
        ]));
  }

  _press(String routeName, Arguments arguments) async {
    var input =
        await Navigator.pushNamed(context, routeName, arguments: arguments);

    _updateTitle(input as String);
  }

  _updateTitle(String input) {
    setState(() {
      _title = input;
    });
  }
}

class PageRouteAppPage1 extends StatelessWidget {
  static const routeName = '/page1';
  final Arguments arguments;

  const PageRouteAppPage1({super.key, required this.arguments});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar:
          AppBar(title: Text('Page 1 ${arguments.message} ${arguments.value}')),
      body: IconButton(
          icon: const Icon(Icons.favorite),
          iconSize: 24.0,
          color: Colors.pink,
          onPressed: () {
            Navigator.pop(context, 'hello');
          }),
    );
  }
}

class PageRouteAppPage2 extends StatelessWidget {
  static const routeName = '/page2';
  final Arguments arguments;

  const PageRouteAppPage2({super.key, required this.arguments});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar:
          AppBar(title: Text('Page 2 ${arguments.message} ${arguments.value}')),
      body: IconButton(
          icon: const Icon(Icons.beach_access),
          iconSize: 36.0,
          color: Colors.blue,
          onPressed: () {
            Navigator.pop(context, 'goodbye');
          }),
    );
  }
}
