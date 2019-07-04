package com.example.root.myapplication;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class users extends AppCompatActivity {

    public TextView textView90;
    public Button btn1,btn2,btn3,btn4,btn5;


    @Override

    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_users);

        textView90=(TextView)findViewById(R.id.title1);
        btn1=(Button)findViewById(R.id.uploads);
        btn2=(Button)findViewById(R.id.announce);
        btn4=(Button)findViewById(R.id.log);
        btn5=(Button)findViewById(R.id.page);


        btn1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent= new Intent(users.this,AdminData.class);
                startActivity(intent);
            }
        });

        btn2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=  new Intent(users.this,announcement.class);
                startActivity(intent);
            }
        });


        btn4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent= new Intent(users.this,MainActivity.class);
                startActivity(intent);
            }
        });

        btn5.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });

    }
}

