import 'package:flutter/material.dart';

void main() {
  runApp(const CircleAvatarApp());
}

class CircleAvatarApp extends StatelessWidget {
  const CircleAvatarApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(home: CircleAvatarAppRoot());
  }
}

class CircleAvatarAppRoot extends StatefulWidget {
  const CircleAvatarAppRoot({super.key});

  @override
  State<CircleAvatarAppRoot> createState() => CircleAvatarAppRootState();
}

class CircleAvatarAppRootState extends State<CircleAvatarAppRoot> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(title: const Text('CircleAvatar')),
        body: Center(
            child: GestureDetector(
                onTap: () {
                  ScaffoldMessenger.of(context).showSnackBar(
                      const SnackBar(content: Text('Processing data')));
                },
                child: const CircleAvatar(
                  radius: 55.0,
                  child: Icon(Icons.person),
                ))));
  }
}
