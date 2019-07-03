package com.example.root.myapplication;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class next extends AppCompatActivity {

    public EditText edit1,edit2;
    public Button btn;
    public DataBaseHelper dataBaseHelper;
    public TextView view1,view2;
    String email;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_next);

        dataBaseHelper = new DataBaseHelper(this);

        edit1=(EditText)findViewById(R.id.textemail1);
        edit2=(EditText)findViewById(R.id.textemail2);
        btn=(Button) findViewById(R.id.btngetpass1);
        view1 =(TextView)findViewById(R.id.idlogin1);
        view2=(TextView)findViewById(R.id.wellcome1);

        Intent intent = getIntent();
        email=  intent.getStringExtra("EMAIL");

        setTitle("reset password");
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                updatepassword();
            }
        });
    }
    public void updatepassword(){
        String value1 =edit1.getText().toString().trim();
        String value2 = edit2.getText().toString().trim();


        if (edit1.length()==0){
            edit1.setError("field can not be empty");
        } else if (edit2.length()==0){
            edit2.setError("field can not be empty");
        }else if (!value2.equals(value1)){
            edit2.setError("password do not match");
        }else if (!dataBaseHelper.checkemail(email)){
            Toast.makeText(getApplicationContext(),"Email does not exist!",Toast.LENGTH_LONG).show();
            return;
        }else {


            Toast.makeText(getApplicationContext(),"Password reset succesfully",Toast.LENGTH_LONG).show();
            emptyeditText();

            Intent intent= new Intent(next.this,MainActivity.class);
            startActivity(intent);
            finish();
        }
    }

    public void emptyeditText(){
        edit1.setText(null);
        edit2.setText(null);
    }
}

