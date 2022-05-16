import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

/**
 * The response and solution to assignment two: the knapsack problem. The application accepts a few input attributes
 * from a user, reads a data file, parses the data to an {@link ArrayList} of {@link Project}s, calculates the maximum
 * profit that can be gained from a subset of the available projects, and writes a report to an output file that
 * includes the total profit and chosen projects.
 *
 * @author Michael Muzzarelli, muzzarellm1@nku.edu
 */
public class Knapsack {

    /**
     * The main entry point to the application.
     *
     * @param args  application entry arguments.
     *
     * @throws IOException  if the input or output file cannot be found or generated.
     */
    public static void main(String[] args) throws IOException {
        /* initialise a Scanner to parse user input, presumably via keyboard */
        Scanner keyboard = new Scanner(System.in);

        /* prompt the user for available labor, measured in work weeks... */
        System.out.print("Enter the number of available employee work weeks: ");

        /* ...and store the entered value */
        int labor = keyboard.nextInt();

        /* prompt the user for the input file name, including extension */
        System.out.print("Enter the name (and extension) of the input file: ");

        /* initialise a null-value String that will store the input file name in the validation loop */
        String inputFileName;

        /* initialise a null-value Scanner that will store the file input Scanner in the validation loop */
        Scanner input = null;

        /* while the file input Scanner has no valid value... */
        do {
            /* try to initialise the Scanner with a new input file */
            try {
                /* store the entered value as the input file name */
                inputFileName = keyboard.next();

                /* try to initialise the input file Scanner with the entered value */
                input = new Scanner(new File(inputFileName));

            /* if the input file name is not valid or cannot be found... */
            } catch (FileNotFoundException e) {
                /* re-prompt the user for the input file name, including extension */
                System.out.print("File not found - please try again. Enter the name (and extension) of the input file: ");
            }
        } while (input == null);

        /* prompt the user for the output file name, including extension... */
        System.out.print("Enter then name (and extension) of the output file: ");

        /* ...and store the entered value */
        String outputFileName = keyboard.next();

        /* initialise a FileWriter to write a calculated report to the output file */
        FileWriter output = new FileWriter(outputFileName);

        /* initialise an ArrayList of type Project to store available projects */
        ArrayList<Project> available = new ArrayList<>();

        /* initialise a string to store each line of the input file */
        String line;

        /* initialise a string array to store each component of the split string */
        String[] split;

        /* iterate through each line of the input file and parse the project data */
        while (input.hasNextLine()) {
            /* read the line */
            line = input.nextLine();

            /* split the line at each space (" ") character */
            split = line.split(" ");

            /* create a Project and add it to the list of available projects */
            available.add(new Project(split[0], Integer.parseInt(split[1]), Integer.parseInt(split[2])));
        }

        /* print the available project count */
        System.out.println("Number of available projects = " + available.size());

        /* initialise an ArrayList of type Project to store chosen projects, chosen via solve() */
        ArrayList<Project> chosen = solve(available, labor);

        /* initialise an integer to store the total profit of the chosen projects */
        int profit = 0;

        /* for each chosen project, add the project profit to the total profit */
        for (Project project : chosen) {
            profit += project.profit;
        }

        /* write the calculated report to the output file */
        output.write("Number of projects available: " + available.size() + System.lineSeparator());
        output.write("Available employee work weeks: " + labor + System.lineSeparator());
        output.write("Number of projects chosen: " + chosen.size() + System.lineSeparator());
        output.write("Total profit: " + profit + System.lineSeparator());

        /* reverse the sorted order of the chosen projects */
        Collections.reverse(chosen);

        /* write toString() of each project to the output file */
        for (Project project : chosen) {
            output.write(project + System.lineSeparator());
        }

        /* close the keyboard input Scanner */
        keyboard.close();

        /* close the file input Scanner */
        input.close();

        /* close the output FileWriter */
        output.close();

        /* notify the user that the process is complete */
        System.out.println("Done");
    }

    /**
     * Solve the 'Knapsack Problem' via dynamic programming.
     *
     * @param available     the {@link ArrayList} of available projects to choose from.
     * @param labor         the available labor as entered by the user.
     *
     * @return      an {@link ArrayList} of chosen projects that resulted in maximum profit.
     */
    private static ArrayList<Project> solve(ArrayList<Project> available, int labor) {
        /* initialise an ArrayList of chosen projects */
        ArrayList<Project> chosen = new ArrayList<>();

        // structure: matrix[row][column]
        // formula: v(i, w) = max { v(i - 1, w), v(i - 1, w - w(i)) + p(i) }

        /* store the available project count */
        int count = available.size();

        /* construct an analysis table with an added row and column for base cases */
        int[][] table = new int[labor + 1][count + 1];

        /* populate base case row, where there is no available labor */
        for (int c = 0; c <= count; c++) {
            table[0][c] = 0;
        }

        /* populate base case column, where there is no available project */
        for (int r = 0; r <= labor; r++) {
            table[r][0] = 0;
        }

        /* initialise an integer to store the previous value, which is guaranteed to exist */
        int previous;

        /* initialise an integer to store the next value, assuming the index table[r - 1][c - current.labor] exists */
        int next;

        /* for each incrementing project count (column), beginning with c = 1 to account for the base case column... */
        for (int c = 1; c <= count; c++) {
            /* retrieve and store the current project */
            Project current = available.get(c - 1);

            /* for each incrementing labor count (row), beginning with r = 1 to account for the base case row... */
            for (int r = 1; r <= labor; r++) {
                /* store the previous value */
                previous = table[r][c - 1];

                /* if the labor of the current project is less than or equal to the labor available... */
                if (current.labor <= labor) {
                    try {
                        /* store the next value */
                        next = table[r - current.labor][c - 1] + current.profit;

                        /* if execution reaches this point, store the maximum value of previous or next in the current cell */
                        table[r][c] = Math.max(next, previous);
                    } catch (ArrayIndexOutOfBoundsException e) {
                        /* carry the previous value to the current cell */
                        table[r][c] = previous;
                    }

                /* base case: if the labor of the current project is greater than the labor available... */
                } else {
                    /* carry the previous value to the current cell */
                    table[r][c] = previous;
                }
            }
        }

        /* retrieve and store the maximum profit, stored at table[labor][count] */
        int remainingProfit = table[labor][count];

        /* retrieve and store the available labor */
        int remainingLabor = labor;

        /* traverse the calculated table to check which projects were chosen, thus increasing the maximum profit */
        for (int c = count; c > 0; c--) {

            /* if the remaining profit is not equal to the previously calculated maximum profit of this project, indicating the project was used... */
            if (remainingProfit != table[remainingLabor][c - 1]) {
                /* retrieve and store the current project */
                Project current = available.get(c - 1);

                /* subtract the profit of the current project from the remaining profit */
                remainingProfit -= current.profit;

                /* subtract the labor of the current project from the remaining labor */
                remainingLabor -= current.labor;

                /* because the project was included as a project resulting in maximum profit, add it to the chosen project ArrayList */
                chosen.add(current);
            }
        }

        /* return the ArrayList of chosen projects */
        return chosen;
    }

    /**
     * A helper class to parse data from the input file as iterable objects.
     *
     * @author Michael Muzzarelli, muzzarellm1@nku.edu
     */
    private static class Project {

        private final String name;
        private final int labor;
        private final int profit;

        public Project(String name, int labor, int profit) {
            this.name = name;
            this.labor = labor;
            this.profit = profit;
        }

        @Override
        public String toString() {
            return name + " " + labor + " " + profit;
        }
    }
}