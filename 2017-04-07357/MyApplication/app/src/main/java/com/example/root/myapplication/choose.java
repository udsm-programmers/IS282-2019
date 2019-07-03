package com.example.root.myapplication;

import android.app.AlertDialog;
import android.content.Intent;
import android.database.Cursor;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class choose extends AppCompatActivity {

    public Button button1,button2,button3;
    public TextView view1,view2,view3,view4;
    postDataBase pdb;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_choose);
        pdb=new postDataBase(this);

        button1= (Button)findViewById(R.id.results1);
        button2=(Button)findViewById(R.id.announcement1);
        button3=(Button)findViewById(R.id.exit);
        view1=(TextView)findViewById(R.id.stud);
        view4=(TextView)findViewById(R.id.logout11);
        getAllData();


        view4.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(choose.this,MainActivity.class);
                startActivity(intent);
            }
        });


        button1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent=new Intent(choose.this,viewresults.class);
                startActivity(intent);
            }
        });


        button3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });


    }

    public void getAllData(){
        button2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Cursor cursor= pdb.getAllData();


                    StringBuffer buffer = new StringBuffer();
                    while (cursor.moveToNext()) {
                        buffer.append("NEW: " + cursor.getString(0) + "\n");
                        buffer.append("ATTENTION:: " + cursor.getString(1) + "\n\n\n\n");

                    }
                showMessage("\t/::****ANNOUNCEMENT***::/", buffer.toString());
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
}
