public class RelationalDemo {
    public static void main(String[] args) {
        
        int i = 37;
        int j = 42;
        int k = 42;

        System.out.println("Nilai variabel...");
        System.out.println("   i = " + i);
        System.out.println("   j = " + j);
        System.out.println("   k = " + k);

    
        System.out.println("Lebih besar...");
        System.out.println("   i > j = " + (i > j)); // false
        System.out.println("   j > i = " + (j > i)); // true
        System.out.println("   k > j = " + (k > j)); // false


        System.out.println("lebih besar atau sama dengan...");
        System.out.println("   i >= j = " + (i >= j)); // false
        System.out.println("   j >= i = " + (j >= i)); // true
        System.out.println("   k >= j = " + (k >= j)); // true

     
        System.out.println("Lebih kecil...");
        System.out.println("   i < j = " + (i < j));
        System.out.println("   j < i = " + (j < i));
        System.out.println("   k < j = " + (k < j));

      
        System.out.println("lebih kecil atau sama dengan...");
        System.out.println("   i <= j = " + (i <= j));
        System.out.println("   j <= i = " + (j <= i));
        System.out.println("   k <= j = " + (k <= j));

  
        System.out.println("sama dengan...");
        System.out.println("   i == j = " + (i == j));
        System.out.println("   k == j = " + (k == j));

        System.out.println("tidak sama dengan...");
        System.out.println("   i != j = " + (i != j));
        System.out.println("   k != j = " + (k != j));
    }
}
