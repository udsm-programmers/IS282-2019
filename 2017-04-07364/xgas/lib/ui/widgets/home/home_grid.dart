import 'package:flutter/material.dart';

typedef HomeGridTapCallback = void Function();

class HomeGrid extends StatelessWidget {
  final HomeGridTapCallback onHomeGridTap;
  final double appBarHeight;

  const HomeGrid(
      {Key key, @required this.onHomeGridTap, @required this.appBarHeight})
      : super(key: key);
  @override
  Widget build(BuildContext context) {
    final Widget image = InkWell(
      onTap: () {
        onHomeGridTap();
      },
      child: Image(
        fit: BoxFit.cover,
        image: AssetImage('assets/img/camel.png'),
      ),
    );
    return GridTile(
        child: Card(child: image));
  }
}
