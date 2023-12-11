import 'package:flutter/material.dart';

void main() {
  runApp(const BottomNavigationBarApp());
}

final ThemeData themeData = ThemeData(primarySwatch: Colors.red);

class BottomNavigationBarApp extends StatelessWidget {
  const BottomNavigationBarApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
        theme: themeData, home: const BottomNavigationBarAppRoot());
  }
}

class BottomNavigationBarAppRoot extends StatefulWidget {
  const BottomNavigationBarAppRoot({super.key});

  @override
  State<BottomNavigationBarAppRoot> createState() =>
      _BottomNavigationBarAppRootState();
}

class _BottomNavigationBarAppRootState
    extends State<BottomNavigationBarAppRoot> {
  int index = 0;

  void updateIndex(int index) {
    setState(() {
      this.index = index;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('BottomNavigationBar')),
      body: Row(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              const Text('Michael: you have selected the index'),
              Text(style: Theme.of(context).textTheme.headline4, '${index + 1}')
            ],
          )
        ],
      ),
      bottomNavigationBar: BottomNavigationBar(
          currentIndex: index,
          onTap: (index) {
            updateIndex(index);
          },
          items: const [
            BottomNavigationBarItem(icon: Icon(Icons.home), label: 'Home'),
            BottomNavigationBarItem(icon: Icon(Icons.person), label: 'Profile'),
            BottomNavigationBarItem(
                icon: Icon(Icons.notifications), label: 'Notification')
          ]),
    );
  }
}
