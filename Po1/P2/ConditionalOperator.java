public class ConditionalOperator {
    public static void main(String[] args) {
        String status = "";
        int grade = 80;

        status = (grade >= 60) ? "Passed" : "Fail";

        System.out.println("Nilai siswa: " + grade);
        System.out.println("Status kelulusan: " + status);
    }
}
