import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:xgas/styles/custom_theme.dart' as theme;
import 'package:xgas/ui/widgets/home/home_grid.dart';

class HomeScreen extends StatefulWidget {
  @override
  _HomeScreenState createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  @override
  Widget build(BuildContext context) {
    final Orientation orientation = MediaQuery.of(context).orientation;
    AppBar appBar = AppBar(
      backgroundColor: theme.Colors.xgasPrimaryColor,
      actions: <Widget>[
        IconButton(
          icon: Icon(Icons.more_vert),
          onPressed: () {
            print('hey there');
          },
        )
      ],
      title: Text(
        'Xgas',
        style: TextStyle(fontFamily: 'Trajan-Pro', fontSize: 25),
      ),
    );
    return Scaffold(
        backgroundColor: theme.Colors.xgasPrimaryColor,
        appBar: appBar,
        body: GridView.builder(
            padding: EdgeInsets.all(5.0),
            itemCount: 6,
            itemBuilder: (BuildContext context, int index) {
              return HomeGrid(
                appBarHeight: appBar.preferredSize.height,
                onHomeGridTap: () {
                  print('am taped');
                },
              );
            },
            gridDelegate: SliverGridDelegateWithFixedCrossAxisCount(
              crossAxisCount: orientation == Orientation.portrait ? 2 : 3,
              crossAxisSpacing: 4.0,
              mainAxisSpacing: 4.0,
              childAspectRatio: orientation == Orientation.portrait ? 1.0 : 1.3,
            )));
  }
}
