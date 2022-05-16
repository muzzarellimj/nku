import java.util.ListIterator;
import java.util.NoSuchElementException;

/**
 * This is a response to assignment one of CSC 364-001, an exercise in circular doubly-linked lists.
 *
 * @author Michael Muzzarelli, muzzarellm1@nku.edu
 */
public class MyDoublyLinkedList<E> extends MyAbstractSequentialList<E> implements Cloneable {

    private Node<E> head = new Node<E>(null);

    /**
     * Create a default list
     */
    public MyDoublyLinkedList() {
        head.next = head;
        head.previous = head;
    }

    private static class Node<E> {
        E element;
        Node<E> previous;
        Node<E> next;

        public Node(E element) {
            this.element = element;
        }
    }

    @Override
    public String toString() {
        StringBuilder builder = new StringBuilder();
        builder.append("[");
        Node<E> current = head.next;

        for (int i = 0; i < size; i++) {
            builder.append(current.element);

            current = current.next;

            if (current != head) {
                builder.append(", ");
            }
        }

        builder.append("]");

        return builder.toString();
    }

    private Node<E> getNode(int index) {
        Node<E> current = head;

        if (index < 0 || index >= size) {
            throw new IndexOutOfBoundsException("Entered index is out of bounds; must be between 0 and " + size + ".");
        }

        if (index < size / 2) {
            for (int i = -1; i < index; i++) {
                current = current.next;
            }
        } else {
            for (int i = size; i > index; i--) {
                current = current.previous;
            }
        }

        return current;
    }

    @Override
    public void add(int index, E e) {
        if (index < 0 || index > size) {
            throw new IndexOutOfBoundsException("Entered index is out of bounds; must be between 0 and " + size + ".");
        }

        Node<E> current = new Node<>(e);

        if (size == 0) {
            head.next = head.previous = current;
            current.next = current.previous = head;

        } else if (index == 0) {
            Node<E> next = head.next;
            head.next = current;
            current.next = next;
            current.previous = head;

        } else if (index == size) {
            Node<E> last = head.previous;
            current.next = head;
            head.previous = current;
            current.previous = last;
            last.next = current;

        } else {
            Node<E> previous = getNode(index - 1);
            Node<E> next = previous.next;
            previous.next = current;
            next.previous = current;
            current.previous = previous;
            current.next = next;
        }

        size++;
    }

    @Override
    public void clear() {
        Node<E> current = head.next;

        while (current != head) {
            remove(current.element);

            current = current.next;
        }
    }

    @Override
    public boolean contains(E o) {
        for (Node<E> current = head.next; current != head; current = current.next) {
            E e = current.element;

            if (o == null ? e == null : o.equals(e)) {
                return true;
            }
        }

        return false;
    }

    @Override
    public E get(int index) {
        return getNode(index).element;
    }

    @Override
    public int indexOf(E element) {
        Node<E> current = head.next;

        for (int i = 0; i < size; i++) {
            E e = current.element;

            if (element == null ? e == null : element.equals(e)) {
                return i;
            }

            current = current.next;
        }

        return -1;
    }

    @Override
    public int lastIndexOf(E element) {
        Node<E> current = head.previous;

        for (int i = size - 1; i >= 0; i--) {
            E e = current.element;

            if (element == null ? e == null : element.equals(e)) {
                return i;
            }

            current = current.previous;
        }

        return -1;
    }

    @Override
    public E remove(int index) {
        if (size == 0) {
            throw new NoSuchElementException("The list does not contain any nodes!");
        }

        if (index < 0 || index >= size) {
            throw new IndexOutOfBoundsException("Entered index is out of bounds; must be between 0 and " + size + ".");
        }

        Node<E> current = getNode(index);
        Node<E> next = current.next;
        Node<E> previous = current.previous;

        if (index == 0) {
            head.next = next;
            next.previous = head;

        } else if (index == size - 1) {
            previous.next = head;
            head.previous = previous;

        } else {
            previous.next = next;
            next.previous = previous;
        }

        size--;

        return current.element;
    }

    @Override
    public Object set(int index, E e) {
        if (index < 0 || index >= size) {
            throw new IndexOutOfBoundsException("Entered index is out of bounds; must be between 0 and " + size + ".");
        }

        ListIterator<E> iterator = listIterator(index);
        E element = iterator.next();
        iterator.set(e);

        return element;
    }

    @Override
    public E getFirst() {
        return get(0);
    }

    @Override
    public E getLast() {
        return get(size - 1);
    }

    @Override
    public void addFirst(E e) {
        add(0, e);
    }

    @Override
    public void addLast(E e) {
        add(size, e);
    }

    @Override
    public E removeFirst() {
        return remove(0);
    }

    @Override
    public E removeLast() {
        return remove(size - 1);
    }

    @Override
    public MyDoublyLinkedList<E> clone() {
        try {
            MyDoublyLinkedList<E> clone = (MyDoublyLinkedList<E>) super.clone();

            clone.head = new Node<>(null);
            clone.head.next = clone.head;
            clone.head.previous = clone.head;

            clone.size = 0;

            for (E e : this) {
                clone.add(e);
            }

            return clone;

        } catch (CloneNotSupportedException e) {
            throw new RuntimeException();
        }
    }

    @Override
    public boolean equals(Object o) {
        MyDoublyLinkedList<E> source = this;
        MyDoublyLinkedList<?> other = (MyDoublyLinkedList<?>) o;

        if (source == other) {
            return true;

        } else if (!(other instanceof MyList)) {
            return false;

        } else if (source.size != other.size) {
            return false;

        } else {
            ListIterator<E> sourceIterator = source.listIterator();
            ListIterator<?> otherIterator = other.listIterator();

            for (int i = 0; i < source.size; i++) {
                E sourceElement = sourceIterator.next();
                Object otherElement = otherIterator.next();

                if (otherElement == null ? sourceElement != null : !otherElement.equals(sourceElement)) {
                    return false;
                }
            }
        }

        return true;
    }

    @Override
    public ListIterator<E> listIterator(int index) {
        return new MyDoublyLinkedListIterator(index);
    }

    private static enum ITERATOR_STATE {
        CANNOT_REMOVE, CAN_REMOVE_PREV, CAN_REMOVE_CURRENT
    }

    ;

    private class MyDoublyLinkedListIterator implements ListIterator<E> {

        /* node that holds the next node in the iteration */
        private Node<E> current;

        /* node that holds the last node that was visited */
        private Node<E> last;

        private int nextIndex; // index of current

        ITERATOR_STATE iterState = ITERATOR_STATE.CANNOT_REMOVE;

        private MyDoublyLinkedListIterator(int index) {
            if (index < 0 || index > size)
                throw new IndexOutOfBoundsException("iterator index out of bounds");
            current = getNode(index);
            nextIndex = index;
        }

        @Override
        public void add(E e) {
            MyDoublyLinkedList.this.add(nextIndex, e);
            iterState = ITERATOR_STATE.CANNOT_REMOVE;
        }

        @Override
        public boolean hasNext() {
            return nextIndex < size;
        }

        @Override
        public boolean hasPrevious() {
            return nextIndex > 0;
        }

        @Override
        public E next() {
            if (nextIndex >= size) {
                throw new NoSuchElementException();
            }

            last = current;

            current = current.next;
            nextIndex++;
            iterState = ITERATOR_STATE.CAN_REMOVE_PREV;

            return last.element;
        }

        @Override
        public int nextIndex() {
            return nextIndex;
        }

        @Override
        public E previous() {
            if (nextIndex <= 0) {
                throw new NoSuchElementException();
            }

            current = current.previous;
            nextIndex--;
            iterState = ITERATOR_STATE.CAN_REMOVE_CURRENT;
            last = current;

            return current.element;
        }

        @Override
        public int previousIndex() {
            return nextIndex - 1;
        }

        @Override
        public void remove() {
            switch (iterState) {
                case CANNOT_REMOVE:
                    throw new IllegalStateException("Either add() or remove() have been called since the last occurrence of next() or previous(), or next() or previous() have not been run at all!");

                case CAN_REMOVE_PREV:
                    MyDoublyLinkedList.this.remove(nextIndex - 1);
                    last = current;
                    nextIndex--;
                    iterState = ITERATOR_STATE.CANNOT_REMOVE;
                    break;

                case CAN_REMOVE_CURRENT:
                    MyDoublyLinkedList.this.remove(nextIndex);
                    nextIndex--;
                    iterState = ITERATOR_STATE.CANNOT_REMOVE;
                    break;
            }
        }

        @Override
        public void set(E e) {
            if (iterState == ITERATOR_STATE.CANNOT_REMOVE) {
                throw new IllegalStateException("Either add() or remove() have been called since the last occurrence of next() or previous(), or next() or previous() have not been run at all!");
            }

            last.element = e;
        }
    }
}
