public class EksplorasiPrimitif {
    public static void main(String[] args) {
        // Deklarasi dan inisialisasi tipe data primitif
        byte nilaiByte = 127;
        short nilaiShort = 32767;
        int nilaiInt = 2147483647;
        long nilaiLong = 9223372036854775807L;
        float nilaiFloat = 3.141592f;
        double nilaiDouble = 3.141592653589793;
        char inisial = 'U';
        boolean statusAktif = true;

        System.out.println("--- [DEMONSTRASI TIPE DATA PRIMITIF] ---");
        System.out.println("Nilai Byte   : " + nilaiByte);
        System.out.println("Nilai Short  : " + nilaiShort);
        System.out.println("Nilai Int    : " + nilaiInt);
        System.out.println("Nilai Long   : " + nilaiLong);
        System.out.println("Nilai Float  : " + nilaiFloat);
        System.out.println("Nilai Double : " + nilaiDouble);
        System.out.println("Karakter     : " + inisial);
        System.out.println("Status Aktif : " + statusAktif);

        // Uji coba fenomena Overflow
        System.out.println("\n--- [PENGUJIAN OVERFLOW BILANGAN] ---");
        byte overflowByte = (byte) (nilaiByte + 1);
        System.out.println("Nilai 127 + 1 pada tipe byte: " + overflowByte
                + " (Terjadi Overflow!)");
    }
}
