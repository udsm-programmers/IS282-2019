import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:scoped_model/scoped_model.dart';
import 'package:xgas/constants/constants.dart';
import 'package:xgas/scoped-model/main.dart';
import 'package:xgas/styles/custom_theme.dart' as theme;



class LoginScreen extends StatefulWidget {
  @override
  _LoginScreenState createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen>
    with SingleTickerProviderStateMixin {
  static const _minHeight = 775.0;
  static const _screenPadding = 20.0;
  final _formKey = GlobalKey<FormState>();

  final FocusNode _emailFocusNode = FocusNode();
  final FocusNode _passwordFocusNode = FocusNode();

  TextEditingController _emailController = TextEditingController();
  TextEditingController _passwordController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return ScopedModelDescendant(
      builder: (BuildContext context, Widget child, MainModel model) {
        return Scaffold(
          backgroundColor: theme.Colors.xgasPrimaryColor,
          body: SingleChildScrollView(
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
                  Text(
                    'Sign In with',
                    style: TextStyle(
                        color: Colors.red, fontWeight: FontWeight.bold),
                  ),
                  IconButton(
                    icon: Icon(
                      FontAwesomeIcons.google,
                      color: Colors.white,
                      size: 25,
                    ),
                    onPressed: () {},
                  ),
                  SizedBox(
                    height: 10,
                  ),
                  Text(
                    'OR',
                    style: TextStyle(
                        color: Colors.red, fontWeight: FontWeight.bold),
                  ),
                  SizedBox(
                    height: 10,
                  ),
                  Form(
                    key: _formKey,
                    child: Column(children: <Widget>[
                      Padding(
                        padding: EdgeInsets.only(
                            right: _screenPadding, left: _screenPadding),
                        child: Theme(
                          data: ThemeData(
                              hintColor: Colors.white,
                              textSelectionColor: Colors.white),
                          child: TextFormField(
                            controller: _emailController,
                            focusNode: _emailFocusNode,
                            keyboardType: TextInputType.emailAddress,
                            decoration: InputDecoration(
                                border: OutlineInputBorder(
                                    borderSide:
                                        BorderSide(color: Colors.white)),
                                fillColor: Colors.white,
                                icon: Icon(
                                  Icons.email,
                                  color: Colors.white,
                                ),
                                hintText: 'e.g. francis@xgas.com',
                                hintStyle: TextStyle(color: Colors.white),
                                labelText: 'Email'),
                          ),
                        ),
                      ),
                      SizedBox(height: 15),
                      Padding(
                        padding: EdgeInsets.only(
                            right: _screenPadding, left: _screenPadding),
                        child: Theme(
                          data: ThemeData(
                              hintColor: Colors.white,
                              textSelectionColor: Colors.white),
                          child: TextFormField(
                            controller: _passwordController,
                            focusNode: _passwordFocusNode,
                            keyboardType: TextInputType.text,
                            obscureText: true,
                            decoration: InputDecoration(
                                border: OutlineInputBorder(
                                    borderSide:
                                        BorderSide(color: Colors.white)),
                                fillColor: Colors.white,
                                icon: Icon(
                                  Icons.lock,
                                  color: Colors.white,
                                ),
                                hintText: 'e.g. 1234',
                                hintStyle: TextStyle(color: Colors.white),
                                labelText: 'Password'),
                          ),
                        ),
                      ),
                      FlatButton(
                        child: Text(
                          'Forgot password?',
                          style: TextStyle(color: Colors.red),
                        ),
                        onPressed: () {},
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
                                  Navigator.pushReplacementNamed(
                                      context, homeScreen);
                                },
                              ),
                            )
                          ],
                        ),
                        padding: EdgeInsets.only(
                            left: _screenPadding, right: _screenPadding),
                      ),
                      FlatButton(
                        child: Text(
                          "Don't have account? SignUp!",
                          style: TextStyle(color: Colors.white),
                        ),
                        onPressed: () {
                          Navigator.pushReplacementNamed(
                              context, registerScreen);
                        },
                      ),
                    ]),
                  )
                  // Row(
                  //   crossAxisAlignment: CrossAxisAlignment.center,
                  //   children: <Widget>[
                  //     Expanded(
                  //       flex: 1,
                  //       child: Container(
                  //         height: 10,
                  //         width: 100,
                  //         decoration: BoxDecoration(
                  //             gradient: LinearGradient(
                  //                 colors: [Colors.red],
                  //                 begin: const FractionalOffset(0.0, 0.0),
                  //                 end: const FractionalOffset(1.0, 1.0),
                  //                 stops: [0.0, 1.0],
                  //                 tileMode: TileMode.clamp)),
                  //       ),
                  //     ),
                  //     Expanded(
                  //       flex: 1,
                  //       child: Text(
                  //         'Sign Up with',
                  //         style: TextStyle(
                  //             color: Colors.red, fontWeight: FontWeight.bold),
                  //       ),
                  //     ),
                  //     Expanded(
                  //       flex: 1,
                  //       child: Container(
                  //         color: Colors.red,
                  //       ),
                  //     )
                  //   ],
                  // )
                ],
              ),
            ),
          ),
        );
      },
    );
  }
}
