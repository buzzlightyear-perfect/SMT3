// File: KalkulatorKesehatan.java (Skeleton)
public class KalkulatorKesehatan {
    public static void main(String[] args) {

        // TODO 1: Deklarasikan variabel
        String nama = "nama anda";
        double beratKg = 60.5; // berat anda
        double tinggiCm = 172.0; // tinggi anda

        // TODO 2: Konversikan tinggi badan ke satuan meter
        double tinggiM = tinggiCm / 100.0;

        // TODO 3: Hitung nilai BMI sesuai rumus baku
        double bmi = beratKg / (tinggiM * tinggiM);

        // TODO 4: Cetak hasil perhitungan terformat
        System.out.println("--------------------------------");
        System.out.println(" LAPORAN INDEKS MASSA TUBUH (BMI) ");
        System.out.println("--------------------------------");
        System.out.println("Nama Pasien  : " + nama);
        System.out.printf("Tinggi / Berat: %.1f cm / %.1f kg\n",
                          tinggiCm, beratKg);
        System.out.printf("Skor BMI Akhir: %.2f\n", bmi);
    }
}