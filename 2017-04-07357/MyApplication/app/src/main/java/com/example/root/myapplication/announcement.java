package com.example.root.myapplication;

import android.app.AlertDialog;
import android.content.Intent;
import android.database.Cursor;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class announcement extends AppCompatActivity {

    public TextView view1;
    public EditText edit;
    public Button BTN2,btna2;
    postDataBase pdb;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_announcement);
        pdb= new postDataBase(this);

        view1=(TextView)findViewById(R.id.announce);
        edit=(EditText)findViewById(R.id.enter);
        btna2=(Button)findViewById(R.id.posta);
        BTN2=(Button)findViewById(R.id.exitp);
        AddData();

        BTN2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });

    }


    public  void AddData() {
        btna2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                    boolean isInserted = pdb.insert(edit.getText().toString());
                    if (isInserted == true) {
                        showMessage("::*****SUCCESS****::", "\n\n Announcement posted successfully!");
                        clearText();
                    } else
                        Toast.makeText(announcement.this, "data could  not be inserted", Toast.LENGTH_LONG).show();

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
