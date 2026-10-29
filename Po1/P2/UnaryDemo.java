public class UnaryDemo {
    public static void main(String[] args) {
        System.out.println("=== DEMONSTRASI OPERATOR UNARY (INCREMENT & DECREMENT) ===");
        
        
        int i = 10;
        int j = 3;
        int k = 0;

        System.out.println("Kondisi Awal: i = " + i + ", j = " + j + ", k = " + k);

       
        k = ++j + i;
        System.out.println("\nSetelah operasi (k = ++j + i):");
        System.out.println("Nilai k = " + k); // k = 14
        System.out.println("Nilai j sekarang = " + j); // j = 4

      
        System.out.println("\nSetelah operasi berlanjut (k = j++ + i):");
        System.out.println("Nilai k = " + k); // k = 14
        System.out.println("Nilai j sekarang = " + j); // j = 5

 
        System.out.println("\n--- Pengujian Komparasi Independen (Reset j = 3) ---");
        j = 3;
        k = ++j + i;
        System.out.println("Dengan j awal = 3, hasil (k = ++j + i) -> k = " + k + ", j = " + j);

        j = 3;
        k = j++ + i;
        System.out.println("Dengan j awal = 3, hasil (k = j++ + i) -> k = " + k + ", j = " + j);
    }
}
