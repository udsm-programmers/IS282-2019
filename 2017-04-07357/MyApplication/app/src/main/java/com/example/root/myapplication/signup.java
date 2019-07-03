package com.example.root.myapplication;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class signup extends AppCompatActivity {

    DataBaseHelper db;
    public EditText text1,text2,text5,text6;
    public Button button;
    public TextView viw;
    @Override
    public void onCreate(Bundle savedInsanceSate){
        super.onCreate(savedInsanceSate);
        setContentView(R.layout.activity_signup);

        db =new DataBaseHelper(this);

        text1=(EditText)findViewById(R.id.username);
        text2=(EditText)findViewById(R.id.email);
        text5=(EditText)findViewById(R.id.pass);
        text6=(EditText)findViewById(R.id.cpass);
        viw=(TextView)findViewById(R.id.vw);
        button=(Button)findViewById(R.id.btns1);


        viw.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });


        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String s1= text1.getText().toString();
                String s2= text2.getText().toString();
                String s5= text5.getText().toString();
                String s6= text6.getText().toString();


                if (text1.length() == 0){
                    text1.setError("Field can not be empty");
                }else if (text2.length()==0){
                    text2.setError("field can not be empty");
                } else if (!text2.getText().toString().contains("@gmail.com")) {
                    text2.setError("invalid email!! Email should contain '@gmail.com'");
                }else if (text5.length()==0){
                    text5.setError("Field can not be empty");
                }else if (text6.length()==0){
                    text6.setError("Field can not be empty");
                }else if (text5.length() < 5 || text5.length() > 10){
                    text5.setError("password should be between 5 to 10 numbers");
                }else if (!s5.equals(s6)){
                    text6.setError("password do not match");
                }
                else{
                    if (s5.equals(s6)){
                        Boolean checkemail = db.checkemail(s2);
                        if (checkemail==true){
                            Boolean insert = db.insert(s2,s5);

                            if (insert==true){
                                Intent intent = new Intent(signup.this,successignup.class);
                                startActivity(intent);
                                Toast.makeText(getApplicationContext(),"REGISTRATION SUCCESSFULLY!",Toast.LENGTH_LONG).show();
                            }
                        }
                        else {
                            Toast.makeText(getApplicationContext(),"Email already exist",Toast.LENGTH_LONG).show();
                        }
                    }
                    //Toast.makeText(getApplicationContext(),"Password do not match",Toast.LENGTH_LONG).show();
                }
            }
        });


    }

    public boolean validateEmail(){
        String email = text2.getText().toString().trim();

        if (email.isEmpty()){
            text2.setError("field is empty");
            return false;
        }else {
            text2.setError(null);
            return true;
        }
    }
}














