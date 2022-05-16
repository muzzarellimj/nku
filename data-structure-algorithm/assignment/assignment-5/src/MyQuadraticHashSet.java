// MyQuadraticHashSet.java
// Implements a hash table of objects, using open addressing with quadratic probing.
// - Jeff Ward

import java.util.ArrayList;

public class MyQuadraticHashSet<E> implements MySet<E> {

    /* number of elements in the set */
	private int size;

    /* table elements, initially all null */
	private Object[] table;

    /* size should not exceed (table.length * maxLoadFactor) */
	private double maxLoadFactor;

    /* (table.length * maxLoadFactor), prompts resize and rehash when (size + numRemoved) exceed */
	private int thresholdSize;

    /* set of prime numbers to be used as hash table sizes */
	private int[] tableSizes;

    /* index into tableSizes */
	private int nextTableSizeIndex;

    /* indicate a removed table element without issue in future probing */
	private final static Object REMOVED = new Object();

    /* number of instances of REMOVED */
	private int numRemoved = 0;

	private int probeIndex(int hashCode, long probeCount, int tableLength) {
		return (int) ((hashCode % tableLength + tableLength + probeCount * probeCount) % tableLength);
	}

	public MyQuadraticHashSet(double maxLoadFactor, int[] tableSizes) {
        this.maxLoadFactor = maxLoadFactor;
        this.tableSizes = tableSizes;

        table = new Object[tableSizes[0]];
        nextTableSizeIndex = 1;

        size = 0;
        thresholdSize = (int) (table.length * maxLoadFactor);
	}

    @SuppressWarnings("unchecked")
	public void clear() {
        size = 0;

        for (Object o : table) {
            if (o == REMOVED) {
                return;
            } else {
                remove((E) o);
            }
        }
	}

	public boolean contains(E e) {
        for (int i = 0; i < table.length; i++) {
            int index = probeIndex(e.hashCode(), i, table.length);

            Object other = table[index];

            if (other == null) {
                return false;
            }

            if (e.equals(table[index])) {
                return true;
            }
        }

        return false;
	}


	public boolean add(E e) {
        if (contains(e)) {
            return false;
        }

        if (size + numRemoved > thresholdSize) {
            if (size == tableSizes[nextTableSizeIndex - 1]) {
                throw new RuntimeException("Exceeding maximum capacity!");
            }

            rehash();
        }

        for (int i = 0; i < table.length; i++) {
            int index = probeIndex(e.hashCode(), i, table.length);

            if (table[index] == REMOVED) {
                table[index] = e;

                numRemoved--;
                size++;

                return true;
            }

            if (table[index] == null) {
                table[index] = e;

                size++;

                return true;
            }
        }

        return false;
	}

    @SuppressWarnings("unchecked")
	private void rehash() {
        ArrayList<E> copy = new ArrayList<>();

        for (Object value : table) {
            if (value != null) {
                copy.add((E) value);
            }
        }

        table = new Object[tableSizes[nextTableSizeIndex]];
        nextTableSizeIndex++;
        size = 0;
        numRemoved = 0;
        thresholdSize = (int) (table.length * maxLoadFactor);

        for (E o : copy) {
            if (o == REMOVED) {
                return;
            } else {
                add(o);
            }
        }
	}

	public boolean remove(E e) {
        if (!contains(e)) {
            return false;
        }

        for (int i = 0; i < table.length; i++) {
            int index = probeIndex(e.hashCode(), i, table.length);

            Object other = table[index];

            if (other == null) {
                return false;
            }

            if (e.equals(other)) {
                table[index] = REMOVED;

                size--;
                numRemoved++;

                return true;
            }
        }

		return false;
	}

	public boolean isEmpty() {
        return size == 0;
	}

	public int size() {
        return size;
	}

	public java.util.Iterator<E> iterator() {
		throw new UnsupportedOperationException();
	}
}
