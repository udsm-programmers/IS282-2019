import java.io.*;
public static void saveArray(String[] v,String filename) throws IOException{
FileWriter f = new FileWriter(filename);
PrintWriter out = new PrintWriter(f);
for (int i = 0; i < v.length; i++)
out.println(v[i]);
out.close();
f.close();
}