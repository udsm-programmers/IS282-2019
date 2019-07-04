package com.example.root.myapplication;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class tryDataBase extends SQLiteOpenHelper {

    public static final String TAG = "DatabaseHelper";

    public static final String TABLE_NAME = "people_table";
    public static final String COL1 = "ID";
    public static final String COL2 = "name";
    public static final String COL3 = "regno";
    public static final String COL4 = "marks";


    public tryDataBase(Context context) {
        super(context, TABLE_NAME, null, 1);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String createTable = "CREATE TABLE " + TABLE_NAME + " (ID INTEGER PRIMARY KEY AUTOINCREMENT, " +
                COL2 +" TEXT,"+COL3+" TEXT ,"+COL4+" INTEGER)";
        db.execSQL(createTable);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int i, int i1) {
        db.execSQL("DROP TABLE IF  EXISTS " + TABLE_NAME);
        onCreate(db);
    }

    public boolean insert(String item, String regn ,String marks) {
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put(COL2, item);
        contentValues.put(COL3,regn);
        contentValues.put(COL4,marks);

        //Log.d(TAG, "addData: Adding " + item + " to " + TABLE_NAME);

        long result = db.insert(TABLE_NAME, null, contentValues);

        //if date as inserted incorrectly it will return -1
        if (result == -1) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Returns all the data from database
     * @return
     */
    public Cursor getAllData(){
        SQLiteDatabase db = this.getWritableDatabase();
        String query = "SELECT * FROM " + TABLE_NAME;
        Cursor data = db.rawQuery(query, null);
        return data;
    }

    /**
     * Returns only the ID that matches the name passed in
     * @return
     */
    public Cursor getData(String regno){
        SQLiteDatabase db = this.getWritableDatabase();
        String query = "SELECT * FROM " + TABLE_NAME +
                " WHERE " + COL2 + " = '" + regno + "'";
        Cursor data = db.rawQuery(query, null);
        return data;
    }

    /**
     * Updates the name field
     * @param newid
     * @param newfullname
     * @param newmarks
     * @param newregno
     */
    public boolean updateData(String newid, String newfullname,String newregno,String newmarks){
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues= new ContentValues();
        contentValues.put(COL1,newid);
        contentValues.put(COL2,newfullname);
        contentValues.put(COL3,newregno);
        contentValues.put(COL4,newmarks);

        db.update(TABLE_NAME,contentValues, "regno = ? ", new String[]{newregno});
    //  String query = "UPDATE " + TABLE_NAME + " SET " + COL1 +
      //          " = '" + newid  +  COL2 + " = '"  + newfullname + COL3 + " = '" + newregno  + COL4  +  " = '" + newmarks + " WHERE " + COL3 + " = '" + newregno + "'" ;
        ///db.execSQL(query);
        return true;
    }

    /**
     * Delete from database
     * @param regno
     * @param
     * @param
     * @param regno
     * @param
     */
    public Integer deleteData(  String regno  ){
        SQLiteDatabase db = this.getWritableDatabase();
        //String query = "DELETE FROM " + TABLE_NAME + " WHERE "
          //      + COL3 + " = '" + regno + "'" +
            //    " AND " + COL1 + " = '" + Id + COL2 + " = '"  + fulname + COL3 + " = '" + regno + COL4 + " = '" +  marks + "'";
        //db.execSQL(query);
        return db.delete(TABLE_NAME, "regno   = ? ",new  String[]{regno});
    }

}


