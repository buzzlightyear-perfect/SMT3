import java.text.NumberFormat;
import java.util.Locale;

/**
 * Tugas Akhir No. 5 - Modul 2 Praktikum Pemrograman Objek 1
 * Program: SimulasiPenggajian.java
 * Deskripsi: Menghitung rincian slip gaji mingguan staf operasional logistik di Kota Cimahi
 * Penulis: Bhaskoro Prayoga Utomo (2550081109)
 */
public class SimulasiPenggajian {
    public static void main(String[] args) {
        // === ATURAN BISNIS & KONSTANTA (final) ===
        // a. Upah Pokok: tarif normal Rp 35.000/jam dan tarif lembur Rp 50.000/jam
        final double TARIF_NORMAL_PER_JAM = 35000.0;
        final double TARIF_LEMBUR_PER_JAM = 50000.0;
        final double PERSENTASE_PPH = 0.05; // 5% Pajak Penghasilan
        final double IURAN_BPJS_KETENAGAKERJAAN = 25000.0; // Iuran tetap Rp 25.000

        // b. Jam Kerja staf operasional seminggu (total 48 jam)
        final int JAM_KERJA_NORMAL = 40;
        final int JAM_KERJA_LEMBUR = 8;
        final int TOTAL_JAM_KERJA = JAM_KERJA_NORMAL + JAM_KERJA_LEMBUR;

        // === PERHITUNGAN PENDAPATAN ===
        double upahNormal = JAM_KERJA_NORMAL * TARIF_NORMAL_PER_JAM;
        double upahLembur = JAM_KERJA_LEMBUR * TARIF_LEMBUR_PER_JAM;

        // c. Gaji Kotor (Gross Salary)
        double gajiKotor = upahNormal + upahLembur;

        // === PERHITUNGAN POTONGAN ===
        // d. PPh 5% dari gaji kotor dan BPJS Ketenagakerjaan tetap
        double potonganPPh = gajiKotor * PERSENTASE_PPH;
        double potonganBPJS = IURAN_BPJS_KETENAGAKERJAAN;
        double totalPotongan = potonganPPh + potonganBPJS;

        // e. Gaji Bersih (Take-Home Pay)
        double gajiBersih = gajiKotor - totalPotongan;

        // Format Rupiah Indonesia
        NumberFormat rupiahFormat = NumberFormat.getCurrencyInstance(Locale.forLanguageTag("id-ID"));

        // f. Tampilan Output: Slip Gaji Terstruktur & Rapi ke Terminal Console
        System.out.println("==================================================================");
        System.out.println("                   PT. LOGISTIK KILAT CIMAHI                      ");
        System.out.println("             SLIP RINCIAN GAJI MINGGUAN KARYAWAN                  ");
        System.out.println("==================================================================");
        System.out.println("Nama Staf Operasional : Bhaskoro Prayoga Utomo");
        System.out.println("NIM / ID Staf         : 2550081109");
        System.out.println("Unit Kerja / Wilayah  : Hub Gudang Utama Cimahi");
        System.out.println("Periode Penggajian    : Mingguan (48 Jam Kerja)");
        System.out.println("------------------------------------------------------------------");
        System.out.println("RINCIAN JAM KERJA:");
        System.out.printf("  - Jam Kerja Normal   : %2d jam  @ %s /jam\n", 
                          JAM_KERJA_NORMAL, rupiahFormat.format(TARIF_NORMAL_PER_JAM));
        System.out.printf("  - Jam Kerja Lembur   : %2d jam  @ %s /jam\n", 
                          JAM_KERJA_LEMBUR, rupiahFormat.format(TARIF_LEMBUR_PER_JAM));
        System.out.printf("  - Total Jam Kerja    : %2d jam\n", TOTAL_JAM_KERJA);
        System.out.println("------------------------------------------------------------------");
        System.out.println("RINCIAN PENGHASILAN (EARNINGS):");
        System.out.printf("  + Upah Kerja Normal   : %s\n", rupiahFormat.format(upahNormal));
        System.out.printf("  + Upah Kerja Lembur   : %s\n", rupiahFormat.format(upahLembur));
        System.out.println("  ----------------------------------------------------------------");
        System.out.printf("  * TOTAL GAJI KOTOR    : %s\n", rupiahFormat.format(gajiKotor));
        System.out.println("------------------------------------------------------------------");
        System.out.println("RINCIAN POTONGAN (DEDUCTIONS):");
        System.out.printf("  - PPh 21 (5%%)         : %s\n", rupiahFormat.format(potonganPPh));
        System.out.printf("  - BPJS Ketenagakerjaan: %s\n", rupiahFormat.format(potonganBPJS));
        System.out.println("  ----------------------------------------------------------------");
        System.out.printf("  * TOTAL POTONGAN      : %s\n", rupiahFormat.format(totalPotongan));
        System.out.println("==================================================================");
        System.out.printf("  >>> GAJI BERSIH (TAKE-HOME PAY) : %s\n", rupiahFormat.format(gajiBersih));
        System.out.println("==================================================================");
        System.out.println("          Terima kasih atas dedikasi dan kerja keras Anda!        ");
        System.out.println("==================================================================");
    }
}
