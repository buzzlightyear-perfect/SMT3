public class TestAND {
    public static void main(String[] args) {
        int i = 0;
        int j = 10;
        boolean test = false;

        // Contoh short-circuit AND (&&)
        // Karena ekspresi pertama (i > 10) bernilai false,
        // ekspresi kedua (j++ > 9) TIDAK dievaluasi sama sekali (short-circuit).
        // Sehingga nilai j tetap 10.
        test = (i > 10) && (j++ > 9);
        System.out.println("Hasil setelah operator && :");
        System.out.println("i = " + i);
        System.out.println("j = " + j);
        System.out.println("test = " + test);

        // Contoh non-short-circuit AND (&)
        // Meskipun ekspresi pertama (i > 10) bernilai false,
        // ekspresi kedua (j++ > 9) TETAP dievaluasi.
        // Akibatnya, j bertambah dari 10 menjadi 11.
        test = (i > 10) & (j++ > 9);
        System.out.println("\nHasil setelah operator & :");
        System.out.println("i = " + i);
        System.out.println("j = " + j);
        System.out.println("test = " + test);
    }
}
