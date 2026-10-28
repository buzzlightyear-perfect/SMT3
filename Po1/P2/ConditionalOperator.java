public class ConditionalOperator {
    public static void main(String[] args) {
        String status = "";
        int grade = 80;

        // Status dari siswa menggunakan operator ternary
        // Format: ekspresiKondisi ? nilaiJikaTrue : nilaiJikaFalse;
        status = (grade >= 60) ? "Passed" : "Fail";

        // Cetak status
        System.out.println("Nilai siswa: " + grade);
        System.out.println("Status kelulusan: " + status);
    }
}
