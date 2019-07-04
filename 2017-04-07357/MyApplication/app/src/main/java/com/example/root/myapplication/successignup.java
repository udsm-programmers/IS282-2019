package com.example.root.myapplication;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

public class successignup extends AppCompatActivity {

    public TextView view1,view2;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_successignup);

        view1=(TextView)findViewById(R.id.textview1);
        view2=(TextView)findViewById(R.id.textviewlogin);

        view2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent= new Intent(successignup.this,wellcom.class);
                startActivity(intent);
            }
        });


    }
}
