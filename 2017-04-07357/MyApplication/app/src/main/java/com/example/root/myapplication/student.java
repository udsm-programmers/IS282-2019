package com.example.root.myapplication;

import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class student extends AppCompatActivity {

    public TextView text1;
    public TextView text2;
    public EditText edit1;
    public  EditText edit2;
    public Button btn1;
    public DataBaseHelper db;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_student);

        db = new DataBaseHelper(this);
        text1=(TextView)findViewById(R.id.text1);
        text2=(TextView)findViewById(R.id.text2);
        edit1=(EditText)findViewById(R.id.edit1);
        edit2=(EditText)findViewById(R.id.edit2);
        btn1=(Button)findViewById(R.id.btn1);



        btn1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String email= edit1.getText().toString();
                String password = edit2.getText().toString();

                Boolean checkemailpassword = db.emailpassword(email,password);
                if (checkemailpassword==true)
                {
                    Intent intent = new Intent(student.this,choose.class);
                    startActivity(intent);
                }
                else if(edit1.getText().toString().equals("Admin")&&(edit2.getText().toString().equals("123456"))) {
                    Intent intent= new Intent(student.this,users.class);
                    startActivity(intent);
                    Toast.makeText(getApplicationContext(),"your an admin",Toast.LENGTH_LONG).show();
                }else if (edit1.length() == 0){
                    edit1.setError("This should be filled");
                }
                else if (edit2.length() == 0){
                    edit2.setError("This shoul be filled");
                }
                else{
                    Toast.makeText(getApplicationContext(),"Wrong username or password",Toast.LENGTH_LONG).show();
                }
            }
        });



    }
    @Override
    public void onBackPressed(){
        finish();
    }

}
