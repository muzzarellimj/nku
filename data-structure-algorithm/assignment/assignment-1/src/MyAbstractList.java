public abstract class MyAbstractList<E> implements MyList<E> {

    /**
     * The size of the list.
     */
    protected int size = 0;

    /**
     * Construct a default {@link MyAbstractList}.
     */
    protected MyAbstractList() { }

    /**
     * Construct a {@link MyAbstractList} from an array of elements.
     *
     * @param objects   the array of elements.
     */
    protected MyAbstractList(E[] objects) {
        for (E object : objects) {
            add(object);
        }
    }

    @Override
    public void add(E e) {
        add(size, e);
    }

    @Override
    public boolean isEmpty() {
        return size == 0;
    }

    @Override
    public int size() {
        return size;
    }

    @Override
    public boolean remove(E e) {
        if (indexOf(e) >= 0) {
            remove(indexOf(e));

            return true;

        } else {
            return false;
        }
    }
}