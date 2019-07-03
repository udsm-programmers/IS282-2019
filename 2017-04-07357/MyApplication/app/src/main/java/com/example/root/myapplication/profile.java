package com.example.root.myapplication;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

public class profile extends AppCompatActivity {

    public TextView view2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        view2=(TextView)findViewById(R.id.view92);

        String text= getIntent().getStringExtra("text");
        view2.setText(text);


    }
}
