package com.example.root.myapplication;

import android.app.AlertDialog;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class AdminData extends AppCompatActivity {

    tryDataBase mynd;
    EditText   textid ,textregno ,textfullname,textis2;
    Button btnAddData, btnGetData, btnUpdate,btnDelete, btnviewAll;

    @Override

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_admin_data);

        mynd = new tryDataBase(this);
        textid=(EditText)findViewById(R.id.idno);
        textregno = (EditText) findViewById(R.id.fullname);
        textfullname = (EditText) findViewById(R.id.regno);
        textis2 = (EditText) findViewById(R.id.editmark);
        btnAddData = (Button) findViewById(R.id.btnAdd);
        btnGetData = (Button) findViewById(R.id.btnvie2);
        btnUpdate = (Button) findViewById(R.id.btnupdate);
        btnDelete = (Button) findViewById(R.id.btndelete);
        btnviewAll = (Button) findViewById(R.id.btnviewall2);
        AddData();

        getData();
        viewAll();
        updateData();
        deleteData();

        // mbd=openOrCreateDatabase("student",Context.MODE_PRIVATE,null);
        ///mbd.execSQL("CREATE TABLE IF NOT EXISTS shuta(regno INTEGER,fullname VARCHAR, marks INTEGER); ");
    }

    public  void AddData() {
        btnAddData.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (textid.length()==0){
                    showMessage("FAILURE","Enter S/N.");
                }else if(textfullname.length()==0){
                    showMessage("FAILURE","Enter the name of the student!!");
                }else if (textregno.length()==0){
                    showMessage("FAILURE","Enter the Reg no of the student");
                }else if (textis2.length()==0){
                    showMessage("FAILURE","Enter marks of the student");
                }else {
                    boolean isInserted = mynd.insert(textregno.getText().toString(), textfullname.getText().toString(), textis2.getText().toString());
                    if (isInserted == true) {
                        showMessage("::SUCCESS::", "Record added sussesfully");
                        clearText();
                    } else
                        Toast.makeText(AdminData.this, "data could  not be inserted", Toast.LENGTH_LONG).show();
                }
            }
        });
    }

    public void getData(){
        btnGetData.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String name= textregno.getText().toString();

                if (name.equals(String.valueOf(""))) {
                    showMessage("FAILURE!!", "Field is empty!!  \n\n PLease enter your reg no to check ur results ");
                    return;

                }

                    Cursor res = mynd.getData(name);
                    String data = null;
                    if (res.moveToFirst()) {
                        data = "S/N: " + res.getString(0) + "\n\n" +
                                "Registration No: " + res.getString(1) + "\n\n\n" +
                                "Full Name: " + res.getString(2) + "\n\n\n" +
                                "Marks Scored: " + res.getString(3) + "\n\n\n";
                    }

                    showMessage("\t::RESULTS::", data);
                   clearText();

            }
        });

    }

    public void deleteData(){
        btnDelete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if (textregno.length() == 0) {
                    showMessage("FAILURE!!", "Field is empty!!! \n\n\n Enter Reg no to delete the record of the student");
                } else {
                    Integer deleteRows = mynd.deleteData(textfullname.getText().toString());

                    if (deleteRows > 0) {
                        showMessage("SUCCESS", "Record deleted successfull!!");
                        clearText();
                    } else
                        showMessage("FAILURE", "Deletion failure");
                }
            }
        });
    }

    public void updateData(){
        btnUpdate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (textfullname.length()==0){
                    showMessage("ERROR","Enter the Rg no do change the record of the student");
                }else {
                    boolean isUpdate=mynd.updateData(textid.getText().toString(),textfullname.getText().toString(),textregno.getText().toString(),textis2.getText().toString());

                    if (isUpdate==true){
                        showMessage("::SUCCESS::","record upadated succesfully");
                        clearText();
                    }else
                        showMessage("FAILURE","failure to update the record");
                }
            }
        });
    }

    public void  viewAll(){
        btnviewAll.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Cursor cursor= mynd.getAllData();
                if (cursor.getCount()==0){
                    showMessage("Error" ,"Nothing found");
                    clearText();

                }else {

                    StringBuffer buffer = new StringBuffer();
                    while (cursor.moveToNext()) {
                        buffer.append("Id: " + cursor.getString(0) + "\n");
                        buffer.append("Registration NO: " + cursor.getString(1) + "\n");
                        buffer.append("Full Name: " + cursor.getString(2) + "\n");
                        buffer.append("Marks: " + cursor.getString(3) + "\n\n");
                    }

                    showMessage("OVERALL RESULTS", buffer.toString());
                    clearText();
                }
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
        textid.setText("");
        textregno.setText("");
        textfullname.setText("");
        textis2.setText("");
        textid.requestFocus();
    }
}
