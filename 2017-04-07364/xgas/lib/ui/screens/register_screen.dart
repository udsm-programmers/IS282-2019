import 'package:flutter/material.dart';
import 'package:scoped_model/scoped_model.dart';
import 'package:xgas/constants/constants.dart';
import 'package:xgas/scoped-model/main.dart';
import 'package:xgas/styles/custom_theme.dart' as theme;


class RegisterScreen extends StatefulWidget {
  @override
  _RegisterScreenState createState() => _RegisterScreenState();
}

class _RegisterScreenState extends State<RegisterScreen>
    with SingleTickerProviderStateMixin {
  static const _minHeight = 775.0;
  static const _screenPadding = 20.0;
  final _formKey = GlobalKey<FormState>();

  final FocusNode _nameFocusNode = FocusNode();
  final FocusNode _phoneFocusNode = FocusNode();
  final FocusNode _passwordFocusNode = FocusNode();
  final FocusNode _confirmPasswordFocusNode = FocusNode();

  TextEditingController _nameController = TextEditingController();
  TextEditingController _phoneController = TextEditingController();
  TextEditingController _passwordController = TextEditingController();
  TextEditingController _confirmPasswordController = TextEditingController();

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
                    Padding(
                      padding: EdgeInsets.only(top: 75.0),
                      child: Text(
                        'Sign up',
                        style: TextStyle(
                            color: Colors.red, fontWeight: FontWeight.bold),
                      ),
                    ),
                    SizedBox(height: 15),
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
                              controller: _nameController,
                              focusNode: _nameFocusNode,
                              keyboardType: TextInputType.text,
                              decoration: InputDecoration(
                                  border: OutlineInputBorder(
                                      borderSide:
                                          BorderSide(color: Colors.white)),
                                  fillColor: Colors.white,
                                  hintText: 'Developer',
                                  hintStyle: TextStyle(color: Colors.white),
                                  labelText: 'Name'),
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
                              controller: _phoneController,
                              focusNode: _phoneFocusNode,
                              keyboardType: TextInputType.number,
                              decoration: InputDecoration(
                                  border: OutlineInputBorder(
                                      borderSide:
                                          BorderSide(color: Colors.white)),
                                  fillColor: Colors.white,
                                  hintText: '+255 717 811 016',
                                  hintStyle: TextStyle(color: Colors.white),
                                  labelText: 'Phone'),
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
                              decoration: InputDecoration(
                                  border: OutlineInputBorder(
                                      borderSide:
                                          BorderSide(color: Colors.white)),
                                  fillColor: Colors.white,
                                  hintText: '1234',
                                  hintStyle: TextStyle(color: Colors.white),
                                  labelText: 'Password'),
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
                              controller: _confirmPasswordController,
                              focusNode: _confirmPasswordFocusNode,
                              keyboardType: TextInputType.text,
                              obscureText: true,
                              decoration: InputDecoration(
                                  border: OutlineInputBorder(
                                      borderSide:
                                          BorderSide(color: Colors.white)),
                                  fillColor: Colors.white,
                                  hintText: 'e.g. 1234',
                                  hintStyle: TextStyle(color: Colors.white),
                                  labelText: 'Confirm Password'),
                            ),
                          ),
                        ),
                        SizedBox(height: 15),
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
                            "Already have an account? sign in",
                            style: TextStyle(color: Colors.white),
                          ),
                          onPressed: () {
                            Navigator.pushReplacementNamed(
                                context, loginScreen);
                          },
                        ),
                      ]),
                    )
                  ],
                ),
              ),
            ));
      },
    );
  }
}
