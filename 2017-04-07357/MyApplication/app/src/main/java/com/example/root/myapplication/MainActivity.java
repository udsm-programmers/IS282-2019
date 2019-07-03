package com.example.root.myapplication;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {


    public TextView view1,view2,view3;
    public ImageButton image;
    public Button btn1;

   @Override
public void onCreate(Bundle SavedInstanceState){
   super.onCreate(SavedInstanceState);
   setContentView(R.layout.activity_main);

   view1=(TextView)findViewById(R.id.textView21);
   view2=(TextView)findViewById(R.id.create1);
   view3=(TextView)findViewById(R.id.logaccount);
   btn1=(Button)findViewById(R.id.join_us);


   btn1.setOnClickListener(new View.OnClickListener() {
       @Override
       public void onClick(View v) {
           Intent intent=new Intent(MainActivity.this,learnmore.class);
           startActivity(intent);
       }
   });

   view3.setOnClickListener(new View.OnClickListener() {
       @Override
       public void onClick(View v) {
           Intent intent=new Intent(MainActivity.this,select.class);
           startActivity(intent);
       }
   });

   view2.setOnClickListener(new View.OnClickListener() {
       @Override
       public void onClick(View v) {
           Intent intent=new Intent(MainActivity.this,signup.class);
           startActivity(intent);
       }
   });


   }
}