package com.example.root.myapplication;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.concurrent.Callable;

public class Database extends SQLiteOpenHelper {

    public final static String DATABASE_NAME="student";
    public final static String TABLE_NAME="shuta";
    public final static String COL_1="ID";
    public final static String COL_2="REGNO";
    public final static String COL_3="FULLNAME";
    public final static String COL_4="MARKS";


    public Database(Context context) {

        super(context, DATABASE_NAME, null, 1);

    }

    @Override
    public void onCreate(SQLiteDatabase mdb) {

        mdb.execSQL("CREATE TABLE IF NOT EXISTS " + TABLE_NAME+"(ID INTEGER PRIMARY KEY AUTOINCREMENT ,REGNO VARCHAR ,FULLNAME VARCHAR,MARKS INTEGER)");

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldversion, int newversion) {
        db.execSQL("DROP TABLE IF EXISTS " +TABLE_NAME);
        onCreate(db);


    }

    public boolean insert(String regno, String fullname, String marks) {
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put(COL_2, regno);
        contentValues.put(COL_3, fullname);
        contentValues.put(COL_4, marks);

        long ins = db.insert(TABLE_NAME,null,contentValues);
        if (ins==-1) return false;
        else return true;
    }

    public Cursor getData(String Id){
        SQLiteDatabase db= this.getWritableDatabase();
        String query = "SELECT * FROM  TABLE_NAME   WHERE ID='" +Id+"'";
        Cursor cursor=db.rawQuery(query,null);
        return cursor;

    }

    public boolean updateData(String Id, String fullname, String regno ,String marks){
        SQLiteDatabase db=this.getWritableDatabase();
        ContentValues contentValues= new ContentValues();
        contentValues.put(COL_1,Id);
        contentValues.put(COL_2,regno);
        contentValues.put(COL_3,fullname);
        contentValues.put(COL_4,marks);
        db.update(TABLE_NAME,contentValues, "ID= ?",new String[]{Id});
        return true;
    }

    public Integer deleteData(String Id){
        SQLiteDatabase db=this.getWritableDatabase();
        return  db.delete(TABLE_NAME, "ID = ?",new String[]{Id});

    }

    public Cursor getAllData(){
        SQLiteDatabase mdb= this.getWritableDatabase();
        Cursor res=mdb.rawQuery("SELECT * FROM  TABLE_NAME "  ,null);
        return res;
    }
}

