import 'package:flutter/material.dart';
import '../models/shopping_list.dart';
import '../util/dbhelper.dart';

class ItemsScreen extends StatefulWidget {
  final ShoppingList shoppingList;
  ItemsScreen(this.shoppingList);
  @override
  _ItemsScreenState createState() =>
      _ItemsScreenState(shoppingList: this.shoppingList);
}

class _ItemsScreenState extends State<ItemsScreen> {
  DbHelper helper;
  final ShoppingList shoppingList;

  _ItemsScreenState({this.shoppingList});

  @override
  Widget build(BuildContext context) {
    helper = DbHelper();
    return Scaffold(
      appBar: AppBar(
        title: Text(shoppingList.name),
      ),
      body: Center(
        child: Text('Priority: ${shoppingList.priority}'),
      ),
    );
  }
}
