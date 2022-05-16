import java.util.Iterator;
import java.util.ListIterator;

public abstract class MyAbstractSequentialList<E> extends MyAbstractList<E> {

    /**
     * Construct a default {@link MyAbstractSequentialList}.
     */
    protected MyAbstractSequentialList() { }

    /**
     * Construct a {@link MyAbstractSequentialList} from an array of elements.
     *
     * @param objects   the array of elements.
     */
    protected MyAbstractSequentialList(E[] objects) {
        super(objects);
    }

    public Iterator<E> iterator() {
        return listIterator();
    }

    public ListIterator<E> listIterator() {
        return listIterator(0);
    }

    abstract public E getFirst();

    abstract public E getLast();

    abstract public void addFirst(E e);

    abstract public void addLast(E e);

    abstract public E removeFirst();

    abstract public E removeLast();

    abstract public ListIterator<E> listIterator(int index);
}