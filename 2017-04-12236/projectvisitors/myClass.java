import java.util.Scanner;
class myClass {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        System.out.println("Enter first string");
        String s1 = in.nextLine();

        System.out.println("Enter second string");
        String s2 = in.nextLine();

        // compare strings
        System.out.println(s1.compareTo(s2));
    }
}