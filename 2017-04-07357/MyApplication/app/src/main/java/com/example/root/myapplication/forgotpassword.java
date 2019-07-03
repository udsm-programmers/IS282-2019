package com.example.root.myapplication;

import android.app.AlertDialog;
import android.database.Cursor;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class forgotpassword extends AppCompatActivity {

    TextView view1 ,view2 ,view3;
    EditText edit;
    Button btn;
    DataBaseHelper db;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_forgotpassword);

        db=new DataBaseHelper(this);
        view1=(TextView)findViewById(R.id.getview);
        view1=(TextView)findViewById(R.id.idlogin);
        view3=(TextView)findViewById(R.id.wellcome);
        edit=(EditText)findViewById(R.id.textemail);
        btn=(Button)findViewById(R.id.btngetpass);

        getData();


        view1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }
    public void getData(){
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String name= edit.getText().toString();

                if (name.equals(String.valueOf(""))) {
                    showMessage("FAILURE!!", "Field is empty!!  \n\n PLease enter your email to check your registration ");
                    return;

                }

                Cursor res = db.getData(name);
                String data = null;
                if (res.moveToFirst()) {
                    data = "email: " + res.getString(0) + "\n\n" +
                            "password: " + res.getString(1) + "\n\n\n" ;

                }

                showMessage("\t::YOUR REGISTRATION::", data);
                clearText();

            }
        });

    }

    public void showMessage(String title ,String message){

        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setCancelable(true);
        builder.setTitle(title);
        builder.setMessage(message);
        builder.show();
    }

    public void clearText(){
        edit.setText("");
        edit.requestFocus();
    }
}


