public class RelationalDemo {
    public static void main(String[] args) {
        // beberapa angka
        int i = 37;
        int j = 42;
        int k = 42;

        System.out.println("Nilai variabel...");
        System.out.println("   i = " + i);
        System.out.println("   j = " + j);
        System.out.println("   k = " + k);

        // lebih besar dari
        System.out.println("Lebih besar...");
        System.out.println("   i > j = " + (i > j)); // false
        System.out.println("   j > i = " + (j > i)); // true
        System.out.println("   k > j = " + (k > j)); // false

        // lebih besar atau sama dengan
        System.out.println("lebih besar atau sama dengan...");
        System.out.println("   i >= j = " + (i >= j)); // false
        System.out.println("   j >= i = " + (j >= i)); // true
        System.out.println("   k >= j = " + (k >= j)); // true

        // lebih kecil
        System.out.println("Lebih kecil...");
        System.out.println("   i < j = " + (i < j));
        System.out.println("   j < i = " + (j < i));
        System.out.println("   k < j = " + (k < j));

        // lebih kecil atau sama dengan
        System.out.println("lebih kecil atau sama dengan...");
        System.out.println("   i <= j = " + (i <= j));
        System.out.println("   j <= i = " + (j <= i));
        System.out.println("   k <= j = " + (k <= j));

        // sama dengan
        System.out.println("sama dengan...");
        System.out.println("   i == j = " + (i == j));
        System.out.println("   k == j = " + (k == j));

        // tidak sama dengan
        System.out.println("tidak sama dengan...");
        System.out.println("   i != j = " + (i != j));
        System.out.println("   k != j = " + (k != j));
    }
}
