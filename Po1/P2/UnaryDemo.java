public class UnaryDemo {
    public static void main(String[] args) {
        System.out.println("=== DEMONSTRASI OPERATOR UNARY (INCREMENT & DECREMENT) ===");
        
        // Kasus 1: Mengikuti alur potongan kode modul
        int i = 10;
        int j = 3;
        int k = 0;

        System.out.println("Kondisi Awal: i = " + i + ", j = " + j + ", k = " + k);

        // Operasi 1: Pre-increment (++j)
        // Nilai j dinaikkan terlebih dahulu menjadi 4, lalu ditambahkan dengan i (10)
        k = ++j + i;
        System.out.println("\nSetelah operasi (k = ++j + i):");
        System.out.println("Nilai k = " + k); // k = 14
        System.out.println("Nilai j sekarang = " + j); // j = 4

        // Operasi 2: Post-increment (j++) berlanjut
        // Nilai j yang sekarang (4) digunakan dalam perhitungan 4 + 10 = 14, lalu j dinaikkan menjadi 5
        k = j++ + i;
        System.out.println("\nSetelah operasi berlanjut (k = j++ + i):");
        System.out.println("Nilai k = " + k); // k = 14
        System.out.println("Nilai j sekarang = " + j); // j = 5

        // Kasus 2: Pembuktian terisolasi dengan nilai awal yang sama (j = 3)
        System.out.println("\n--- Pengujian Komparasi Independen (Reset j = 3) ---");
        j = 3;
        k = ++j + i;
        System.out.println("Dengan j awal = 3, hasil (k = ++j + i) -> k = " + k + ", j = " + j);

        j = 3;
        k = j++ + i;
        System.out.println("Dengan j awal = 3, hasil (k = j++ + i) -> k = " + k + ", j = " + j);
    }
}
