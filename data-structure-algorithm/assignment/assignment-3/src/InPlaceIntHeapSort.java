/**
 * The response and solution to assignment three: building an in-place heap sort algorithm.
 *
 * @author Michael Muzzarelli, muzzarellm1@nku.edu
 */
public class InPlaceIntHeapSort {

    /**
     * Sort a list of provided values via the in-place heap sort algorithm.
     *
     * @param input     the input array to be sorted.
     */
    public static void heapSort(int[] input) {
        /* calculate the point at which the first leaf nodes exists, and after which point only leaf nodes exist */
        int leaf = input.length / 2;

        /* work backward through the array from the last parent node and shift values to maintain heap properties */
        for (int i = leaf - 1; i >= 0; i--) {
            shift(input, input.length, i);
        }

        /* work backward through the entire array to sort the heap in ascending order */
        for (int i = input.length - 1; i >= 0; i--) {
            int temporary = input[0];

            input[0] = input[i];
            input[i] = temporary;

            shift(input, i, 0);
        }
    }

    /**
     * Shift the values of an existing array-represented heap structure (or segment thereof) to maintain heap
     * properties.
     *
     * @param input     the input array (or segment).
     * @param length    the length of the input array (or segment).
     * @param index     the index of the value being sorted.
     */
    private static void shift(int[] input, int length, int index) {
        int parent = index;
        int left = 2 * index + 1;
        int right = 2 * index + 2;

        if (left < length && input[left] > input[parent]) {
            parent = left;
        }

        if (right < length && input[right] > input[parent]) {
            parent = right;
        }

        if (parent != index) {
            int temporary = input[index];
            input[index] = input[parent];
            input[parent] = temporary;

            shift(input, length, parent);
        }
    }
}
