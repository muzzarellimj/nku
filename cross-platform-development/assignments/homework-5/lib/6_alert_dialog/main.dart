import 'package:flutter/material.dart';

void main() {
  runApp(const AlertDialogApp());
}

class AlertDialogApp extends StatelessWidget {
  const AlertDialogApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(home: AlertDialogAppRoot());
  }
}

class AlertDialogAppRoot extends StatefulWidget {
  const AlertDialogAppRoot({super.key});

  @override
  State<StatefulWidget> createState() => _AlertDialogAppRootState();
}

class _AlertDialogAppRootState extends State<AlertDialogAppRoot> {
  final TextEditingController _controller = TextEditingController();
  String input = '';
  var _title = 'Initial';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(title: Text(_title)),
        body: Center(
            child: IconButton(
          icon: const Icon(Icons.sailing),
          iconSize: 100.0,
          onPressed: () async {
            var input = await _prompt('parameterized hello');
            _updateTitle(input);
          },
        )));
  }

  _prompt(String info) {
    return showDialog(
        context: context,
        barrierDismissible: false,
        builder: (BuildContext context) {
          return AlertDialog(
            title: Text('Title + $info'),
            content: TextFormField(controller: _controller),
            actions: <Widget>[
              TextButton(
                child: const Text('OK'),
                onPressed: () {
                  Navigator.of(context).pop(_controller.text);
                },
              ),
              TextButton(
                child: const Text('Cancel'),
                onPressed: () {
                  Navigator.of(context).pop();
                },
              )
            ],
          );
        });
  }

  _updateTitle(value) {
    setState(() {
      _title = value;
    });
  }

  @override
  void dispose() {
    _controller.dispose();
    super.dispose();
  }
}
