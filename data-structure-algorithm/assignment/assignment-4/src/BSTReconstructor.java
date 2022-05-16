import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class BSTReconstructor {
	static BST<Integer> originalBST;
	static BST<Integer> preOrderReconstructedBST = new BST<>();
	static BST<Integer> postOrderReconstructedBST = new BST<>();

	static List<Integer> inOrderOutput;
	static List<Integer> preOrderOutput;
	static List<Integer> postOrderOutput;

	static Integer[] input = { 35, 25, 65, 30, 15, 20, 95, 45, 40, 55, 32, 60, 75 };

	public static void main(String[] args) {

		// Create BST from input
		originalBST = new BST<>(input);

		// Generate in/pre/post order traversal lists
		generateBSTTraversalLists();

		// Reconstruct BST from traversal lists of original BST
		System.out.println("Reconstructing BSTs from pre and post order traversal lists.");
		preOrderReconstructor(preOrderOutput);
		postOrderReconstructor(postOrderOutput);

		reconstructionVerificationTests();

	}

	// Generate in/pre/post order traversal lists
	private static void generateBSTTraversalLists() {
		inOrderOutput = originalBST.inorder();
		System.out.println("In-order: " + inOrderOutput);

		preOrderOutput = originalBST.preorder();
		System.out.println("Pre-order: " + preOrderOutput);

		postOrderOutput = originalBST.postorder();
		System.out.println("Post-order: " + postOrderOutput);

	}

	private static void reconstructionVerificationTests() {

		System.out.println("preOrderReconstructedBST should be true: " + originalBST.isEqualTo(preOrderReconstructedBST));
		System.out.println("postOrderReconstructedBST should be true: " + originalBST.isEqualTo(postOrderReconstructedBST));

		System.out.println("Inserting and deleting 65 from original BST");
		originalBST.delete(65);
		originalBST.insert(65);

		System.out.println("preOrderReconstructedBST should be false: " + originalBST.isEqualTo(preOrderReconstructedBST));
		System.out.println("postOrderReconstructedBST should be false: " + originalBST.isEqualTo(postOrderReconstructedBST));

		System.out.println("Inserting and deleting 65 from preOrderReconstructed BST");
		preOrderReconstructedBST.delete(65);
		preOrderReconstructedBST.insert(65);

		System.out.println("preOrderReconstructedBST should be true: " + originalBST.isEqualTo(preOrderReconstructedBST));
		System.out.println("postOrderReconstructedBST should be false: " + originalBST.isEqualTo(postOrderReconstructedBST));

		System.out.println("Inserting and deleting 65 from postOrderReconstructed BST");
		postOrderReconstructedBST.delete(65);
		postOrderReconstructedBST.insert(65);

		System.out.println("preOrderReconstructedBST should be true: " + originalBST.isEqualTo(preOrderReconstructedBST));
		System.out.println("postOrderReconstructedBST should be true: " + originalBST.isEqualTo(postOrderReconstructedBST));
	}

	// Reconstruct BST from pre-order traversal lists of original BST.
	// This method will take an inputArray of pre-order traversal items
	// and re-create the original BST, and save reconstructed tree in the
	// preOrderReconstructedBST variable.
	private static void preOrderReconstructor(List<Integer> inputArray) {
		/* retrieve and store the root value */
		int root = inputArray.get(0);

		/* insert the root value into the reconstructed bst */
		preOrderReconstructedBST.insert(root);

		/* if the inputArray has more than one element, indicating either a right or left subtree... */
		if (inputArray.size() > 1) {
			/* initialise a variable to store the index of the right subtree root */
			int rightSubtreeRootIndex = -1;

			/* loop from position 0 to position N-1 and stop if an element is greater than the root */
			for (int i = 0; i < inputArray.size() - 1; i++) {
				if (inputArray.get(i) > root) {
					rightSubtreeRootIndex = i; break;
				}
			}

			/* if both a left and right subtree exist, recursively call this function on each sub-list */
			if (rightSubtreeRootIndex > 0) {
				preOrderReconstructor(inputArray.subList(1, rightSubtreeRootIndex));
				preOrderReconstructor(inputArray.subList(rightSubtreeRootIndex, inputArray.size()));

				/* if only one subtree (left or right) exists, recursively call this function on the entire list */
			} else {
				preOrderReconstructor(inputArray.subList(1, inputArray.size()));
			}
		}
	}

	// Reconstruct BST from post-order traversal lists of original BST.
	// This method will take an inputArray of post-order traversal items
	// and re-create the original BST, and save reconstructed tree in the
	// postOrderReconstructedBST variable.
	private static void postOrderReconstructor(List<Integer> inputArray) {
		/* retrieve and store the root value */
		int root = inputArray.get(inputArray.size() - 1);

		/* insert the root value into the reconstructed bst */
		postOrderReconstructedBST.insert(root);

		/* if the inputArray has more than one element, indicating either a right or left subtree... */
		if (inputArray.size() > 1) {
			/* initialise a variable to store the index of the right subtree root */
			int rightSubtreeRootIndex = -1;

			/* loop from position 0 to position N-1 and stop if an element is greater than the root */
			for (int i = 0; i < inputArray.size() - 1; i++) {
				if (inputArray.get(i) > root) {
					rightSubtreeRootIndex = i; break;
				}
			}

			/* if both a left and right subtree exist, recursively call this function on each sub-list */
			if (rightSubtreeRootIndex > 0) {
				postOrderReconstructor(inputArray.subList(0, rightSubtreeRootIndex));
				postOrderReconstructor(inputArray.subList(rightSubtreeRootIndex, inputArray.size() - 1));

			/* if only one subtree (left or right) exists, recursively call this function on the entire list */
			} else {
				postOrderReconstructor(inputArray.subList(0, inputArray.size() - 1));
			}
		}
	}
}