package com.example.root.myapplication;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

public class learnmore extends AppCompatActivity {

    public TextView view1,view2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_learnmore);

        view1=(TextView)findViewById(R.id.well);
        view2=(TextView)findViewById(R.id.best);
    }
}
