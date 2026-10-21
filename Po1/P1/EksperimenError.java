// File: EksperimenError.java
public class EksperimenError {
    public static void main(String[] args) {
        System.out.println("---- [PENGUJIAN KASUS ERROR PEMROGRAMAN] ----");

        // Kasus A: Pembagian integer dengan nol (Runtime Exception)
        int pembilang = 10;
        int penyebut = 0;

        // CATATAN: Baris berikut memicu ArithmeticException: / by zero
        // int hasilError = pembilang / penyebut;

        // Solusi Penanganan: Validasi penyebut sebelum operasi
        if (penyebut != 0) {
            System.out.println("Hasil: " + (pembilang / penyebut));
        } else {
            System.out.println("[DIAGNOSA] Pembagi tidak boleh bernilai nol pada pembagian integer!");
        }

        // Kasus B: Perilaku Floating-Point terhadap Nol
        // (Menghasilkan Infinity)
        double desimalPembagi = 0.0;
        double hasilDouble = 10.0 / desimalPembagi;

        System.out.println(
            "Hasil 10.0 / 0.0 pada tipe double: "
            + hasilDouble
            + " (Tidak crash, bernilai Infinity)"
        );
    }
}