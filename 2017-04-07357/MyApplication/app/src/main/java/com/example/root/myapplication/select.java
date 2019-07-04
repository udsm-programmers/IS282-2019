package com.example.root.myapplication;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

public class select extends AppCompatActivity {

    public ImageView view1,view2;
    public  TextView view3,view4;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_select);

        view1=(ImageView)findViewById(R.id.imageadmin);
        view2=(ImageView)findViewById(R.id.imagestudent);
        view3=(TextView)findViewById(R.id.admin2);
        view4=(TextView)findViewById(R.id.textstudent);

        view1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(select.this,student.class);
                startActivity(intent);
            }
        });


        view2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(select.this,wellcom.class);
                startActivity(intent);
            }
        });

    }
}
