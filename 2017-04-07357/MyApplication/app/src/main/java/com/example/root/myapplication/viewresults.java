package com.example.root.myapplication;

import android.app.AlertDialog;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class viewresults extends AppCompatActivity {


    public TextView view1,view2;
    public EditText edit12;
    public Button btn45,btn46;
    tryDataBase mbd;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_viewresults);
        mbd=new tryDataBase(this);

        view1=(TextView)findViewById(R.id.viewresults);
        view2=(TextView)findViewById(R.id.textsee);
        edit12=(EditText)findViewById(R.id.see);
        btn45=(Button)findViewById(R.id.btnv23);
        btn46=(Button)findViewById(R.id.btnvlogout);

        getData();

        btn46.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(viewresults.this,MainActivity.class);
                startActivity(intent);
            }
        });

    }
    public void getData(){
        btn45.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String name= edit12.getText().toString();

                if (name.equals(String.valueOf(""))) {
                    showMessage("ERROR", "PLease enter your reg no to check ur results");
                    return;

                }

                Cursor res = mbd.getData(name);
                String data = null;
                if (res.moveToFirst()) {
                    data = "S/N: " + res.getString(0) + "\n\n" +
                            "Registration NO: " + res.getString(1) + "\n\n\n" +
                            "Full Name: " + res.getString(2) + "\n\n\n" +
                            "Marks Scored: " + res.getString(3) + "\n\n\n";
                }

                showMessage("RESULTS::", data);
                clearText();

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
        edit12.setText("");
        edit12.requestFocus();
    }
}
