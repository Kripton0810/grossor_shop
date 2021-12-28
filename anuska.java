/**
 * anuska
 */
import java.util.*;
public class anuska {

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int n;
        n=in.nextInt();
        int i;
        double sum =0;
        for(i=1;i<=n;i++)
        {
            if(i%2==0)
            sum -= 1.0/i;
            else
            sum += 1.0/i;

        }
        System.out.println("The ln2 value till "+n+" is "+sum);
        
    }
}