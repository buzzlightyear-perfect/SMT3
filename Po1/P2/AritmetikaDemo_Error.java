// Program II-2 versi awal modul (mengandung error kompilasi untuk analisis Tugas II-2)
public class AritmetikaDemo_Error {
    public static void main(String[] args) {
        int i = 37;
        int j = 42;
        double x = 27,475;
        System.out.println("Variable values...");
        System.out.println("   i = " + i);
        System.out.println("   j = " + j);
        System.out.println("   x = " + x);
        System.out.println("   y = ", y); 
        System.out.println("Adding...");
        System.out.println("   i + j = " + i + j);
        System.out.println("   x + y = " + x + y);
        System.out.println("Subtracting...");
        System.out.println("   i - j = " + (i - j));
        System.out.println("   x - y = " + (x - y));
        System.out.println("Multiplying...");
        System.out.println("   i * j = " + i * j);
        System.out.println("   x * y = " + (x * y));
        System.out.println("Dividing...");
        System.out.println("   i / j = " + (i / j));
        System.out.println("   x / y = " + x / y);
        System.out.println("Computing the remainder...");
        System.out.println("   i % j = " + i % j);
        System.out.println("   x % y = " + (x % y));
        System.out.println("Mixing types...");
        System.out.println("   j + y = " + (j + y));
        System.out.println("   i * x = " , (i * x)); // Error 3: pemisah koma pada println
    }
}
