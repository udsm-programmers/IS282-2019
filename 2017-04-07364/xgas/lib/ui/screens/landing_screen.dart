import 'package:flutter/material.dart';
import 'package:scoped_model/scoped_model.dart';
import 'package:xgas/constants/constants.dart';
import 'package:xgas/scoped-model/main.dart';
import 'package:xgas/styles/custom_theme.dart' as theme;



class LandingScreen extends StatefulWidget {
  @override
  _LandingScreenState createState() => _LandingScreenState();
}

class _LandingScreenState extends State<LandingScreen> {
  static const _minHeight = 775.0;
  static const _screenPadding = 20.0;
  @override
  Widget build(BuildContext context) {
    return ScopedModelDescendant(
      builder: (BuildContext context, Widget child, MainModel model) {
        return Scaffold(
          backgroundColor: theme.Colors.xgasPrimaryColor,
          body: NotificationListener<OverscrollIndicatorNotification>(
            onNotification: (overscroll) {},
            child: SingleChildScrollView(
                child: Container(
              width: MediaQuery.of(context).size.width,
              height: MediaQuery.of(context).size.height >= _minHeight
                  ? MediaQuery.of(context).size.height
                  : _minHeight,
              child: Column(
                mainAxisSize: MainAxisSize.max,
                children: <Widget>[
                  Padding(
                    padding: EdgeInsets.only(top: 75.0),
                    child: Image(
                      image: AssetImage('assets/img/x1.png'),
                      height: 191.0,
                      width: 191.0,
                    ),
                  ),
                  Text('Automatic free delivery',
                      style: TextStyle(
                          color: Colors.red,
                          fontFamily: 'Trajan-Pro',
                          fontWeight: FontWeight.bold)),
                  SizedBox(
                    height: 100,
                  ),
                  Padding(
                    child: Row(
                      children: <Widget>[
                        Expanded(
                          flex: 1,
                          child: FlatButton(
                            padding: EdgeInsets.all(12),
                            shape: StadiumBorder(),
                            child: Text('Sign In',
                                style: TextStyle(
                                    color: Colors.red,
                                    fontWeight: FontWeight.bold)),
                            color: Colors.white,
                            onPressed: () {
                              Navigator.pushReplacementNamed(context, loginScreen);
                            },
                          ),
                        )
                      ],
                    ),
                    padding: EdgeInsets.only(
                        left: _screenPadding, right: _screenPadding),
                  ),
                  SizedBox(
                    height: 10,
                  ),
                  Padding(
                    child: Row(
                      children: <Widget>[
                        Expanded(
                          flex: 1,
                          child: FlatButton(
                            padding: EdgeInsets.all(12),
                            shape: StadiumBorder(),
                            child: Text('Sign Up',
                                style: TextStyle(
                                    color: Colors.red,
                                    fontWeight: FontWeight.bold)),
                            color: Colors.black,
                            onPressed: () {
                                  Navigator.pushReplacementNamed(context, registerScreen);
                            },
                          ),
                        )
                      ],
                    ),
                    padding: EdgeInsets.only(
                        left: _screenPadding, right: _screenPadding),
                  )
                ],
              ),
            )),
          ),
        );
      },
    );
  }
}
