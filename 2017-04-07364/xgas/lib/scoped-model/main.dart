import 'package:scoped_model/scoped_model.dart';

import 'connected_xgas.dart';

class MainModel extends Model with ConnectedXgasModel, UtilityModel, UserModel, LoginModel{}