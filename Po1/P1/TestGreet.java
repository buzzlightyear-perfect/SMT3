
class Greeting {
    public void greet() {
        System.out.println("Hello, World!");
    }
}

public class TestGreet {
    public static void main(String[] args) {
        Greeting hello = new Greeting();
        hello.greet();
    }
}
