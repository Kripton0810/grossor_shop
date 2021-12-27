/**
 * anuska
 */
import java.util.*;
public class anuska {

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        System.out.println("Enter the value: ");
        int n = in.nextInt();
        //answer a number is prime or not
        int i,c=0,twist=0;
        for(i=1;i<=n;i++)
        {
            if(n%i==0)
            {
                c++;
            }
        }
        if(c==2)
        {
            twist++;
            System.out.println("It is a prime number");
        }
        else
        {
            System.out.println("It is not a prime number");
        }
        //answer b rev twisted prime c=2
        int rev = 0,d;
        int copy = n;
        while(copy!=0)
        {
            d = copy%10;
            rev = rev*10+d;
            copy=copy/10;
        }
        c=0;
        System.out.println("The reverse of number is "+rev);
        for(i=1;i<=rev;i++)
        {
            if(rev%i==0)
            {
                c++;
            }
        }
        if(c==2)
        {
            twist++;
            System.out.println("The revers is also prime number");
        }
        else
        {
            System.out.println("The revers is not a prime number");
        }
        if(twist==2)
        {
            System.out.println("This number is a twisted prime number");
        }
        else
        {
            System.out.println("This number is not a twisted prime number");
        }
    }
}