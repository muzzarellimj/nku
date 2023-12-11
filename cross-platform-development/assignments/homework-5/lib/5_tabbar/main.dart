import 'package:flutter/material.dart';
import 'package:homework_5/5_tabbar/page1.dart';
import 'package:homework_5/5_tabbar/page2.dart';
import 'package:homework_5/5_tabbar/page3.dart';

void main() {
  runApp(const TabBarApp());
}

class TabBarApp extends StatelessWidget {
  const TabBarApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
        home: DefaultTabController(length: 3, child: TabBarAppRoot()));
  }
}

class TabBarAppRoot extends StatefulWidget {
  const TabBarAppRoot({super.key});

  @override
  State<StatefulWidget> createState() => _TabBarAppRootState();
}

class _TabBarAppRootState extends State<TabBarAppRoot> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
            bottom: const TabBar(
              tabs: [
                Tab(icon: Icon(Icons.favorite, color: Colors.pink, size: 24.0)),
                Tab(
                    icon: Icon(Icons.audiotrack,
                        color: Colors.green, size: 30.0)),
                Tab(
                    icon: Icon(Icons.beach_access,
                        color: Colors.white, size: 36.0))
              ],
            ),
            title: const Text('Tab')),
        body: TabBarView(
          children: [Page1(), Page2(), Page3()],
        ));
  }
}
