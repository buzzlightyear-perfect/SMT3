public class OperasiDasar {
    public static void main(String[] args) {
        int a = 25;
        int b = 4;

        int hasilBagiInt = a / b;
        double hasilBagiRiil = (double) a / b;
        int sisaBagi = a % b;

        System.out.println("Nilai a = " + a + ", b = " + b);
        System.out.println("Hasil a / b (Integer) = " + hasilBagiInt);
        System.out.println("Hasil a / b (Riil)    = " + hasilBagiRiil);
        System.out.println("Sisa Bagi (a % b)      = " + sisaBagi);

        // Operator Relasional dan Logika Short-Circuit
        boolean cekLogika = (a > 20) && (b != 0);
        boolean cekAtau = (a < 10) || (b == 4);

        System.out.println("Apakah (a > 20) AND (b != 0)? " + cekLogika);
        System.out.println("Apakah (a < 10) OR (b == 4)?  " + cekAtau);
    }
}
