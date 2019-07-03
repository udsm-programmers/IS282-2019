package com.example.root.myapplication;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import static com.example.root.myapplication.tryDataBase.COL3;

public class DataBaseHelper extends SQLiteOpenHelper {


    public DataBaseHelper(Context context){

        super(context,"Login.db",null, 1 );
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL("create table user(email text primary key ,password text)");
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int i, int i1) {
        db.execSQL("DROP TABLE IF  EXISTS  user" );

    }


    public boolean insert(String email, String password ){
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues= new ContentValues();

        contentValues.put("email",email);
        contentValues.put("password",password);
        //  contentValues.put("username",username);
        //contentValues.put("idno",idno);
        ///  contentValues.put("username",username);

        long ins = db.insert("user",null,contentValues);
        if (ins==-1) return false;
        else return true;
    }
    //checking if the email exist
    public  boolean checkemail(String email){
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor cursor = db.rawQuery("select * from user where email=?", new String[]{email});
        if (cursor.getCount()>0) return false;
        else return true;
    }

    public Cursor getData(String regno){
        SQLiteDatabase db = this.getWritableDatabase();
        Cursor data = db.rawQuery("select * from user where email=?",new String[]{regno});
        return data;
    }

    //checking the email and password
    public boolean emailpassword (String email, String password){
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor cursor = db.rawQuery("select * from user where email=? and password = ?",new String[]{email,password});
        if (cursor.getCount()>0) return true;
        else return false;

    }

}

