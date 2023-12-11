import 'package:flutter/material.dart';

void main() {
  runApp(const DrawerListViewApp());
}

class DrawerListViewApp extends StatelessWidget {
  const DrawerListViewApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(home: DrawerListViewAppRoot());
  }
}

class DrawerListViewAppRoot extends StatefulWidget {
  const DrawerListViewAppRoot({super.key});

  @override
  State<DrawerListViewAppRoot> createState() => DrawerListViewAppRootState();
}

class DrawerListViewAppRootState extends State<DrawerListViewAppRoot> {
  int index = 0;

  void updateIndex(int index) {
    setState(() {
      this.index = index;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(title: const Text('Drawer with ListView')),
        drawer: Drawer(
            child: ListView(
          padding: EdgeInsets.zero,
          children: [
            const DrawerHeader(
                decoration: BoxDecoration(color: Colors.blue),
                child: Text('Drawer Header')),
            ListTile(
              leading: const Icon(Icons.people),
              title: const Text('Item 1'),
              onTap: () {
                updateIndex(0);
                Navigator.pop(context);
              },
            ),
            ListTile(
              leading: const Icon(Icons.train),
              title: const Text('Item 2'),
              onTap: () {
                updateIndex(1);
                Navigator.pop(context);
              },
            )
          ],
        )),
        body: Center(
            child: Container(
                height: 80,
                width: 260,
                color: Colors.blueGrey,
                alignment: Alignment.center,
                child: Text(
                    style: const TextStyle(color: Colors.white),
                    'Item ${index + 1}'))));
  }
}
